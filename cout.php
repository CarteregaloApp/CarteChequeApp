<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulateur de Trading Crypto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

<style>
body {
    background-color: #f4f4f4;
}

.container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.list-group-item {
    font-size: 14px;
}

</style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Simulateur de Trading Crypto</h1>
        
        <div class="row">
            <div class="col-md-6">
                <h3>Portefeuille</h3>
                <p><strong>Solde:</strong> <span id="balance">10000</span> €</p>
                <p><strong>BTC détenus:</strong> <span id="btcOwned">0</span></p>
                <button class="btn btn-success" onclick="buyCrypto()">Acheter BTC</button>
                <button class="btn btn-danger" onclick="sellCrypto()">Vendre BTC</button>
            </div>

            <div class="col-md-6">
                <h3>Prix en Temps Réel</h3>
                <p><strong>Prix BTC:</strong> <span id="btcPrice">...</span> €</p>
                <canvas id="priceChart"></canvas>
            </div>
        </div>

        <h3 class="mt-4">Historique des Transactions</h3>
        <ul id="history" class="list-group"></ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>

<script>

let balance = 10000;  // Solde initial en €
let btcOwned = 0;     // Quantité de BTC possédée
let btcPrice = 0;     // Prix du BTC en temps réel
let priceHistory = []; // Historique des prix pour le graphique

const balanceDisplay = document.getElementById("balance");
const btcOwnedDisplay = document.getElementById("btcOwned");
const btcPriceDisplay = document.getElementById("btcPrice");
const historyList = document.getElementById("history");

// Graphique avec Chart.js
const ctx = document.getElementById("priceChart").getContext("2d");
const chart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [],
        datasets: [{
            label: "Prix BTC (€)",
            data: [],
            borderColor: "blue",
            borderWidth: 2
        }]
    }
});

// Mettre à jour le graphique
function updateChart(newPrice) {
    const now = new Date().toLocaleTimeString();
    priceHistory.push(newPrice);
    
    if (priceHistory.length > 20) priceHistory.shift(); // Garde les 20 dernières valeurs

    chart.data.labels.push(now);
    chart.data.datasets[0].data.push(newPrice);

    if (chart.data.labels.length > 20) chart.data.labels.shift(); // Garde 20 labels max

    chart.update();
}

// Fonction pour récupérer le prix BTC réel
async function fetchBTCPrice() {
    try {
        const response = await fetch("https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=eur");
        const data = await response.json();
        btcPrice = data.bitcoin.eur;
        btcPriceDisplay.textContent = btcPrice.toFixed(2);
        updateChart(btcPrice);
    } catch (error) {
        console.error("Erreur lors de la récupération du prix BTC", error);
    }
}

// Fonction d'achat
function buyCrypto() {
    if (balance >= btcPrice) {
        balance -= btcPrice;
        btcOwned += 1;
        addToHistory(`Achat de 1 BTC à ${btcPrice.toFixed(2)} €`);
    } else {
        alert("Fonds insuffisants !");
    }
    updateDisplay();
}

// Fonction de vente
function sellCrypto() {
    if (btcOwned > 0) {
        balance += btcPrice;
        btcOwned -= 1;
        addToHistory(`Vente de 1 BTC à ${btcPrice.toFixed(2)} €`);
    } else {
        alert("Vous ne possédez pas de BTC !");
    }
    updateDisplay();
}

// Mettre à jour l'affichage
function updateDisplay() {
    balanceDisplay.textContent = balance.toFixed(2);
    btcOwnedDisplay.textContent = btcOwned;
}

// Ajouter une transaction à l'historique
function addToHistory(action) {
    let li = document.createElement("li");
    li.textContent = action;
    li.classList.add("list-group-item");
    historyList.prepend(li);
}

// Mettre à jour les prix toutes les 5 secondes
setInterval(fetchBTCPrice, 5000);
fetchBTCPrice(); // Charger immédiatement au démarrage

// Mise à jour initiale de l'affichage
updateDisplay();
</script>
</body>
</html>