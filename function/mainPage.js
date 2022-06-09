const online = document.getElementById("onlineBtn");
const container = document.getElementById("container");
const acceptBtn = document.getElementById("acceptBtn");
const cancelBtn = document.getElementById("cancelBtn");

online.addEventListener("click", () =>{
    container.classList.add("active");
});

cancelBtn.addEventListener("click", () =>{
    container.classList.remove("active");
});
acceptBtn.addEventListener("click", () =>{
    container.classList.remove("active");
});