<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
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
        }

        .contact-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
            text-align: left;
        }

        .contact-container h2 {
            color: #ff6600;
            margin-bottom: 15px;
            text-align: center;
        }

        .contact-container label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            color: #333;
        }

        .contact-container input,
        .contact-container textarea {
            width: 94%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-container textarea {
            resize: vertical;
            height: 120px;
        }

        .send-button {
            display: inline-block;
            margin-top: 20px;
            background: #ff6600;
            color: white;
            text-decoration: none;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .send-button:hover {
            background: #cc5200;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="contact-container">
        <h2>Contactez-nous</h2>
        <form action="reçu.php" method="POST">
            <label for="email">Votre Email :</label>
            <input type="email" id="email" name="email" required placeholder="Votre adresse email">

            <label for="message">Votre Message :</label>
            <textarea id="message" name="message" required placeholder="Écrivez votre message ici..."></textarea>

            <button type="submit" class="send-button">Envoyer</button>
        </form>
    </div>

</body>
</html>