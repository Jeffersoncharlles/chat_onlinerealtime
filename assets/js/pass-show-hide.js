const passwdField = document.querySelector(".form input[type='password']");
const toogleBtn = document.querySelector(".form .field i");
toogleBtn.onclick = () =>{
    if(passwdField.type == "password"){
        passwdField.type = 'text';
        toogleBtn.classList.add("active");
    }else{
        passwdField.type = 'password'; 
        toogleBtn.classList.remove("active");
    }   
}