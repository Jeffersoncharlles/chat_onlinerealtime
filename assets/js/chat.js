const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");

sendBtn.onclick = ()=>{
    //let start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert-chat.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if (data == "sucesso"){
                    location.href = "users.php";
                }else{
                    errorTexto.textContent = data;
                    errorTexto.style.display = "block";
                    
                }
            }
        }
    }

    //we have to send the form data through ajax to php
    //temos que enviar os dados do formulário através de ajax para php

    let formData = new FormData(form); //creating new formdata object
    xhr.send(formData); //sending the form data to php
}