<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Carte</title>
    <link rel="stylesheet" href="style.css">

    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }

        /* Conteneur principal */
        .container {
            position: relative;
            z-index: 1;
        }

        /* En-tête */
        header {
            background: url('image/picture.jpg');
            color: #3f51b5ff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        /* Bouton Hamburger en haut */
        .hamburger-container {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .hamburger {
            font-size: 30px;
            cursor: pointer;
            border: none;
            background: none;
            color: black;
            padding: 10px;
        }

        /* Menu latéral superposé */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background: rgba(34, 34, 34, 0.95); /* Fond sombre semi-transparent */
            color: white;
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%);
            padding-top: 60px;
            box-shadow: 3px 0px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000; /* Au-dessus du contenu */
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #444;
        }

        /* Bouton de fermeture */
        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 30px;
            cursor: pointer;
        }

        /* Conteneur des produits */
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        /* Style des produits */
        .product {
            margin: 15px;
            width: 250px;
            position: relative;
        }

        .image-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .image-container img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 10px;
        }

        /* Texte sur l'image */
        .image-text {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Bouton ACHETER */
        .buy-button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: #ff6600;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .buy-button:hover {
            background: #cc5200;
            transform: scale(1.05);
        }

        /* Masquer le reste de la page quand le menu est ouvert */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999; /* Juste en dessous du menu */
        }

        .overlay.active {
            display: block;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .product {
                width: 45%;
            }
        }

        @media (max-width: 480px) {
            .product {
                width: 90%;
            }
        }
.warning-message {
    background: #ff4444;
    color: white;
    font-weight: bold;
    padding: 15px;
    text-align: center;
    font-size: 16px;
    border-radius: 5px;
    margin: 10px;
}

/* Footer */
footer {
    background-color: #222;
    color: white;
    padding: 40px 0;
    text-align: center;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

.footer-section {
    flex: 1;
    min-width: 250px;
    padding: 10px;
}

.footer-section h2 {
    font-size: 18px;
    margin-bottom: 10px;
    border-bottom: 2px solid #ff6600;
    display: inline-block;
    padding-bottom: 5px;
}

.footer-section p, .footer-section ul {
    font-size: 14px;
    line-height: 1.6;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin: 8px 0;
}

.footer-section ul li a {
    color: #bbb;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-section ul li a:hover {
    color: #ff6600;
}

/* Icônes des réseaux sociaux */
.social-icons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 10px;
}

.social-icons a {
    display: inline-block;
    width: 35px;
    height: 35px;
}

.social-icons img {
    width: 100%;
    height: auto;
    transition: transform 0.3s;
}

.social-icons img:hover {
    transform: scale(1.1);
}

/* Bas de page */
.footer-bottom {
    background-color: #111;
    padding: 10px;
    font-size: 13px;
    color: #bbb;
}

.footer-bottom a {
    color: #ff6600;
    text-decoration: none;
}

.footer-bottom a:hover {
    text-decoration: underline;
}
/* Bouton Revendre */
.sell-button-container {
    position: absolute;
    top: 10px;
    right: 10px;
}

.sell-button {
    background: #28a745;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    transition: background 0.3s ease;
}

.sell-button:hover {
    background: #218838;
}
    </style>

</head>
<body>

    <!-- Overlay pour masquer la page quand le menu est ouvert -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    <header>
        <!-- Menu Hamburger en haut -->
        <div class="hamburger-container">
            <button class="hamburger" onclick="openSidebar()">☰</button>
        </div>

        <h1>E-Carte</h1>
    </header>

    <!-- Menu Latéral -->
    <div class="sidebar" id="sidebar">
        <span class="close-btn" onclick="closeSidebar()">×</span>
        <a href="commerce.php">Accueil</a>
        <a href="contact.php">Contact</a>
        <a href="signale.php">Signaler un problème</a>
        <a href="rembourse.php">Demander un remboursement</a>
    </div>

  <div class="warning-message">
    ⚠️ Certaines personnes peuvent vous demander le code de votre carte cadeau apres l'achat, ne le partagez jamais.
</div>

<!-- Bouton Revendre -->
<div class="sell-button-container">
    <a href="revendre.php" class="sell-button">Revendre</a>
</div>

  <main class="product-container">
        <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img1.png" alt="Produit 1">
                    <span class="image-text">Furet</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>

        <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img2.png" alt="Produit 2">
                    <span class="image-text">Spotify</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>
 <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img3.jpg" alt="Produit 2">
                    <span class="image-text">TickeTac</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>
 <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img4.jpg" alt="Produit 2">
                    <span class="image-text">E-cheque</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>
        </div></a>
 <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img5.png" alt="Produit 2">
                    <span class="image-text">Spartoo</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>
 <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img6.png" alt="Produit 2">
                    <span class="image-text">Sephora</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>
 <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img7.png" alt="Produit 2">
                    <span class="image-text">Sarenza</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>
 <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img8.png" alt="Produit 2">
                    <span class="image-text">Printemps</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>
 <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img9.png" alt="Produit 2">
                    <span class="image-text">Nintendo</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>

 <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img10.png" alt="Produit 2">
                    <span class="image-text">Monoprix</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>

 <div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img11.png" alt="Produit 2">
                    <span class="image-text">Micromania</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>

<div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img12.png" alt="Produit 2">
                    <span class="image-text">Lastminute</span>
                </div> 
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>


<div class="product">
            <a href="#">
                <div class="image-container">
                  <img src="image/img17.png" alt="Produit 2">
                    <span class="image-text">Just Eat</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>


<div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img14.png" alt="Produit 2">
                    <span class="image-text">E-carte</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>

<div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img15.png" alt="Produit 2">
                    <span class="image-text">Wisky</span>
                </div> 
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>

<div class="product">
            <a href="#">
                <div class="image-container">
                    <img src="image/img16.png" alt="Produit 2">
                    <span class="image-text">LGR</span>
                </div>
            </a>
           <a href="methode_paiement.php"> <button class="buy-button">ACHETER</button>
        </div></a>

    </main>

<footer>
    <div class="footer-container">
        <div class="footer-section about">
            <h2>À propos</h2>
            <p>E-Carte est une plateforme sécurisée permettant l'achat et l'échange de cartes cadeaux en toute simplicité.</p>
        </div>
        
        <div class="footer-section links">
            <h2>Liens rapides</h2>
            <ul>
                <li><a href="commerce.php">Accueil</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="signale.php">Signaler un problème</a></li>
                <li><a href="rembourse.php">Demander un remboursement</a></li>
            </ul>
        </div>
       
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 E-Carte. Tous droits réservés. | <a href="#">Mentions légales</a> | <a href="#">Politique de confidentialité</a></p>
    </div>
</footer>


<script>
    // Ouvrir le menu et afficher l'overlay
    function openSidebar() {
        document.getElementById("sidebar").classList.add("active");
        document.getElementById("overlay").classList.add("active");
    }

    // Fermer le menu et masquer l'overlay
    function closeSidebar() {
        document.getElementById("sidebar").classList.remove("active");
        document.getElementById("overlay").classList.remove("active");
    }

    document.addEventListener("DOMContentLoaded", function() {
        console.log("Le site est chargé !");
    });
</script>

</body>
</html>