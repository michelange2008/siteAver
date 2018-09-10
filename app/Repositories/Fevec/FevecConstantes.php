<?php
namespace app\Repositories\Fevec;

class FevecConstantes
{
    const BDD_AVER_ORIGINE = "aver_import.sql"; // Nom du fichier sql téléchargé
    const BDD_AVER_MODIFIEE = 'aver_mdb_modifie.sql'; // Nom du fichier sql après modification par le trait RenommeBddAver
    
    const ENTETE_ORIGINE = ["Clients", "RaceDominante", "Troupeaux", "TypeActivite", "Typefev_troupeaux"];
    const ENTETE_MODIFIE = ["fev_clients", "fev_racedominante", "fev_troupeaux", "fev_typeactivite", "fev_typetroupeaux"];
    
}

