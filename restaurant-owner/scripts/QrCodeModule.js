var qrcode = new QRCode(document.getElementById('qr-code'), {
    text: "http://10.66.0.36:3000/webserver/foody/restaurant-owner/view-charts.php?id=",
    width: 128,
    height: 128,
    colorDark: "#6C5A8A",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H
});