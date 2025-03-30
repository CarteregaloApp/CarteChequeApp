<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Remboursement</title>
    <link rel="stylesheet" href="styles.css">

<style>
/* Style global */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Conteneur */
.container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 400px;
    text-align: center;
}

/* Titres */
h2 {
    margin-bottom: 10px;
    color: #333;
}

p {
    font-size: 14px;
    color: #666;
}

/* Formulaire */
form {
    display: flex;
    flex-direction: column;
    text-align: left;
}

label {
    margin-top: 10px;
    font-weight: bold;
}

input, select, textarea {
    width: 94%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    background: #fff;
}

/* Bouton */
button {
    margin-top: 15px;
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s ease;
}

button:hover {
    background-color: #c82333;
}

/* Responsive */
@media (max-width: 500px) {
    .container {
        width: 95%;
    }
}
</style>

</head>
<body>
    <div class="container">
        <h2>Demande de Remboursement</h2>
        <p>Veuillez remplir ce formulaire pour soumettre votre demande de remboursement.</p>
        
        <form action="reçu.php" method="post">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" placeholder="Votre nom" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Votre email" required>

            <label for="order-number">Numéro de commande</label>
            <input type="text" id="order-number" name="order-number" placeholder="Ex: 123456" required>

            <label for="reason">Raison du remboursement</label>
            <select id="reason" name="reason" required>
                <option value="">Sélectionnez une raison</option>
                <option value="produit_defectueux">Produit défectueux</option>
                <option value="erreur_commande">Erreur de commande</option>
                <option value="retard_livraison">Retard de livraison</option>
                <option value="autre">Autre</option>
            </select>

            <label for="details">Détails supplémentaires</label>
            <textarea id="details" name="details" rows="4" placeholder="Ajoutez des précisions..." required></textarea>

            <button type="submit">Envoyer la demande</button>
        </form>
    </div>
<!-- Script Google Traduction -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'fr'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>