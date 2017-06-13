
<?php
require 'Model/connect.php';
require 'Model/FormationDAO.php';
require 'Model/AdresseDAO.php';
require 'Model/PrestataireDAO.php';
require 'corps/formation.php';

if(!function_exists('makeFormation')){
    /**
     * @param $formation
     * @return Formation
     */
    function makeFormation($formation){
        $formation = $formation[0];
        $adresse = getAdresseById(intval($formation['adresse_f']));

        $adresseString = $adresse[0]['numero_rue'] . " "
            . $adresse[0]['rue'] . ", "
            . $adresse[0]['ville'] . " "
            . $adresse[0]['code_postal'];

        $typeF = getTypeById(intval($formation['type_f']));
        $typeF = $typeF[0]['type'];

        $presta = getPrestatireById(intval($formation['prestataire_f']));
        $presta = $presta[0]['raison_sociale']." -- ".$presta[0]['nom'] ;

        $formation['date_debut'] = date( 'd/m/Y à H:i', strtotime( $formation['date_debut'] ) );
        $F = new Formation(
            $formation['id_f'],
            $formation['titre'],
            $formation['cout'],
            $formation['date_debut'],
            $formation['duree'],
            NULL,
            $formation['nb_place'],
            $typeF,
            $presta,
            $adresseString,
            $formation['contenu']
        );
        return $F;
    }
}

if(isset($_GET['F'])){
    $f = intval($_GET['F']);
    $nombres = "^[0-9]{1,10}^";
    if (preg_match($nombres,$f)){
        $id=$f;
        $formation = getFormationById($id);
        if(!$formation){
            header('location:accueil');
        }else{
            $formation = makeFormation($formation);
        }
    }

}



require('corps/invoice.php');

$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "Maison Des Ligues de la Lorraine",
    "13 rue Jean Moulin - BP 70001\n" .
    "54510 TOMBLAINE,\n".
    "France"
);
$pdf->fact_dev( "Fiche formation" );
$pdf->temporaire( "Fiche Formation" );
$pdf->addDate( utf8_decode($formation->getTitre()));
/*$pdf->addClient("CL01");
$pdf->addPageNumber("1");*/
$pdf->addClientAdresse(utf8_decode("Ceci est le document officiel de la formation.\n"."Sur ce dernier, vous trouverez tous les détails concernant la formation."));
$pdf->addReglement(utf8_decode($formation->getTypeFormation()));
$pdf->addEcheance(utf8_decode($formation->getDateDebut()));
$pdf->addNumTVA(utf8_decode($formation->getPrestataire()));

$cols=array( "TYPE"    => 23,
    "CONTENU"  => 78,
    "DUREE"     => 22,
    "COUT"      => 26,
    "ADRESSE" => 30,
    "NbPl"          => 11 );
$pdf->addCols( $cols);
$cols=array( "TYPE"    => "L",
    "CONTENU"  => "L",
    "DUREE"     => "C",
    "COUT"      => "R",
    "ADRESSE" => "R",
    "NbPl"          => "C" );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 109;
$line = array( "TYPE"    => utf8_decode($formation->getTypeFormation()),
    "CONTENU"  => utf8_decode($formation->getContenu())."\n",
    "DUREE"     => utf8_decode($formation->getDuree())." jours",
    "COUT"      => utf8_decode($formation->getCout()." crédits"),
    "ADRESSE" => utf8_decode($formation->getAdresse()),
    "NbPl"          => utf8_decode($formation->getNbPlace()));
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;


$pdf->Output();
?>