const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".mensagem_erro");

form.onsubmit = (e) => {
    e.preventDefault(); // preventing form from submitting
}

continueBtn.onclick = () => {
    // vamos iniciar o Ajax
    let xhr = new XMLHttpRequest(); // criando objeto XML
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if (data == "Sucesso") {
                    location.href = "usuarios.php"
                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    // Enviando os dados do formulário através de ajax para php
    let formData = new FormData(form);
    xhr.send(formData);
}