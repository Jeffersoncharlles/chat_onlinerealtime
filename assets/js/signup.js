const form = document.querySelector(".signup form");
const continueBtn = form.querySelector(".btn-my input");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = () =>{
    //let start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/signup.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
            }
        }
    }

    //we have to send the form data through ajax to php
    //temos que enviar os dados do formulário através de ajax para php

    let formData = new FormData(form); //creating new formdata object
    xhr.send(formData); //sending the form data to php
}