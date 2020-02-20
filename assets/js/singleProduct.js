var slideIndex = 3;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}



function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    console.log(slides);
    if (n >= slides.length) {
        slideIndex = slides.length;
    }
    if (n < slides.length) {
        slideIndex = 3;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    if (n > 3) {
        console.log(n);

        console.log(slideIndex);
        for (i = 1; i < slideIndex; i++) {
            slides[i].style.display = "block";

        }
        return 0;
    }

    for (i = 0; i < slideIndex; i++) {
        slides[i].style.display = "block";
    }


}