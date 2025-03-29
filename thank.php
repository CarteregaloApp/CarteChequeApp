<?php
session_start();

if (isset($_SESSION['nom'], $_SESSION['montant'], $_SESSION['devise'], $_SESSION['iban'])) {
    $nom = $_SESSION['nom'];
    $montant = $_SESSION['montant'];
    $devise = $_SESSION['devise'];
    $iban = $_SESSION['iban'];
    $etat = "confirmation"; // État par défaut
} else {
    die("Accès non autorisé.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($etat == "annule") ? "Demande Annulée" : "En attente de confirmation"; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            padding: 30px;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            display: inline-block;
           max-width: 90%;
           width: 600px;

        }

        h1 {
            color: <?php echo ($etat == "annule") ? "#dc3545" : "#007bff"; ?>;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }

        .highlight {
            font-weight: bold;
            color: #28a745;
        }

        .iban {
            background: #f8f9fa;
            padding: 8px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin: 10px 0;
        }

        .small-text {
            font-size: 14px;
            color: gray;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            width: 80%;
            text-align: center;
            display: block;
        }

        .btn-confirm {
            background: #007bff;
            color: white;
        }

        .btn-confirm:hover {
            background: #0056b3;
        }

        .btn-cancel {
            background: #dc3545;
            color: white;
        }

        .btn-cancel:hover {
            background: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <?php if ($etat == "annule") : ?>
        <h1>❌ Solicite cancelación</h1>
        <p>su solicitud de préstamo ha sido cancelada.</p>
        <p class="small-text">Si cancelaste por error, puedes rehacer una solicitud en cualquier momento.</p>
        <a href="doc.php" class="btn btn-confirm">De vuelta a casa.</a>
    <?php else : ?>
        <h1>⏳ En espera de confirmación.</h1>
        <p>Querida <span class="highlight"><?php echo $nom; ?></span>,</p>
        <p>Hemos recibido su solicitud de préstamo por una cantidad de : <span class="highlight"><?php echo $montant . " " . $devise; ?></span>.</p>
        
        <p>El importe se pagará en la siguiente cuenta: </p>
        <p class="iban"><?php echo $iban; ?></p>

        <p>Nuestro equipo está revisando su elegibilidad. Si se valida su solicitud, la suma se transferirá dentro de las **15 minutos mínimo y 24 horas máximo**.</p>
        <p class="small-text">Se le enviará una notificación por correo electrónico tan pronto como se realice la transferencia.</p>

        <a href="doc.php" class="btn btn-confirm">De vuelta a casa</a>

        <!-- Formulaire d'annulation -->
        <form method="POST">
            <input type="hidden" name="annuler" value="1">
            <button type="submit" class="btn btn-cancel">❌ Cancelar la solicitud</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>