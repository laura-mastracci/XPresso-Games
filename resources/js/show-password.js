let showButton = document.querySelector("#show-pwd");
let password = document.getElementById("pwd");

showButton.addEventListener("click", togglePassword);
function togglePassword() {
    console.log(password.type);
    if (password.type === "password") {
      password.type = "text";
      showButton.setAttribute("name", "eye-outline");
    } else {
      password.type = "password";
      showButton.setAttribute("name", "eye-off-outline");
    }
  }