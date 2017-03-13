<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giftendly : connexion</title>
	<?php include("styles.php"); ?>
</head>
<body>
<?php 
include("menu.php");
include("header.php"); ?>

<?php
    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {  
        echo "Vous etes deja connecté";
        }
    
    else
        {
    	?>
    	<h1>Connexion</h1>
        <?php include("connexion.php"); ?>
        <br/>
        <?php 
        }

include("footer.php");

?>

</body>
</html>