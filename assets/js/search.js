function searchByWord(type) {
    var searchitem = document.getElementById("searchWord");
    window.location.replace("index.php?c=product&a=products&type=" + type + "&search=" + searchitem.value);
}