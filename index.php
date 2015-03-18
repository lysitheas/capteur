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

?>


<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8" />
	            <title>Réseaux de Capteurs</title>
		     <link rel="stylesheet" href="monstyle.css" type="text/css" /> 
	     </head>

	   <body style="background-color:#E0E0E0;margin-bottom:100px;" >
<img src="https://compareninja.com/public/images/loader_small.gif">
<?php



echo "Connexion a la base réussite:";
echo "<br/> table : Element";

$req_data = $bdd-> prepare('SELECT * FROM Element');

$req_data->execute();

echo "<table>";
?>
	<tr>
		<td>id</td>
		<td>JJ:MM:AA HH:MM:ss</td>
		<td>valeur</td>
	</tr>

<?php

$classesTD = array('impaire', 'paire');
$nombre = count($classesTD);
$compteur = 0;
$fp = fopen('file.csv', 'w');

while($ld= $req_data->fetch())
{
	echo "<tr class='" . $classesTD[ $compteur % $nombre] . "'>";
	echo "<td>" . $ld['id'] . "</td><td>" . $ld['ladate'] . "</td><td>" . $ld['valeur'] . "</td></tr>" ;
	$fields= $ld['id'] . "," . $ld['ladate'] . "," . $ld['valeur'] . "\n";
	
    fputs($fp, "$fields");
$compteur++;
}
echo "</table>";
fclose($fp);

?>

<a href="file.csv">
<img src="http://cdn-img.easyicon.net/png/5011/501149.png" width="50px;">
Download CSV</a>


</body>


</html>
