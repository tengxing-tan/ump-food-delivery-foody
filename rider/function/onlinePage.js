/*function update(){;
    if(document.getElementById("pickedBtn").innerHTML == "Deliver"){
       // window.open("mainPage.php");
       location.href = "QRcode.php";
    }
    document.getElementById("pickedBtn").innerHTML = "Deliver";
}*/
const accept = document.getElementById("onlineBtn");
const container = document.getElementById("container");
const acceptBtn = document.getElementById("acceptBtn");
const cancelBtn = document.getElementById("cancelBtn");

accept.addEventListener("click", () =>{
    container.classList.add("active");
});

cancelBtn.addEventListener("click", () =>{
    container.classList.remove("active");
});
acceptBtn.addEventListener("click", () =>{
    container.classList.remove("active");
});
