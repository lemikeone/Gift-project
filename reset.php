<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Le Petit Cadeau</title>
    <?php include("styles.php"); ?>
</head>
<body>

<?php 
include("menu.php");
include("header.php"); 
include("configuration.php");

try {
$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
}
catch(PDOException $ex) 
    { 
        $msg = "Failed to connect to the database"; 
    } 
    
// Was the form submitted?
if (isset($_POST["ResetPasswordForm"]))
{
    // Gather the post data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $hash = $_POST["q"];

    // Use the same salt from the forgot_password.php file
    $salt = "89798S7D*!LKJ887#98!*";

    // Generate the reset key
    $resetkey = hash('sha512', $salt.$email);

    // Does the new reset key match the old one?
    if ($resetkey == $hash)
    {
        if ($password == $confirmpassword)
        {
            //has and secure the password
            $password = hash('sha512', $salt.$password);

            // Update the user's password
                $query = $conn->prepare('UPDATE users SET pass = :password WHERE email = :email');
                $query->bindParam(':password', $password);
                $query->bindParam(':email', $email);
                $query->execute();
                $conn = null;
            echo "Votre mot de passe à été réinitialisé";
        }
        else
            echo "Votre mot de passe ne correspond pas";
    }
    else
        echo "Votre clé de réinitilisation est invalide";
}

include("footer.php");
?>

</body>
</html>
