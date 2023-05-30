function redirecionar() {
    window.location.href = "/pages/login.html";
  }
  
  function validarSenha() {
    let senha = document.getElementById("input-senha").value;
    let confirmarSenha = document.getElementById("input-confirma").value;
  
    if (senha === confirmarSenha) {
      redirecionar();
    } else {
      alert("As senhas não correspondem. Por favor, tente novamente.");
    }
  }
  
  document.querySelector(".btn").addEventListener("click", validarSenha);