<?php
session_start();
// Connexion BD
require_once 'dbconn.php';
$message = "";
$type = "";

/* ================================
   1. Connexion automatique via Cookie
=================================== */

/*if (!isset($_POST['button']) && isset($_COOKIE['usertoken'])) {

    $token = $_COOKIE['usertoken'];
    $token_hash = hash('sha256', $token);

    $stmt = $conn->prepare("SELECT * FROM information WHERE token = :token_hash");
    $stmt->execute([':token_hash' => $token_hash]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $message = "BIENVENUE SUR NOTRE PAGE, QUE COMMANDER VOUS : " . htmlspecialchars($user['Nom']) . " " . htmlspecialchars($user['Prenom']);
        $type = "success";
        header("Location: ../../accueil.html?message=" . rawurlencode($message) . "&type=" . urlencode($type));
        exit();
    }
}
*/

/* ================================
   2. Connexion classique
=================================== */

if (isset($_POST['button'])) {

    $email       = trim($_POST['Email']);
    $motdepasse  = trim($_POST['Motdepasse']);
    $souvenir    = isset($_POST['souvenir']);

    // Récupérer l'utilisateur
    $stmt = $conn->prepare("SELECT * FROM information WHERE Email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        if (password_verify($motdepasse, $user['Motdepasse'])) {

            $message = "BIENVENUE SUR NOTRE PAGE, QUE COMMANDER VOUS : " . htmlspecialchars($user['Nom']) . " " . htmlspecialchars($user['Prenom']);
            $type = "success";
            

            /* --- Gestion du token si "Se souvenir" est coché --- */
            if ($souvenir) {

                // Token 
                $token = bin2hex(random_bytes(32));
                // Token hashé pour la BD
                $token_hash = hash('sha256', $token);

                // Mise à jour BD
                $insert = $conn->prepare("UPDATE information SET token = :token_hash WHERE Email = :email");
                $insert->execute([
                    ':token_hash' => $token_hash,
                    ':email'      => $email
                ]);
                // Cookie pour stocker le token côté client (30 jours)
                setcookie('usertoken', $token, time() + 60, "/", "", false, true);
/*
time() + 60        // 1 minute

time() + 3600      // 1 heure

time() + 86400     // 1 jour (24h)

time() + 604800    // 1 semaine (7 jours)

time() + 2592000   // 30 jours
*/
            }
            // Stocker l'ID utilisateur en session
                $_SESSION['user_id'] = $user['idetudiant'];
            header("Location: ../../accueil.html?message=" . rawurlencode($message) . "&type=" . urlencode($type));
            exit();
        } else {
            $message = "Mot de passe incorrect !";
            $type = "error";
        }

    } else {
        $message = "Email introuvable !";
        $type = "error";
    }
}


// Message via GET (après redirection) 
if (isset($_GET['message']) && isset($_GET['type'])) {
    $message = $_GET['message'];
    $type = $_GET['type'];
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="../css/connexion.css">
    <script src="../js/icon.js"></script>
    <title>CONNEXION</title>
</head>
<body>
    <section class="message">
        <?php if (!empty($message)) : ?>
        <div style="
            padding: 12px;
            margin: 5px;
            margin-top: -15px;
            border-radius: 5px;
            text-align: center;
            color: white;
            font-weight: bold;
            background-color: <?= ($type === 'info') ? '#0d8ecf' : (($type === 'error') ? '#ff0019ff' : (($type === 'success') ? 'rgba(0, 255, 8, 1)' : '#ccc')); ?>;

        ">
            <?= $message; ?>
        </div>
        <?php endif; ?>
    </section>
    <section class="conteneur">
        <div id="image">
            <img src="../IMAGE/image(20).jpeg" alt="">
        </div>
        <p id="uiya"><strong>Restaurant UIYA</strong></p>
        <p id="uiya1">Connecter vous à votre espace</p>
        <form method="post" action="">
        <div class="information">
            <label for="Email"><strong>Email:</strong></label><br>
            <input type="email" id="Email" name="Email"  placeholder="exemple@gmail.com" required><br>
            <i class="fa-regular fa-envelope"></i>
            <div class="password-container">
                <label for="motdepasse"><strong>Mot de passe:</strong></label>
                <input type="password" name="Motdepasse" id="motdepasse" placeholder="Inserer votre mot de passe" required>
                <span class="toggle-password" onclick="togglePassword()">
                    <i id="icon-eye" class="fas fa-eye-slash"></i>
                </span>
            </div><br>
        </div>
        <div class="autre">
            <input type="checkbox" id="remember" name="souvenir"><label for="remember">Se souvenir</label> 
            <a href="verifieremail.php" id="lien">Mot de passe oublié?</a><br>
        </div>
        
        <div class="futter">
            <button type="submit" id="button" name="button"><strong>Se connecter</strong></button>
        
        <p><strong>......................................................................ou......................................................................</strong></p>
        <div class="inscription">
            <p>Pas encore inscrit?</p>
            <a href="inscription.php" id="btm">S'inscrire</a>
        </div></div>
    </section>
    </form>
</body>
</html>