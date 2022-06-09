var qrcode = new QRCode(document.getElementById("QRCode"), {
    text: "http://10.50.55.163:3000/ump-food-delivery-foody/View/calculate-average-expenses/report.php",
    width: 128,
    height: 128,
    colorDark: "#6C5A8A",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H
});