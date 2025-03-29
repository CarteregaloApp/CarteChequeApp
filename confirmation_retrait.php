<?php
session_start();

if (!isset($_GET['montant']) || !isset($_GET['ref']) || !isset($_GET['name'])) {
    header("Location: retrait.php");
    exit();
}

$montant = htmlspecialchars($_GET['montant']);
$reference = htmlspecialchars($_GET['ref']);
$beneficiary_name = htmlspecialchars($_GET['name']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Retrait</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }

        .confirmation {
            max-width: 400px;
            width: 90%;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            text-align: left;
        }

        h2 {
            color: #333;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .confirmation p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }


        /* Styles pour les écrans mobiles */
        @media (max-width: 600px) {
            .confirmation {
                padding: 15px;
                max-width: 100%;
            }

            h2 {
                font-size: 20px;
            }

            .confirmation p {
                font-size: 14px;
            }
        }
 .info {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="confirmation">
        <h2>Transfer in progress...</h2>

        <p>Amount : <strong><?php echo $montant; ?>$</strong></p>
        <p>Transaction reference: <strong><?php echo $reference; ?></strong></p>
        <p>Beneficiary : <strong><?php echo $beneficiary_name; ?></strong></p>

<div style="text-align:center;">
<img style="width:100px;" src="image/prog.png"></div>

<br>
<div style="text-align:center; color:red;">        
<p class="info">We will notify you as soon as the transfer is complete.</p>
   </div>
<div style="text-align:center;">

<a href="index.php"><button style="width:60%; height:30px; background-color:#23a536;color:white; border:none; border-radius:5px;" type="button"><strong>Back to home</strong></button></a>
</div>
 </div>
</body>
</html>