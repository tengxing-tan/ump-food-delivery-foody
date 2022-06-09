const feedback = document.getElementById("feedbackBtn");
const addBtn = document.getElementById("addBtn");
const cancelBtn = document.getElementById("cancelBtn");

feedback.addEventListener("click", () =>{
    container.classList.add("active");
});

cancelBtn.addEventListener("click", () =>{
    container.classList.remove("active");
});
addBtn.addEventListener("click", () =>{
    container.classList.remove("active");
});