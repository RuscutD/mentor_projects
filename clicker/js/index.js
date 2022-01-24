let coin = 0;
let gps = 1;
let minions = [
    { id: 1, cost: 10, gps: 1, owned: 1 },
    { id: 2, cost: 100, gps: 5, owned: 0 },
    { id: 3, cost: 500, gps: 10, owned: 0 }
];

function getGPS() {
    gps = 0; 
    minions.forEach(function (minion) {
        gps += minion.gps * minion.owned;
        displayGPS();
    });
}

function addGold(gps) {
    coin = coin + gps;
    document.getElementById('golds').value = coin;
    document.title = golds + "coin";
    displayGolds();
}

function addGps() {
    setInterval( function () {
        coin = coin + gps;
        displayGolds();
    }, 200);
}

function buyMinion(id) {
    const element = minions.find(minion => minion.id === id);
    let cost = element.cost;
    let strength = element.gps;
    if (coin >= cost) {
        coin = coin - cost;
        gps = gps + strength;
    }
    displayGPS();
    displayGolds();
}

function displayGolds() {
    const formatter = new Intl.NumberFormat('en');
    document.getElementById("coins").innerHTML = coin;
    formatter.format(coin);
}

function displayGPS() {
    document.getElementById("gps").innerHTML = "+" + gps;
}

function save () {
    localStorage.setItem("coin", coin);
    localStorage.setItem("gps", gps);
}

function load () {
    coin = localStorage.getItem("coin");
    coin = parseInt(coin)
    gps = localStorage.getItem("gps");
    gps = parseInt(gps);
    update();
}

function update(){
    document.getElementById("coins").innerHTML = coin;
    document.getElementById("gps").innerHTML = gps;
}