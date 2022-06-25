const campoSenha = document.querySelector(".form input[type='password']"),
alternaBtn = document.querySelector(".form .campo i");

alternaBtn.onclick = ()=>{
    if(campoSenha.type == "password") {
        campoSenha.type = "text";
        alternaBtn.classList.add("active");
    } else if (campoSenha.type == "text") {
        campoSenha.type = "password";
        alternaBtn.classList.remove("active");
    }
}