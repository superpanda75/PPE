<?php

function send($exp,$dest,$message,$date){
    $key = connector();
    $query = $key->prepare('INSERT INTO messages
                              (expediteur,destinataire,message,date)
                            VALUES
                              (:exp,:des,:msg,:dat)');
    $query->bindParam(':exp', $exp, PDO::PARAM_INT);
    $query->bindParam(':des', $dest, PDO::PARAM_INT);
    $query->bindParam(':msg', $message, PDO::PARAM_STR);
    $query->bindParam(':dat', $date);
    return $query->execute();
}

function getMessage($exp,$dest){
    $key = connector();
    $query = $key->prepare('SELECT *
                            FROM messages
                            WHERE
                            (expediteur =:exp AND destinatire =:des)
                            OR
                            (expediteur =:des AND destinaire =:exp)
                            ');
    $query->bindParam(':exp',$exp, PDO::PARAM_INT);
    $query->bindParam(':des',$dest, PDO::PARAM_INT);
    return $query->fetchAll();
}
?>