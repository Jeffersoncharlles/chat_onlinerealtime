const searchBar = document.querySelector(".container-users-search input");
const searchBtn = document.querySelector(".container-users-search button");

searchBtn.onclick = () =>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}
