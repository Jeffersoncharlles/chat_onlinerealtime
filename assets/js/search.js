const searchBar = document.querySelector(".container-users-search input");
const searchBtn = document.querySelector(".container-users-search button");
const userList = document.querySelector(".users-list");

searchBtn.onclick = () =>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = ()=>{
    let searchterm = searchBar.value;
    if (searchterm != "") {
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
        xhr.open("POST","php/search.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                   let data = xhr.response;
                   userList.innerHTML = data;
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchterm=" + searchterm); 
}

setInterval(()=>{
     //let start ajax
     let xhr = new XMLHttpRequest();
     xhr.open("get","php/users.php", true);
     xhr.onload = () =>{
         if(xhr.readyState === XMLHttpRequest.DONE){
             if(xhr.status === 200){
                let data = xhr.response;
                if (!searchBar.classList.contains("active")) {
                    userList.innerHTML = data;
                    // se tem nao tem active ele atualiza se tem nao atualiza
                }
             }
         }
     }
     xhr.send();
}, 500);
