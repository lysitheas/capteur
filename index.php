<?php
include ("include_codb.php");

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
echo "<br/><h3> table : Element</h3>";

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


<h3>table : loramote</h3>
<?php

$req_dataL = $bdd-> prepare('SELECT * FROM loramote');

$req_dataL->execute();

echo "<table>";
?>
	<tr>
		<td>id</td>
		<td>sequence</td>
		<td>ladate</td>
		<td>node</td>
		<td>chan</td>
		<td>frequence</td>
		<td>bandwidth</td>
		<td>adr</td>
		<td>sf</td>
		<td>rssidbm</td>
		<td>snrdb</td>
		<td>leport</td>
		<td>lesdata</td>

	</tr>
<?php
$classesTD = array('impaire', 'paire');
$nombre = count($classesTD);
$compteur = 0;


while($ld= $req_dataL->fetch())
{
	echo "<tr class='" . $classesTD[ $compteur % $nombre] . "'>";
	echo "<td>" . $ld['id'] . "</td><td>" . $ld['sequence'] . "</td><td>" . $ld['ladate'] . "</td><td>" . $ld['node'] . "</td><td>" . $ld['chan'] . "</td><td>" . $ld['fequence'] . "</td><td>" . $ld['bandwidth'] . "</td><td>" . $ld['adr'] . "</td><td>" . $ld['sfval'] . "</td><td>" . $ld['rssidbm'] . "</td><td>" . $ld['snrdb'] . "</td><td>" . $ld['leport'] . "</td><td>" . $ld['lesdata'] . "</td><tr>";
$compteur++;	
}

?>
</table>
</body>


</html>
