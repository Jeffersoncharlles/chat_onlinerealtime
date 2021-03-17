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

    }
    xhr.send();
}