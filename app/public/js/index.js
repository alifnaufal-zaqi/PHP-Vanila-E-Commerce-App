document.addEventListener("DOMContentLoaded", () => {
  const hambergerButton = document.getElementById("hamberg");

  hambergerButton.addEventListener("click", () => {
    const menu = document.getElementById("menu");
    menu.classList.toggle("hidden");
  });
});
