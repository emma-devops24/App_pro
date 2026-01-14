<?php
// Charger Composer
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Connexion à la base de données
try {
    $conn = new PDO("mysql:host=localhost;dbname=app_pro", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Si formulaire soumis
if (isset($_POST['boutton'])) {

    $email = trim(htmlspecialchars($_POST['Email']));

    // Vérifier si email existe dans la BD
    $stmt = $conn->prepare("SELECT * FROM information WHERE Email = :email");
    $stmt->execute([':email' => $email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        die("Cet email n'existe pas !");
    }

    // Génération du code OTP
    $code = random_int(100000, 999999);

    // Sauvegarde du code dans la BD
    $update = $conn->prepare("UPDATE information SET resetcode = :code WHERE Email = :email");
    $update->execute([
        ':code' => $code,
        ':email' => $email
    ]);

    // ENVOI EMAIL AVEC PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Paramètres SMTP Gmail
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // Mets ton email + mot de passe d'application ici
        $mail->Username   = 'christkouame12.uiya@gmail.com';
        $mail->Password   = 'ervx cdmm wnah xrlb';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet= 'UTF-8';
        $mail->Encoding='base64';

        // Destinataire + expéditeur
        $mail->setFrom('christkouame12.uiya@gmail.com', 'Sécurité du compte');
        $mail->addAddress($email);

        // Contenu du message
        $mail->isHTML(true);
        $mail->Subject = "Code de vérification";
        $mail->Body    = "
            <p>Bonjour,</p>
            <p>Voici votre code de vérification :</p>
            <h2 style='color:blue;'>$code</h2>
            <p>Ce code expire dans quelques minutes.</p>
        ";

        $mail->send();

    } catch (Exception $e) {
        die("Erreur lors de l'envoi du mail : " . $mail->ErrorInfo);
    }

    // Redirection vers la page du code
    header("Location: verifcode.php?Email=" . urlencode($email));
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="verifieremail.css">
    <title>Vérification Email</title>
</head>
<body>
    <section class="container">
        <form action="" method="POST">
            <h1>Vérification de l'Email</h1>
            <p>Veuillez entrer votre adresse email pour recevoir un code de vérification.</p>

            <label for="email"><strong>Email:</strong></label><br>
            <input type="email" name="Email" placeholder="Votre email" required>
            <br><br>

            <button type="submit" id="button" name="boutton">
                <strong>Envoyer le code</strong>
            </button>
        </form>
    </section>
</body>
</html>
