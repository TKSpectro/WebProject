<div class="singleProduct">
    <img src="<?= $product[0]['photo'] ?>" alt="product">
    <ul>
        <li><?= $product[0]['descrip'] ?></li>
        <li><?= $product[0]['stdPrice'] ?></li>
        <li>
            <iframe name="hiddenFrame" class="hide"></iframe>
            <form method="post" action="?c=shoppingcart&a=shoppingCart" target="hiddenFrame">
                <input type="hidden" name="prodID" value="<?= $product[0]['prodID'] ?>">
                <input type="hidden" name="quantity" value="1">
                <input class="btn" type="submit" name="addToShoppingCart" value="In den Warenkorb">
            </form>
        </li>
    </ul>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <? foreach($allProducts as $otherProduct){
            ?>
            <div class="mySlides fade">
                <img src="<?= $otherProduct['photo'] ?>" style="width:100%">
                <div class="text"><?= $otherProduct['descrip'] ?></div>
            </div>
        <? } ?>


        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>