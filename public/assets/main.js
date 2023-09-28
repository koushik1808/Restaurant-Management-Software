const hideEl = document.querySelector("#eye");

hideEl.addEventListener("click", (e) => {
  const inputEL = document.querySelector("#pass");
  if (inputEL.type == "password") {
    inputEL.type = "text";
  } else {
    inputEL.type = "password";
  }
});
