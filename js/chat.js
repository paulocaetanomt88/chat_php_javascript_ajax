const form = document.querySelector(".area_digitacao"),
campoMensagem = form.querySelector(".campo_entrada_mensagem"),
botaoEnviar = form.querySelector("button"),
chatBox = document.querySelector(".chat_box");

form.onsubmit = (e) => {
    e.preventDefault(); // preventing form from submitting
}

botaoEnviar.onclick = () => {
    // vamos iniciar o Ajax
    let xhr = new XMLHttpRequest(); // criando objeto XML
    xhr.open("POST", "php/insere-mensagem.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                campoMensagem.value = ''; // limpa a caixa de digitação após enviar a mensagem
                deslizaParaBaixo();
            }
        }
    }
    // Enviando os dados do formulário através de ajax para php
    let formData = new FormData(form);
    xhr.send(formData);
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(()=>{
    // vamos iniciar o Ajax
    let xhr = new XMLHttpRequest(); // criando objeto XML
    xhr.open("POST", "php/obter-conversa.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains("active")) {
                    deslizaParaBaixo();
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500); // Essa função vai ser executada frequentemente a cada 500 milissegundos

function deslizaParaBaixo() {
    chatBox.scrollTop = chatBox.scrollHeight;
}