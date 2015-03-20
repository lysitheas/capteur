<?php

setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=capteur;charset=utf8', 'capteur', 'europ');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
