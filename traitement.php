

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Méthodes de Paiement</title>
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
        .payment-methods-container {
            background: white;
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .payment-methods-container h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .payment-section {
            background: #fafafa;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            text-align: left;
        }

        .payment-section h3 {
            color: #ff6600;
            margin-bottom: 10px;
        }

        .payment-info {
            font-size: 16px;
            color: #444;
            line-height: 1.6;
            word-break: break-word;
        }

        .highlight {
            font-weight: bold;
            color: #000;
        }

        .pay-button {
            background: #ff6600;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease, transform 0.2s ease;
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
        }

        .pay-button:hover {
            background: #cc5200;
            transform: scale(1.05);
        }

        .warning-message {
            background: #ffeeba;
            color: #856404;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ffeeba;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="warning-message">
    <p><strong>⚠️ Important :</strong> Lors du paiement, veuillez renseigner uniquement votre <strong>Code de Référence</strong> ci-dessous comme motif de paiement sans aucune autre précision.</p>
</div>

<div class="payment-methods-container">
    <h2>Informations de Paiement</h2>
 
    
    <!-- Section Virement Bancaire -->
   
        <div class="payment-section">
            <h3>Virement Bancaire</h3>
           
                <p class="payment-info">
          
                        <span class="highlight">Nom :</span> Carte regalo<br>
                
                        <span class="highlight">IBAN :</span> ‎BE67967447812687<br>
                    
                        <span class="highlight">Code Swift :</span> TRWIBEB1XXX‎<br>
                                <span class="highlight">Code de Référence :</span> AF271GBX<br>
                    
</div>
    <!-- Section Paiement en Cryptomonnaie -->
    

        <div class="payment-section">
            <h3>Paiement en Cryptomonnaie</h3>
           
                <p class="payment-info">
                  
                        <span class="highlight">Adresse Bitcoin (BTC) :</span> bc1q9y3xuvr7wm279uq8fufaw6p2f0lkyv8nq2yskk <br> 
                 
                </p>
            
        </div>

    <a href="merci.php" class="pay-button">J'ai effectué le paiement</a>

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