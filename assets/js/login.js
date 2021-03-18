const form = document.querySelector(".login form");
const continueBtn = form.querySelector(".btn-my input");
const errorTexto = form.querySelector(".container-chat-error");

form.onsubmit = (e)=>{
    e.preventDefault();
}

// continueBtn.onclick = () =>{
//     //let start ajax
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST","php/login.php", true);
//     xhr.onload = () =>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 let data = xhr.response;
//                 if (data == "sucesso"){
//                     location.href = "users.php";
//                 }else{
//                     errorTexto.textContent = data;
//                     errorTexto.style.display = "block";
                    
//                 }
//             }
//         }
//     }

//     //we have to send the form data through ajax to php
//     //temos que enviar os dados do formulário através de ajax para php

//     let formData = new FormData(form); //creating new formdata object
//     xhr.send(formData); //sending the form data to php
// }

//console.log(form.email);
// // Send a POST request
continueBtn.onclick = () =>{
    let formData = new FormData(form);
    console.log(formData);
axios({
    method: 'post',
    url: "php/login.php",
    data: formData
  }).then(res=>{
    consele.log(res.data);
}).catch(err=>console.log("error apirest"));
}