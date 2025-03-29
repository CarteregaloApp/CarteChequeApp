<?php
include 'db.php';

// Vérifier si une mise à jour est demandée
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_payment'])) {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $iban = trim($_POST['iban']);
    $swift = trim($_POST['swift']);
    $reference_code = trim($_POST['reference_code']);
    $crypto_address = trim($_POST['crypto_address']);

    if (!empty($id) && !empty($name) && !empty($iban) && !empty($swift)) {
        // Mettre à jour la base de données
        $stmt = $pdo->prepare("UPDATE payment_methods SET name = ?, iban = ?, swift = ?, reference_code = ?, crypto_address = ? WHERE id = ?");
        $stmt->execute([$name, $iban, $swift, $reference_code, $crypto_address, $id]);

        echo "<p style='color: green;'>Méthode de paiement mise à jour avec succès.</p>";
    } else {
        echo "<p style='color: red;'>Tous les champs doivent être remplis.</p>";
    }
}

// Vérifier si une suppression est demandée
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_payment'])) {
    $id = $_POST['id'];

    if (!empty($id)) {
        // Supprimer de la base de données
        $stmt = $pdo->prepare("DELETE FROM payment_methods WHERE id = ?");
        $stmt->execute([$id]);

        echo "<p style='color: red;'>Méthode de paiement supprimée.</p>";
    } else {
        echo "<p style='color: red;'>ID non valide.</p>";
    }
}

// Vérifier si une nouvelle méthode de paiement est ajoutée
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_payment'])) {
    $name = trim($_POST['name']);
    $iban = trim($_POST['iban']);
    $swift = trim($_POST['swift']);
    $reference_code = trim($_POST['reference_code']);
    $crypto_address = trim($_POST['crypto_address']);

    if (!empty($name) && !empty($iban) && !empty($swift)) {
        // Insérer dans la base de données
        $stmt = $pdo->prepare("INSERT INTO payment_methods (name, iban, swift, reference_code, crypto_address) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $iban, $swift, $reference_code, $crypto_address]);

        echo "<p style='color: green;'>Méthode de paiement ajoutée avec succès.</p>";
    } else {
        echo "<p style='color: red;'>Tous les champs doivent être remplis.</p>";
    }
}

// Récupérer les méthodes de paiement existantes
$stmt = $pdo->query("SELECT * FROM payment_methods");
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Paiements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        button {
            background: #ff6600;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #cc5200;
        }
        .delete-button {
            background: red;
        }
        .delete-button:hover {
            background: darkred;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Modifier les Informations de Paiement</h2>

    <?php if (!empty($payments)): ?>
        <?php foreach ($payments as $payment): ?>
            <form method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($payment['id']); ?>">
                
                <label>Nom du Bénéficiaire</label>
                <input type="text" name="name" value="<?= htmlspecialchars($payment['name']); ?>" required>

                <label>IBAN</label>
                <input type="text" name="iban" value="<?= htmlspecialchars($payment['iban']); ?>" required>

                <label>Code Swift</label>
                <input type="text" name="swift" value="<?= htmlspecialchars($payment['swift']); ?>" required>

                <label>Code de Référence</label>
                <input type="text" name="reference_code" value="<?= htmlspecialchars($payment['reference_code']); ?>" required>

                <label>Adresse Cryptomonnaie</label>
                <input type="text" name="crypto_address" value="<?= htmlspecialchars($payment['crypto_address']); ?>" required>

                <button type="submit" name="update_payment">Mettre à jour</button>
                <button type="submit" name="delete_payment" class="delete-button">Supprimer</button>
            </form>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="color: red;">Aucune méthode de paiement trouvée.</p>
    <?php endif; ?>
</div>

<div class="container">
    <h2>Ajouter une Méthode de Paiement</h2>
    <form method="post">
        <label>Nom du Bénéficiaire</label>
        <input type="text" name="name" required>

        <label>IBAN</label>
        <input type="text" name="iban" required>

        <label>Code Swift</label>
        <input type="text" name="swift" required>

        <label>Code de Référence</label>
        <input type="text" name="reference_code" required>

        <label>Adresse Cryptomonnaie</label>
        <input type="text" name="crypto_address" required>

        <button type="submit" name="add_payment">Ajouter</button>
    </form>
</div>

</body>
</html>