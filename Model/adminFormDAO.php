<?php


function search($string)
{
    $link = connector();

//recherche des résultats dans la base de données
    $result = $link->query('SELECT *
                          FROM formation
                          WHERE titre LIKE \'' .$string . '%\'
                          LIMIT 15');
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


?>