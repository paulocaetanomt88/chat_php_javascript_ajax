const barraPesquisa = document.querySelector(".usuarios .pesquisa_usuario input"),
botaoPesquisa = document.querySelector(".usuarios .pesquisa_usuario button"),
listaUsuarios = document.querySelector(".usuarios .lista_usuarios");

botaoPesquisa.onclick = ()=>{
    barraPesquisa.classList.toggle("active");
    barraPesquisa.focus();
    botaoPesquisa.classList.toggle("active");
    barraPesquisa.value = "";
}

barraPesquisa.onkeyup = ()=>{
    let termoPesquisa = barraPesquisa.value;

    if (termoPesquisa != "") {
        barraPesquisa.classList.add("active");
    } else {
        barraPesquisa.classList.remove("active");
    }
    
    // vamos iniciar o Ajax
    let xhr = new XMLHttpRequest(); // criando objeto XML
    xhr.open("POST", "php/pesquisa.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                listaUsuarios.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("termoPesquisa=" + termoPesquisa);
}

setInterval(()=>{
    // vamos iniciar o Ajax
    let xhr = new XMLHttpRequest(); // criando objeto XML
    xhr.open("GET", "php/usuarios.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if (!barraPesquisa.classList.contains("active")) {
                    listaUsuarios.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500); // Essa função vai ser executada frequentemente a cada 500 milissegundos