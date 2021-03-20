const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

sendBtn.onclick = ()=>{
    //let start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert-chat.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
            }
        }
    }

    //we have to send the form data through ajax to php
    //temos que enviar os dados do formulário através de ajax para php

    let formData = new FormData(form); //creating new formdata object
    xhr.send(formData); //sending the form data to php
}

setInterval(()=>{
    //let start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get-chat.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
               let data = xhr.response;
               chatBox.innerHTML = data;
                 
            }
        }
    }
    let formData = new FormData(form); //creating new formdata object
    xhr.send(formData); //sending the form data to php
}, 500);