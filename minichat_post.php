
<?php 

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

if (!strlen(trim($_POST['message']))) 
{
echo '<p>Tu n\'a rien écrit! Si tu veux faire un hommage, il faut écrire dans la zone de texte puis valider. </p>';
}
else 
{

$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

header('Location: minichat.php');
}
?>

</body>
</html>


