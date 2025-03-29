<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Paiement</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            padding: 20px; 
            background-color: #f4f4f4; 
            text-align: center;
        }
        .container { 
            background: white; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
            max-width: 400px; 
            margin: auto; 
            text-align: left;
        }
        button { 
            background: #ff6600; 
            color: white; 
            padding: 10px; 
            border: none; 
            cursor: pointer; 
            width: 100%; 
            margin-top: 10px; 
        }
        button:hover { 
            background: #cc5200; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vérification des informations</h2>
        <p><strong>Expéditeur :</strong> <span id="expediteur"></span></p>
        <p><strong>Bénéficiaire :</strong> <span id="beneficiaire"></span></p>
        <p><strong>Email :</strong> <span id="email"></span></p>
        <p><strong>Montant :</strong> <span id="montant"></span> €</p>
        <p><strong>Méthode :</strong> <span id="methode"></span></p>

        <div id="adresseSection" class="hidden">
            <p><strong>Adresse :</strong> <span id="adresse"></span></p>
            <p><strong>Ville :</strong> <span id="ville"></span></p>
            <p><strong>Code Postal :</strong> <span id="code_postal"></span></p>
        </div>

        <button onclick="retour()">Modifier</button>
    </div>

    <script>
        // Récupération des données
        let paiement = JSON.parse(localStorage.getItem("paiement"));

        if (paiement) {
            document.getElementById("expediteur").innerText = paiement.expediteur;
            document.getElementById("beneficiaire").innerText = paiement.beneficiaire;
            document.getElementById("email").innerText = paiement.email;
            document.getElementById("montant").innerText = paiement.montant;
            document.getElementById("methode").innerText = paiement.methode;

            if (paiement.methode === "livraison") {
                document.getElementById("adresse").innerText = paiement.adresse;
                document.getElementById("ville").innerText = paiement.ville;
                document.getElementById("code_postal").innerText = paiement.code_postal;
                document.getElementById("adresseSection").classList.remove("hidden");
            }
        }

        function retour() {
            window.location.href = "traitement.php";
        }
    </script>
</body>
</html>