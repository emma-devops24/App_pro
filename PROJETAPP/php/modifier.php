<?php 
session_start();
// Connexion BD
require_once 'dbconn.php';

$message = "";
$type = "";

 if(!isset($_GET['Email'])){
    $message = "Email manquant !";
    $type = "error";
}else{
    $email = $_GET['Email'] ?? '';
}
if(isset($_POST['button1'])){
    $email = htmlspecialchars($_POST['Email']);
    $password = htmlspecialchars($_POST['Motdepasse']);
    $password1 = htmlspecialchars($_POST['Motdepasse1']);
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    if ($password === $password1) {
        $mod = $conn->prepare("UPDATE information SET Motdepasse= :nouveau WHERE Email= :email");
        $mod->execute([
            ':nouveau' => $pass_hash,
            ':email'   => $email
        ]);
        $message = "Mot de passe modifié avec succès ! Veuillez vous reconnecter.";
        $type = "success";
        header("Location: connexion.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit();
        } else {
            $_SESSION['nouveau'] = $password;
            $_SESSION['nouveau1'] = $password1;
        $message = "Les mots de passe sont différents. Veuillez réessayer.";
        $type = "error";
        header("Location: modifier.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        }
    } 
    
if(isset($_POST['button2'])){
    $message = "La modification du mot de passe a été annulée.";
    $type = "info";
    header("Location: connexion.php?message=" . urlencode($message) . "&type=" . urlencode($type));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/modifier.css" >
    <script src="../js/modifier.js"></script>
    <title>MODIFIER</title>
</head>
<body>
    <section class="message">
        <?php if (!empty($message)) : ?>
        <div style="
            padding: 12px;
            margin: 5px;
            border-radius: 5px;
            text-align: center;
            color: white;
            font-weight: bold;
            background-color: <?= ($type === 'info') ? '#0d8ecf': (($type === 'error') ?'#ff0019ff':(($type ==='success')? 'rgba(0, 255, 8, 1)': '#ccc'))?>;
        ">
            <?= $message; ?>
        </div>
        <?php endif; ?>
    </section>
    <section class="boite">
        <form action="" method="POST">
            <i class="fa-duotone fa-solid fa-circle-user"></i>
            <h1>MODIFIER VOTRE MOT DE PASSE</h1>
            <div class="changement">
                <label for="Email"><strong>Email:</strong></label><br><input type="email" value="<?php echo $_GET['Email']; ?>" name="Email" placeholder="exemple@gmail.com" required>
                <i class="fa-regular fa-envelope"></i>
                <div class="password-container">
                    <label><strong>Nouveau mot de passe:</strong></label><br><input type="password" value="<?= htmlspecialchars($_SESSION['nouveau'] ?? '') ?>" name="Motdepasse" id="motdepasse" placeholder="Nouveau mot de passe" required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i id="icon-eye" class="fas fa-eye-slash"></i>
                    </span>
                </div>
                <label><strong>Confirmer le nouveau mot de passe:</strong></label><br><input type="password" value="<?= htmlspecialchars($_SESSION['nouveau1'] ?? '') ?>" name="Motdepasse1" id="motdepasse2" placeholder="Confirmation du nouveau mot de passe" required>
                <span class="toggle-password" onclick="toggle()">
                    <i id="icon-eye2" class="fas fa-eye-slash"></i>
                </span><br>
                <button type="submit" id="button1" name="button1"><strong>Modifier le mot de passe</strong></button>
                <button type="submit" id="button2" name="button2"><strong>Annuler</strong></button>
            </div>
        </form>
    </section>
</body>
</html>
