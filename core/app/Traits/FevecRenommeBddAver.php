<?php
namespace App\Traits;

use Exception;
use App\Repositories\Fevec\FevecConstantes;

trait FevecRenommeBddAver
{
    public function RenommeBddAver()
    {
        $ouvrirLecture = fopen(FevecConstantes::BDD_AVER_ORIGINE, 'r');
        $ouvrirEcriture = fopen(FevecConstantes::BDD_AVER_MODIFIEE, 'w');

        if ($ouvrirLecture) {
            while (($buffer = fgets($ouvrirLecture, 4096)) !== false)
            {
                fwrite($ouvrirEcriture, str_replace(FevecConstantes::ENTETE_ORIGINE, FevecConstantes::ENTETE_MODIFIE, $buffer));
            }

        }
            fclose($ouvrirEcriture);
            
            fclose($ouvrirLecture);
    }
    
    public function litBddAver()
    {
        $connect = new \mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
        if ($connect -> connect_errno)
        {
            printf("Echec de la connexion :%s\n", $connect->connect_error);
            exit();
        }

        $ouvrirLecture = fopen(FevecConstantes::BDD_AVER_MODIFIEE, 'r');
         
         if($ouvrirLecture)
         {
             while(($buffer = fgets($ouvrirLecture, 4096)) !== false)
             {
                 if(substr($buffer, 0, 11) === "INSERT INTO") {
                     $sql = str_replace("\r\n", "", $buffer);
                     try {
                         $res = $connect->query($sql);
                         if (false === $res) {
                             throw new Exception("Failed to run query.");
                         }
                     } catch (Exception $e) {
                         dump("Database exception: " . $e->getMessage());
                     }
                 }
             }

         }
     fclose($ouvrirLecture);
     mysqli_close($connect);
    }
}
