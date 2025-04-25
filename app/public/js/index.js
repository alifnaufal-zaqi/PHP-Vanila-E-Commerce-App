document.addEventListener("DOMContentLoaded", () => {
  const hambergerButton = document.getElementById("hamberg");
  const navbar = document.getElementById("nav");
  const startShoopingButton = document.getElementById("startShoopingBtn");

  hambergerButton.addEventListener("click", () => {
    const menu = document.getElementById("menu");
    menu.classList.toggle("hidden");
  });

  window.addEventListener("scroll", () => {
    if (window.scrollY > 10) {
      navbar.classList.add(
        "shadow-md",
        "opacity-75",
        "transition",
        "duration-300"
      );
    } else {
      navbar.classList.remove("shadow-md", "opacity-75");
    }
  });

  startShoopingButton.addEventListener("click", () => {
    window.location.href = "/home";
  });
});

export default function showPassword(checkbox) {
  checkbox.addEventListener("change", () => {
    const passwordInput = document.querySelector("input[name=password]");
    if (checkbox.checked) {
      passwordInput.setAttribute("type", "text");
    } else {
      passwordInput.setAttribute("type", "password");
    }
  });
}
