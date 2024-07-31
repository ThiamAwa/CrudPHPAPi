<?php
    $serveur='127.0.0.1';
    $user='root';
    $password='';
    $dbname='dbpersonnes';

    try {
        $db= new PDO("mysql:host={$serveur};dbname={$dbname};charset=utf8",$user,$password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur de connexion ".$e->getMessage();
        die();
    }
?>