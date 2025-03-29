<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci pour votre commande</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .thank-you-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }

        .thank-you-container h2 {
            color: #ff6600;
            margin-bottom: 15px;
        }

        .thank-you-container p {
            font-size: 16px;
            color: #444;
            line-height: 1.6;
        }

        .return-home {
            display: inline-block;
            margin-top: 20px;
            background: #ff6600;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .return-home:hover {
            background: #cc5200;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="thank-you-container">
        <h2>Merci pour votre commande !</h2>
        <p>Votre paiement est en cours d'examen.</p>
        <p>Une confirmation vous sera envoyée dès que votre paiement sera validé.</p>
        <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>
        <a href="commerce.php" class="return-home">Retour à l'accueil</a>
    </div>

</body>
</html>