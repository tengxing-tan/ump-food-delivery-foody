const accept = document.getElementsById("accept");
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
