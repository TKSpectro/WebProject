<header>
    <script src="assets/js/search.js"></script>
    <ul class="icons">
        <li class="startListIcon">
            <a href="index.php"><img id="logo" src="assets/images/Logo.png" alt="Toyplanet_logo"></a>
        </li>
        <li class="startListIcon">
            <a href="index.php?c=shoppingcart&a=shoppingCart"><img id="shoppingCart" src="assets/images/shopping-cart.png"
                                                                   alt="Warenkorb"></a>
        </li>
        <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
            <li class="startListIcon">
                <a href="index.php?c=account&a=account"><img src="assets/images/Account_verwaltung.png"
                                                             alt="Account"></a>
            </li>
            <form id="logoutButton" action="<?= $_SERVER['PHP_SELF'] . '?a=logout'; ?>" method="Post">
                <li class="startListIcon">
                    <input type="submit" id="logout" name="logout" value="Abmelden">
                </li>
            </form>
        <?php else : ?>
            <li class="startListIcon">
                <a href="index.php?c=login&a=login"><img src="assets/images/Account_verwaltung.png" alt="Account"></a>
            </li>
        <?php endif; ?>
    </ul>
    <ul class="searchUl">
        <li class="startListIcon">
            <noscript>
                <div class="search">
                    <form action="index.php" method="get">
                        <input type="hidden" value="product" name="c">
                        <input type="hidden" value="products" name="a">
                        <? if (isset($_GET['type'])) { ?><input type="hidden" value="<?= $_GET['type'] ?>"
                                                                name="type"><? } ?>
                        <input class="searchInput" id="searchWord" type="search" placeholder="Suchen">
                        <button type="submit" class="searchButton">
                            <img class="searchIcon" src="assets/images/search_icon.png" alt="searchButton">
                        </button>
                    </form>
                </div>
            </noscript>
            <div id="jssearch" class="search" style="display:none">
                <form action="javascript:searchByWord ('<?=$_GET['type'] ?>');">
                    <input class="searchInput" id="searchWord" type="search" placeholder="Suchen">
                    <button type="submit" class="searchButton">
                        <img class="searchIcon" src="assets/images/search_icon.png" alt="searchButton">
                    </button>
                </form>
            </div>
            <script>
                document.getElementById("jssearch").style.display = 'block';
            </script>
        </li>
    </ul>
</header>
