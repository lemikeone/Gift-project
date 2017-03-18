<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giftendly : Votre profil</title>
	<?php include("styles.php"); ?>
</head>
<body>

<?php 
include("menu.php");
include("header.php"); 

setlocale(LC_TIME, 'fr_FR');

 //Fonction to check next birthday
    function get_next_birthday($birthday) {
        $date = new DateTime($birthday);
        $date->modify('+' . date('Y') - $date->format('Y') . ' years');
        $dateplus = new DateTime();
        $dateplus->modify('-1 day');
        if($date < $dateplus) {
        $date->modify('+1 year');
        }

        return $date->format('Y-m-d');
        }

    // Calculate age of contact
    function age($date)
        {
        $dna = strtotime($date);
        $now = time();
         
        $age = date('Y',$now)-date('Y',$dna);
        if(strcmp(date('md', $dna),date('md', $now))>0) $age--;
       
        return $age;
        }

if (isset($_SESSION['id'])) {
$userid = $_SESSION['id'];

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

$reponse = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$reponse->execute(array($userid));
$donnees = $reponse->fetch();

echo '<h1>'.$donnees['pseudo'].'</h1><h3>Activer / desactiver les notifications pour :</h3>';

if ($donnees['notifanniversaire'] == 0) {
?>
<a href="notificationsprofil.php?notifanniversaire=1" class="btn btn-default"><i class="fa fa-bell" aria-hidden="true"></i> Anniversaires</a>
<?php } ?>
<?php if ($donnees['notifanniversaire'] == 1) {
?>
<a href="notificationsprofil.php?notifanniversaire=0" class="btn btn-default"><i class="fa fa-bell-slash" aria-hidden="true"></i></i> Anniversaires</a>
<?php }

if ($donnees['notifsaintvalentin'] == 0) {
?>
<a href="notificationsprofil.php?notifsaintvalentin=1" class="btn btn-default"><i class="fa fa-bell" aria-hidden="true"></i> Saint Valentin</a>
<?php } ?>
<?php if ($donnees['notifsaintvalentin'] == 1) {
?>
<a href="notificationsprofil.php?notifsaintvalentin=0" class="btn btn-default"><i class="fa fa-bell-slash" aria-hidden="true"></i></i> Saint Valentin</a>
<?php }

if ($donnees['notiffetedesmeres'] == 0) {
?>
<a href="notificationsprofil.php?notiffetedesmeres=1" class="btn btn-default"><i class="fa fa-bell" aria-hidden="true"></i> Fête des mères</a>
<?php } ?>
<?php if ($donnees['notiffetedesmeres'] == 1) {
?>
<a href="notificationsprofil.php?notiffetedesmeres=0" class="btn btn-default"><i class="fa fa-bell-slash" aria-hidden="true"></i></i> Fête des mères</a>
<?php }

if ($donnees['notiffetedesperes'] == 0) {
?>
<a href="notificationsprofil.php?notiffetedesperes=1" class="btn btn-default"><i class="fa fa-bell" aria-hidden="true"></i> Fête des pères</a>
<?php } ?>
<?php if ($donnees['notiffetedesperes'] == 1) {
?>
<a href="notificationsprofil.php?notiffetedesperes=0" class="btn btn-default"><i class="fa fa-bell-slash" aria-hidden="true"></i></i> Fête des pères</a>
<?php }

if ($donnees['notiffetedesgrandsmeres'] == 0) {
?>
<a href="notificationsprofil.php?notiffetedesgrandsmeres=1" class="btn btn-default"><i class="fa fa-bell" aria-hidden="true"></i> Fête des grands-mères</a>
<?php } ?>
<?php if ($donnees['notiffetedesgrandsmeres'] == 1) {
?>
<a href="notificationsprofil.php?notiffetedesgrandsmeres=0" class="btn btn-default"><i class="fa fa-bell-slash" aria-hidden="true"></i></i> Fête des grands-mères</a>
<?php }

if ($donnees['notifnoel'] == 0) {
?>
<a href="notificationsprofil.php?notifnoel=1" class="btn btn-default"><i class="fa fa-bell" aria-hidden="true"></i> Noël</a>
<?php } ?>
<?php if ($donnees['notifnoel'] == 1) {
?>
<a href="notificationsprofil.php?notifnoel=0" class="btn btn-default"><i class="fa fa-bell-slash" aria-hidden="true"></i></i> Noël</a>
<?php }


}

?>
<br><br>

<?php include("footer.php"); ?>

</body>
</html>