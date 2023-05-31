let senha_salva = ""

function redirecionar() {
    document.getElementById("input-senha").value="";
    document.getElementById("input-confirma").value = "";
    window.location.href = "/pages/login.html";
  }
  
  function validarSenha() {
    let senha = document.getElementById("input-senha").value;
    let confirmarSenha = document.getElementById("input-confirma").value;
  
    if (senha === confirmarSenha && senha !== "") {
        senha_salva += senha;
        alert("Senha alterada com sucesso");
        redirecionar();
    } else {
      alert("As senhas não correspondem. Por favor, tente novamente.");
    }
  }
  document.querySelector(".btn").addEventListener("click", validarSenha);