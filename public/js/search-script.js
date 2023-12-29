const suggestionList = document.querySelector(".suggest-list");
const searchBar = document.getElementById("searchBar");

searchBar.addEventListener('keyup', searchSuggest);

function searchSuggest() {
    var word = searchBar.value;
    suggestionList.innerHTML = "";

    var searchReq = new XMLHttpRequest();

    var url = "/request?search=" + word;
    searchReq.open('GET', url);
    searchReq.send();

    searchReq.onreadystatechange = function () {
        if (searchReq.readyState == 4 && searchReq.status == 200) {
            
            const JSONResponse = JSON.parse(searchReq.responseText);
            suggestionList.innerHTML = "";
            for (let item in JSONResponse) {
                suggestionList.innerHTML += JSONResponse[item].name + "<br>";
            }
        }
    };
}
