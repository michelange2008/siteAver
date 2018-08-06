<?php
namespace app\Traits;

use App\Models\Fev_typetroupeaux;
use App\Models\Fev_troupeaux;
use Illuminate\Support\Facades\DB;
use Exception;

trait RenommeBddAver
{
    public function RenommeBddAver($fichierImport)
    {
        $origine = ["Clients", "RaceDominante", "Troupeaux", "TypeActivite", "Typefev_troupeaux"];
        
        $final = ["fev_clients", "fev_racedominante", "fev_troupeaux", "fev_typeactivite", "fev_typetroupeaux"];

        $ouvrirLecture = fopen($fichierImport, 'r');
        $ouvrirEcriture = fopen('aver_mdb_modifie.sql', 'w');

        if ($ouvrirLecture) {
            while (($buffer = fgets($ouvrirLecture, 4096)) !== false)
            {
                fwrite($ouvrirEcriture, str_replace($origine, $final, $buffer));
            }

        }
            fclose($ouvrirEcriture);
            
            fclose($ouvrirLecture);
    }
    
    public function litBddAver($fichierRenomme)
    {
        $connect = new \mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
        if ($connect -> connect_errno)
        {
            printf("Verbindung fehlgeschlagen: %s\n", $connect->connect_error);
            exit();
        }

        $ouvrirLecture = fopen($fichierRenomme, 'r');
         
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
