function searchByWord() {
    var searchitem = document.getElementById("searchWord");
    window.location.replace("index.php?a=products&search=" + searchitem.value);
}