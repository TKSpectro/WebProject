<header class="big">

<ul class="icons">
    <li> <img id="Warenkorb" src="assets/images/shopping-cart.png" alt="Warenkorb"></li>
    <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
        <li><a href= "index.php?a=account" ><img src="assets/images/Account_verwaltung.png" alt="Account"></a></li>

    <form id="logoutButton"  action="<?=$_SERVER['PHP_SELF'].'?a=logout';?>" method="Post">
      <li><input type="submit" id="logout"  name="logout" value="abmelden"></li>
    </form> 
    <?php endif; ?>
    </ul> 
<ul class="iamlogo">
<li><a href="index.php"><img id="logo" src="assets/images/Logo.png" alt="Toyplanet_logo"></a>
<li><div class="search">
<img id="searchIcon"  src="assets/images/search_icon.png" alt="searchIcon">
<input id="suchword" type="text" placeholder="Suchen">
</div></li>
</ul>

    <nav>
        <ul>
            <li>
                <a href="index.php?a=index">
                    <figure class="single">
                        <img src="assets/images/homeIcon.png"  alt="Home Bild">
                        <figcaption>HOME</figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="index.php?a=products&type=boy">
                    <figure class="single">
                        <img src="assets/images/boyIcon.png"  alt="Jungen Bild">
                        <figcaption>JUNGEN</figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="index.php?a=products&type=girl">
                    <figure class="single">
                       <img src="assets/images/iconGirl.png"  alt="Mädchen Bild">
                        <figcaption>MÄDCHEN</figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="index.php?a=products&type=console">
                    <figure class="single">
                        <img src="assets/images/iconController.png"  alt="Konsolen Bild">
                        <figcaption>KONSOLEN</figcaption>
                    </figure>
                </a>
            </li>
            <li>
            <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
                <a href="index.php?a=account">
                    <figure class="single">
                        <img src="assets/images/headIcon.png"  alt="Konto Bild">
                        <figcaption>KONTO</figcaption>
                    </figure>
            <?php else :?>
                <a href="index.php?a=login">
                    <figure class="single">
                        <img src="assets/images/headIcon.png"  alt="Konto Bild">
                        <figcaption>KONTO</figcaption>
                    </figure>
                    <?php endif; ?>
                </a>
            </li>
            <li>
                <a href="index.php?a=index">
                    <figure class="single">
                        <img src="assets/images/aboutIcon.png"  alt="Über uns Bild">
                        <figcaption>ÜBER UNS</figcaption>
                    </figure>
                </a>
            </li>
        </ul>
    </nav>
</header>
   