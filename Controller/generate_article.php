<?php

require 'MODEL/base.php';

function Get_nb_formations(){
    $formations['nombre_formation']=Get_nb_formation();
    return $formations['nombre_formation'];
}


function Get_titre_formations($i){
    $formations['titre_formation']=Get_formation_titre($i); #t
    $formations['contenu_formation']=Get_formation_contenu($i); #c
    return $formations;
}
function Get_formations($i){
    $formations['titre_formation']=Get_formation_titre($i); #t
    $formations['contenu_formation']=Get_formation_contenu($i); #c
    return $formations;
}


?>


