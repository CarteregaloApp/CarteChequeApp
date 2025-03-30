<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci pour votre demande</title>
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
            color: #28a745;
        }

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        /* Icône */
        .icon {
            font-size: 50px;
            color: #28a745;
            margin-bottom: 15px;
        }

        /* Bouton */
        .btn {
            display: inline-block;
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">✅</div>
        <h2>Merci pour votre demande !</h2>
        <p>Nous avons bien reçu votre demande. Notre équipe vous contactera sous peu pour la suite du processus.</p>
        <a href="commerce.php" class="btn">Retour à l'accueil</a>
    </div>
</body>
</html>