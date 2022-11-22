<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/incl/init.php');

$strPageTitle = 'Velkommen til min PHP side';
require_once(DOCROOT . '/assets/incl/header.php');
?>

<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam impedit ullam eius iste, eaque quidem natus! Blanditiis saepe harum, repellat assumenda autem possimus esse labore omnis iusto, voluptate laborum temporibus!</p>

<?php
require_once(DOCROOT . '/assets/incl/footer.php');
?>

<?php
$modtagerNavn = "Bo Nicolajsen";
$afsenderNavn = "Tina";
$beløb = "21.405,52 kr.";
$donationsModtager = "Dyrenes beskyttelse";
$donationsNavn = "GeorgGiraf";
$textOne = "Vi skriver fordi der endnu er penge på din konto og den er blevet spærret. 
Grundet vi har skiftet platform bedes du oprette din konto på ny med email adressen: bo@someplace.dk 
- Efter oprettelse vil dine penge vente på din konto hvor du enten kan bruge dem eller få dem udbetalt. <br>  
Beløb tilgængeligt opgjort pr. :";

$modtagerNavn = strtoupper($modtagerNavn);
$textOne = strtoupper($textOne);
$beløb = strtoupper($beløb);
$afsenderNavn = strtoupper($afsenderNavn);

echo "<div>Til $modtagerNavn $textOne $beløb <br>
venlig hilsen $afsenderNavn
</div> <br>

<div> 
Hel $afsenderNavn <br>

Da jeg er ufattelig rig, og derfor ikke har brug for pengene. Ser jeg gerne at i <br>

donere alle pengene til $donationsModtager. Under navnet $donationsNavn. <br>

Venlig hilsen Bo
</div>"
?>