function searchByWord() {
    var searchitem = document.getElementById("searchWord");
    window.location.replace("index.php?c=product&a=products&search=" + searchitem.value);
}