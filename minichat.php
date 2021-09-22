<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super mini-chat</title>
    </head>

 <body>

<h1>Bienvenue dans mon mini-chat !</h1>

<form action="minichat_post.php" method="post">
    <label for="pseudo">Votre pseudo:</label>
    <textarea id="pseudo" name="pseudo" rows="1" cols="20" maxlength="255"> </textarea>
    <label for="message">Votre message:</label>
    <textarea id="message" name="message" rows="20" cols="80" maxlength="1500"> </textarea>
    <input type="submit" value="Valider" />
 
<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());

}

$reponse = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0,9');

while ($donnees = $reponse->fetch())
{
?>

<p>
<?php echo $donnees['id']; ?>.<br />
Le message de : " <?php echo htmlspecialchars($donnees['pseudo']); ?>" est : " <?php echo htmlspecialchars($donnees['message']); ?>"
</p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>

 </body>
</html>