<?php 
session_start();
$message = "";
$type = "";

try {
    $conn = new PDO("mysql:host=localhost;dbname=projetapp", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e){
    echo "Erreur de connexion: ".$e->getMessage();
}

if(isset($_POST['btn'])){

    $Nom        = htmlspecialchars(trim($_POST['Nom']));
    $Prenom     = htmlspecialchars(trim($_POST['Prenom']));
    $Email      = htmlspecialchars(trim($_POST['Email']));
    $Motdepasse = htmlspecialchars (password_hash(trim($_POST['Motdepasse']), PASSWORD_DEFAULT));
    $Contact    = htmlspecialchars(trim($_POST['Contact']));
    $Filiere    = htmlspecialchars_decode(trim($_POST['Filiere']));
    $Niveau     = htmlspecialchars(trim($_POST['Niveau']));

    // Valider le format de l'email
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        $message = "Format d'email invalide! Veuillez réessayer.";
        $type = "error";
    }

    // Vérifier si email ou contact existe déjà
    $req = $conn->prepare("SELECT 1 FROM information WHERE Email = :email OR Contact = :contact");
    $req->execute([
        ':email'   => $Email,
        ':contact' => $Contact
    ]);

    if($req->fetch(PDO::FETCH_ASSOC)){
        $message = "L'email ou le contact est déjà utilisé !";
        $type = "error";
    }
    else {
        $req = $conn->prepare("
            INSERT INTO information (Nom, Prenom, Email, Motdepasse, Contact, Filiere, Niveau)
            VALUES (:Nom, :Prenom, :Email, :Motdepasse, :Contact, :Filiere, :Niveau)
        ");

        $req->execute([
            ':Nom'        => $Nom,
            ':Prenom'     => $Prenom,
            ':Email'      => $Email,
            ':Motdepasse' => $Motdepasse,
            ':Contact'    => $Contact,
            ':Filiere'    => $Filiere,
            ':Niveau'     => $Niveau
        ]);

        $message = "Inscription enregistrée avec succès ! Vous pouver maintenant vous connecté";
        $type = "success";
        header("location:connexion.php?message=" .rawurlencode($message) ."&type=". urlencode($type));
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="inscription.css">
    <script src="symbole.js"></script>
    <title>INSCRIPTION</title>
</head>
<body>
    <section class="message">
        <?php if (!empty($message)) : ?>
        <div style="
            padding: 12px;
            margin: 5px;
            display:grid;
            margin-top: -15px;
            margin-left: -100px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            background-color: <?= ($type === 'success') ? 'rgba(0, 255, 8, 1)' : '#ff0019ff'; ?>;
        ">
            <?= $message; ?>
        </div>
        <?php endif; ?>
    </section>
    <section class="inscription">
        <form action="" method="POST">
            <i class="fa-solid fa-address-card"></i>
            <h1>INSCRIPTION</h1>
            <label for="Nom"><strong>Nom:</strong></label><br><input type="text" name="Nom" placeholder="Insérer votre nom" required><br>
            <label for="Prenom"><strong>Prénom:</strong></label><br><input type="text" name="Prenom" placeholder="Insérer votre prénom" required><br>
            <label for="Email"><strong>Email:</strong></label><br><input type="email" name="Email" placeholder="exemple@gmail.com" required>
            <i class="fa-solid fa-square-envelope"></i>
            <div class="password-container">
                <label form="mot de passe"><strong>Mot de passe:</strong></label><br><input type="password" id="motdepasse" name="Motdepasse" placeholder="Insérer votre mot de passe" required>
                <span onclick="icon()">
                    <i id="icon-lock" class="fa-solid fa-lock"></i>
                </span>
            </div>
            <label for="Contact"><strong>Contact:</strong></label><br><input type="tel" name="Contact" placeholder="Insérer votre numéro de téléphone" required>
            <i class="fa-solid fa-mobile-screen"></i><br>
            <label for="filiere"><strong>Filière:</strong></label><br>
            <select name="Filiere" id="filiere" required>
                <option><strong>-------------------choisisser votre filière-------------------</strong></option>
                <option value="INFORMATIQUE OPTION GENIE LOGICIEL" required><strong>INFORMATIQUE OPTION GENIE LOGICIEL</strong></option>
                <option value="DROIT" required><strong>DROIT</strong></option>
                <option value="COMMUNICATION" required><strong>COMMUNICATION</strong></option>
                <option value="SCIENCE ECONOMIQUE ET DE GESTION" required><strong>SCIENCE ECONOMIQUE ET DE GESTION</strong></option>
                <option value="ANGLAIS" required><strong>ANGLAIS</strong></option>
            </select><br>

            <label for="niveau"><strong>Niveau:</strong></label><br>
            <select name="Niveau" id="niveau" required>
                <option><strong>---choisisser votre niveau---</strong></option>
                <option value="LICENCE 1" required><strong>LICENCE 1</strong></option>
                <option value="LICENCE 2" required><strong>LICENCE 2</strong></option>
                <option value="LICENCE 3" required><strong>LICENCE 3</strong></option>
                <option value="MASTER 1" required><strong>MASTER 1</strong></option>
                <option value="MASTER 2" required><strong>MASTER 2</strong></option>
            </select><br>
            <button type="submit" id="button" name="btn"><strong>S'inscrire</strong></button>
        </form>
    </section>
</body>
</html>
