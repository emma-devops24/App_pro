<?php
$conn = new PDO("mysql:host=localhost;dbname=app_pro", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (!$conn) {
    die("Erreur de connexion à la base de données.");
}
if (isset($_POST['boutton'])) {
$email = $_POST['Email'];
$password = password_hash($_POST['Motdepasse'], PASSWORD_DEFAULT);
$password1 = password_hash($_POST['Motdepasse1'], PASSWORD_DEFAULT);
} else {
    die("Formulaire non soumis correctement.");
}
// Vérification de la correspondance des mots de passe
if ($password !== $password1) {
    die("Les mots de passe ne correspondent pas.");
}
// Mise à jour du mot de passe et reset du code
$sql = "UPDATE information 
        SET Motdepasse='$password', reset_code=NULL 
        WHERE email='$email'";

$conn->query($sql);

echo "Votre mot de passe a été réinitialisé avec succès.";
?>
