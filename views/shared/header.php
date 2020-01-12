<header>
    <script src="assets/js/search.js"></script>
    <ul class="icons">
        <li><a href="index.php?a=shoppingCart"><img id="Warenkorb" src="assets/images/shopping-cart.png"
                                                    alt="Warenkorb"></a></li>

        <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
            <li><a href="index.php?a=account"><img src="assets/images/Account_verwaltung.png" alt="Account"></a></li>

            <form id="logoutButton" action="<?= $_SERVER['PHP_SELF'] . '?a=logout'; ?>" method="Post">
                <li><input type="submit" id="logout" name="logout" value="abmelden"></li>
            </form>
        <?php else : ?>
            <li><a href="index.php?a=login"><img src="assets/images/Account_verwaltung.png" alt="Account"></a></li>
        <?php endif; ?>
    </ul>

    <ul>
        <li>
            <a href="index.php"><img id="logo" src="assets/images/Logo.png" alt="Toyplanet_logo"></a>
        </li>
        <li>
            <div class="search">
                <form action="javascript:searchByWord();">
                    <input class="searchInput" id="searchWord" type="search" placeholder="Suchen">
                    <button type="submit" class="searchButton">
                        <img class="searchIcon" src="assets/images/search_icon.png" alt="searchButton">
                    </button>
                </form>
            </div>
        </li>
    </ul>
</header>
