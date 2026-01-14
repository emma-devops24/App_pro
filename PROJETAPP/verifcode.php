<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=projetapp", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if (!isset($_GET['Email'])) {
    die("Email manquant !");
}

$email = $_GET['Email'];

if (isset($_POST['verif_code'])) {
    $code = trim(htmlspecialchars($_POST['code']));
    
    // Vérifier le code
    $stmt = $conn->prepare("SELECT * FROM information WHERE Email = :email AND resetcode = :code");
    $stmt->execute(['email' => $email, 'code' => $code]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$row) {
        // Code correct, stocker l’email en session pour la page mot de passe
        $error = "Le code est incorrect ou a expiré !";
    } else {
        header("Location: modifier.php?Email=" . urlencode($email));
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification du code</title>
    <style>
        body { font-family: Arial; background: linear-gradient(135deg, #ffb400, #e5a100, #ff6f91); display:flex; justify-content:center; align-items:center; min-height:100vh;}
        .container { background:#fff; padding:25px; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1); width:90%; max-width:400px;}
        input{ width:93%; padding:12px; margin-bottom:15px; border-radius:8px; border:1px solid #ccc; font-size:16px; }
        button { background:#29ace4; color:#fff; border:none; cursor:pointer; width:100%; padding:12px; margin-bottom:15px; border-radius:8px; border:1px solid #ccc; font-size:16px;}
        button:hover { background:#4b0082; }
        .error { color:red; margin-bottom:15px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vérification du code</h2>
        <p>Entrez le code envoyé à votre email : <strong><?php echo htmlspecialchars($email); ?></strong></p>

        <?php if(isset($error)) { echo "<div class='error'>$error</div>"; } ?>

        <form method="POST" action="">
            <input type="text" name="code" placeholder="Code reçu" required>
            <button type="submit" name="verif_code">Vérifier</button>
        </form>
    </div>
</body>
</html>
