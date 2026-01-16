<?php
session_start();
// Connexion BD
require_once 'PROJETAPP/php/dbconn.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT Nom, Prenom, Email, Contact, Filiere, Niveau FROM information WHERE idetudiant = :id");
    $stmt->execute([':id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Restaurant UIYA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="profil.css">
</head>
<body>
    <section>
        <nav>
            <div class="header">
                <div class="container">
                    <img src="logo.png" alt="png">
                </div>
            </div>
            
            <div class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <ul id="navMenu">
                <li><a href="accueil.html">Accueil</a></li>
                <li><a href="menus.html">Menus</a></li>
                <li><a href="propos.html">À propos</a></li>
                <li><a href="profil.php">Profil</a></li>
            </ul>
        
            <div class="lien">
                <a href="reservation.html">Réservation</a>
            </div>
        </nav>
    </section>

    <section class="profile-section">
        <div class="profile-header">
            <h1>Mon <span>Profil</span></h1>
        </div>

        <div class="profile-container">
            <div class="profile-card">
                <div class="profile-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h2><?= htmlspecialchars($user['Nom'])." ".htmlspecialchars($user['Prenom']) ?></h2>
                <p>Client fidèle depuis 2023</p>
                <button class="btn btn-yellow">Modifier le profil</button>
            </div>

            <div class="profile-info">
                <div class="info-section">
                    <h3>Informations personnelles</h3>
                    <div class="info-item">
                      <p class="info-label"><strong>Nom complet:</strong> <?= htmlspecialchars($user['Nom'])." ".htmlspecialchars($user['Prenom']) ?></p>
                      
                    </div>
                    <div class="info-item">
                        <p class="info-label"><strong>Email:</strong> <?= htmlspecialchars($user['Email']) ?></p>
                    </div>
                    <div class="info-item">
                        <p class="info-label"><strong>Téléphone:</strong> <?= htmlspecialchars($user['Contact']) ?></p>
                    </div>
                    <div class="info-item">
                        <p class="info-label"><strong>Filière:</strong> <?= htmlspecialchars($user['Filiere']) ?></p>
                    </div>
                    <div class="info-item">
                        <p class="info-label"><strong>Niveau:</strong> <?= htmlspecialchars($user['Niveau']) ?></p>
                    </div>
                </div>

                <div class="info-section">
                    <h3>Statistiques</h3>
                    <div class="info-item">
                        <span class="info-label">Commandes totales</span>
                        <span class="info-value">15</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Plat favori</span>
                        <span class="info-value">Salade Spéciale</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Points de fidélité</span>
                        <span class="info-value">250 points</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="preferences-section">
            <h3>Mes Préférences</h3>
            <div class="preferences-grid">
                <div class="preference-card">
                    <i class="fas fa-leaf"></i>
                    <h4>Cuisine Saine</h4>
                    <p>Je préfère les plats à base d'ingrédients naturels et biologiques</p>
                </div>
                
                <div class="preference-card">
                    <i class="fas fa-pepper-hot"></i>
                    <h4>Saveurs Épicées</h4>
                    <p>J'aime les plats relevés avec des épices traditionnelles</p>
                </div>
                
                <div class="preference-card">
                    <i class="fas fa-clock"></i>
                    <h4>Service Rapide</h4>
                    <p>Je préfère être servi rapidement</p>
                </div>
            </div>
        </div>

        <div class="orders-section">
            <h3>Mes Dernières Commandes</h3>
            
            <div class="order-item">
                <div class="order-info">
                    <h4>Salade Spéciale + Boisson</h4>
                    <p>Commande du 25 novembre 2024 - 15 500 FCFA</p>
                </div>
                <span class="order-status status-completed">Livré</span>
            </div>
            
            <div class="order-item">
                <div class="order-info">
                    <h4>Plat Principal + Dessert</h4>
                    <p>Commande du 20 novembre 2024 - 12 000 FCFA</p>
                </div>
                <span class="order-status status-completed">Livré</span>
            </div>
            
            <div class="order-item">
                <div class="order-info">
                    <h4>Menu Complet</h4>
                    <p>Commande du 15 novembre 2024 - 18 500 FCFA</p>
                </div>
                <span class="order-status status-pending">En préparation</span>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer_main">
            <div class="footer_tag">
                <h2>Localisation</h2>
                <p>Côte d'Ivoire</p>
                <p>Yamoussoukro</p>
                <p>227_Logements</p>
                <p>UIYA</p>
            </div>

            <div class="footer_tag">
                <h2>Quick Link</h2>
                <p>Accueil</p>
                <p>Menus</p>
                <p>À Propos</p>
                <p>Profil</p>
            </div>

            <div class="footer_tag">
                <h2>Contact</h2>
                <p>+225 07-07-87-54-97</p>
                <p>+225 05-05-78-55-99</p>
                <p>emmanuela24@gmail.com</p>
                <p>food_uiya@gmail.com</p>
            </div>

            <div class="footer_tag">
                <h2>Nos Services</h2>
                <p>Fast Delivery</p>
                <p>Paiement Facile</p>
                <p>24 x 7 Services</p>
            </div>

            <div class="footer_tag">
                <h2>Followers</h2>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>
        </div>

     <p class="end">Design by <span><i class="fa-solid fa-face-grin"></i>Emma Design</span></p>
    </footer>

    <script>
    function toggleMenu() {
      const navMenu = document.getElementById('navMenu');
      navMenu.classList.toggle('active');
    }

    // Fermer le menu quand on clique sur un lien
    document.querySelectorAll('#navMenu a').forEach(link => {
      link.addEventListener('click', () => {
        document.getElementById('navMenu').classList.remove('active');
      });
    });
    </script>

</body>
</html>