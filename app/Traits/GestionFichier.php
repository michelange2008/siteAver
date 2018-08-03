<?php
namespace app\Traits;

trait GestionFichier
{
    
    public function chercheFichier($path)
    {
        $dir = array_slice(scandir($path), 2);
        return collect($dir);
    }
    
    public function detruitFichier($path, $file)
    {
    if($this->chercheFichier($path)->contains($file))
        {
            unlink($path.'/'.$file);
        }
    }
}

