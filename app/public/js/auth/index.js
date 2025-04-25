import showPassword from "../index.js";

document.addEventListener("DOMContentLoaded", () => {
  const checkbox = document.getElementById("showPassword");

  showPassword(checkbox);
});
