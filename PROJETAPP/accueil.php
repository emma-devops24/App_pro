<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  </head>

<style>

  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
    font-weight: 400;
    
  }

    body{
      font-family: 'poppins', sans-serif;
      background-color: white ;
      margin: auto;
      
      

    }


     nav{
      display: flex;
      justify-content: space-around;
      align-items: center;
      position: absolute;
      right: 0;
      left: 0;
      background: white;
      box-shadow: 0 8px 10px rgba(218, 144, 7, 0.986);
      z-index: 1000;
      width: 100%;
      height: 90px;

    }

     section nav .container img{
      width: 200px;
      cursor: pointer;
      margin: 4px;

      
    }

     section nav ul{
      list-style: none;
      display: flex;

    }

    section nav ul li{
      display: inline-block;
      margin: 0 15px;
    }


     section nav ul li a{
        text-decoration: none;
        color: black;
        font-weight: 500;
        font-size: 17px;
        transition: 0.1s;
        

     
    }

    section nav ul li a::after{
      content: '';
      width: 0;
      height: 2px;
      background:rgba(65, 6, 55, 0.986);
      display: block;
      transition: 0.2s ;
    }

    section nav ul li a:hover::after{
      width: 100%;

    }
        
   section  nav ul li a:hover{
      color: rgba(65, 6, 55, 0.986);

    }

    

    section nav .lien a{
      text-decoration: none;
      color: #000;
      font-family: 'poppins',sans-serif;
      margin-left: 30px;
      padding: 12px 24px;
      border-radius: 2px;
      font-weight: 500;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
      background: #FFB400;
      color: rgb(49, 3, 49);
  
    }

    section nav .icon a:hover{
      background: #e5a100;

    }



    
    .container{
      max-width: 100%;
      margin: 6rem;

      
    }
    .container .nos-image{
      position: relative;
      top: 0%;
    }

    .home{
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 5%;
      background-color: white;
      position: relative;
      overflow: hidden;
      
    }

    .text{
      background: #d89f1930;
      display: inline-block;
      padding: 10px 5px 10px;
      border-radius: 8px;
    }
    .text p{
      color: black;
    }

    

    .home .intro{
      color: #999;
      font-size: 14px;
      margin-bottom: 10px ;
    }

    .home h1{
      font-size: 32px;
      color: #23233C;
      line-height: 1.3;
      margin-bottom: 10px;
    }

    .home .description{
      color: #777;
      font-size: 16px;
      margin-bottom: 30px;
    }

    .buttons{
      display: flex;
      gap: 20px;
    }
    .btn{
      padding: 12px 24px;
      border-radius: 2px;
      font-weight: 500;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .btn-yellow{
      background: #FFB400;
      color: #fff;
    }

    .btn-yellow:hover{
      background: #e5a100;
    }

    .btn-white{
      border: 2px solid #eee;
      color: #23233C;
    }

    .btn-white:hover{
      background: #eee;
    }

    .nos-image{
      position: relative;
      width: 500px;
      height: 400px;
      margin-left: 500px;
      bottom: 0%;
      top: 0%;
      margin-top: -320px;
      
      
      

    }

    .plat{
      position: absolute;
      
      
    }

    .bubble{
      position: absolute;
      bottom: -25px;
      left: 50%;
      transform: translate(-50%);
      background: #fff;
      padding: 6px 14px;
      font-size: 13px;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba( 0,0,0,0.1);
      white-space: nowrap;
    }

    .plat1{
      top: -37px;
      left: 0;
      animation: anim 3s infinite ease-in-out;
    }

    .plat2{
      top: 20%;
      right: 15%;
      animation: anim 3s infinite ease-in-out;
    }

    .plat3{
      bottom: -20%;
      left: 0;
      animation: anim 3s infinite ease-in-out;
    }

    .plat img{
      width: 200px;
      border-radius: 50%;
      box-shadow: 0 4px 20px rgba( 0,0,0,0.108) ;
      
      
    }

    /*--- animation--*/

    @keyframes anim{
      0%{
        transform: translateY(0) scale(1);
      }

      50%{
        transform: translateY(-5px) scale(1.05);
      }

      0%{
        transform: translateY(0) scale(1);
      }
    }

    footer{
     width: 100%;
     padding: 30px 0 0 20px;
     background: #eeeeee;
    
    }

    footer .footer_main{
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    
    
    }

    footer .footer_main .footer_tag{
      text-align: center;
    }

    footer .footer_main .footer_tag h2{
      color: #000;
      margin-bottom: 25px;
      font-size: 30px;
    }

    footer .footer_main .footer_tag p{
      margin: 10px 0;
    }

    footer .footer_main .footer_tag i{
      color: #fac031;
    }

    footer .end{
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 15px;
    }

    footer .end span{
      color: #e5a100;
      margin-left: 10px ;
    }
    ::-webkit-scrollbar{
      width: 13px;
    }

    ::-webkit-scrollbar-track{
      border-radius: 15px;
      box-shadow: inset 0 0 5px rgba( 0,0,0,0.5);
    }

    ::-webkit-scrollbar-thumb{
      background: #fac031;
      border-radius: 15px;
    }
    
    /* Menu hamburger pour mobile */
    .hamburger {
      display: none;
      flex-direction: column;
      cursor: pointer;
      padding: 5px;
    }
    
    .hamburger span {
      width: 25px;
      height: 3px;
      background: #333;
      margin: 3px 0;
      transition: 0.3s;
    }
    
    /* Media queries pour responsive */
    @media screen and (max-width: 768px) {
      nav {
        flex-direction: column;
        height: auto;
        padding: 10px 20px;
      }
      
      section nav .container img {
        width: 150px;
      }
      
      section nav ul {
        display: none;
        width: 100%;
        flex-direction: column;
        text-align: center;
        margin-top: 20px;
      }
      
      section nav ul.active {
        display: flex;
      }
      
      section nav ul li {
        margin: 10px 0;
      }
      
      .hamburger {
        display: flex;
      }
      
      .home {
        flex-direction: column;
        padding: 120px 5% 40px;
        text-align: center;
      }
      
      .home h1 {
        font-size: 24px;
      }
      
      .nos-image {
        position: relative;
        width: 100%;
        height: 300px;
        margin: 40px 0 0 0;
      }
      
      .plat img {
        width: 120px;
      }
      
      .buttons {
        flex-direction: column;
        gap: 15px;
        align-items: center;
      }
      
      .btn {
        width: 200px;
        text-align: center;
      }
      
      footer .footer_main {
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        padding: 0 20px;
      }
      
      footer .footer_main .footer_tag h2 {
        font-size: 20px;
      }
    }
    
    @media screen and (max-width: 480px) {
      .container {
        margin: 2rem;
      }
      
      .home {
        padding: 100px 3% 30px;
      }
      
      .home h1 {
        font-size: 20px;
        line-height: 1.2;
      }
      
      section nav .container img {
        width: 120px;
      }
      
      .nos-image {
        height: 250px;
      }
      
      .plat img {
        width: 100px;
      }
      
      .bubble {
        font-size: 11px;
        padding: 4px 10px;
      }
      
      footer .footer_main {
        grid-template-columns: 1fr;
        text-align: left;
      }
      
      footer .footer_main .footer_tag {
        text-align: left;
        margin-bottom: 20px;
      }
    }

</style>
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
    
  <section>
    
    <nav>

      <div class="header">
        <div class="container">

          <img src="IMAGE/logoresto.jpg" alt="jpg">
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
       <li><a href="propos.html">A propos</a></li>
       <li><a href="profil.html">Profil</a></li>

      </ul>
    
      <div class="lien">
         <a href="reservation.html">Reservation</a>
     </div>

    </nav>

  </section>  

  <section class="home">
     <div class="container">
      <div class="home-content">

        <div class="text">
          <p class="intro" style="color: #000000b9;"> Salut, Bienvenue au Restaurant de UIYA!</p>
        </div>
        <h1>Delicieux plats,<br> Ne ratez pas cette chance <br> de venir decouvrir <br>les delices de nos chefs!</h1>
        <p class="description" style="color: #000000b9;">Savourez des plats fraîchement préparés avec amour,<br> servis dans une ambiance chaleureuse et accueillante.</p>

        <div class="buttons">
          <a href="" class="btn btn-yellow">Nos Menus</a>
          <a href="" class="btn btn-white">à propos de nous</a>
        </div>
      </div>
      

        <div class="nos-image">

           <div class="plat plat1">

            <img src="IMAGE/image3.jpg" alt="jpg">
            <div class="bubble">Donc miaammm!!</div>

           </div>


           <div class="plat plat2">

            <img src="IMAGE/image4.jpg" alt="jpg">
            <div class="bubble"> miaamm-miamm-miamm!!</div>

           </div>

           <div class="plat plat3">

            <img src="IMAGE/image5.jpg" alt="jpg">

           </div>
        
      </div>
     </div>

  </section>  

<footer>
   
     <div class="footer_main">

      <div class="footer_tag">
        <h2>Localisation</h2>
        <p>Cote d'Ivoire</p>
        <p>Yamoussoukro</p>
        <p>227_Logements</p>
        <p>UIYA</p>
      </div>


      <div class="footer_tag">
        <h2>Quick Link</h2>
        <p>Accueil</p>
        <p>Menus</p>
        <p>A Propos</p>
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