const mobileMenu = document.querySelector("#mobileMenu");
const hamburgerButton = document.querySelector("#hamburgerButton");
const closeButton = document.querySelector("#closeButton");

hamburgerButton.addEventListener("click", function(){
    mobileMenu.classList.add("flex");
});

closeButton.addEventListener("click", function(){
    mobileMenu.classList.remove("flex");
});