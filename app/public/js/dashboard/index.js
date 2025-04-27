document.addEventListener("DOMContentLoaded", () => {
  const formDelete = document.getElementById("deleteProduct");

  formDelete.addEventListener("submit", () => {
    const isDelete = confirm("Are You Sure Want To Delete This Product ?");

    console.log(isDelete);
  });
});
