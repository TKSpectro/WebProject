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

    <!--
    <div class="pill-nav">
        <a href="index.php?a=index"><img src="assets/images/homeIcon.png"  alt="Home Bild"><br></br>HOME</a>
        <a href="index.php?a=index"><img src="assets/images/boyIcon.png"  alt="Jungen Bild"><br></br>JUNGEN</a>
        <a href="index.php?a=index"><img src="assets/images/girlIcon.png"  alt="Mädchen Bild"><br></br>MÄDCHEN</a>
        <a href="index.php?a=index"><img src="assets/images/controllerIcon.png"  alt="Konsolen Bild"><br></br>KONSOLEN</a>
        <a href="index.php?a=index"><img src="assets/images/headIcon.png"  alt="Konto Bild"><br></br>KONTO</a>
        <a href="index.php?a=index"><img src="assets/images/aboutIcon.png"  alt="Über uns Bild"><br></br>ÜBER UNS</a>
    </div>
-->
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
                <a href="index.php?a=boys">
                    <figure class="single">
                        <img src="assets/images/boyIcon.png"  alt="Jungen Bild">
                        <figcaption>JUNGEN</figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="index.php?a=girls">
                    <figure class="single">
                       <img src="assets/images/iconGirl.png"  alt="Mädchen Bild">
                        <figcaption>MÄDCHEN</figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="index.php?a=console">
                    <figure class="single">
                        <img src="assets/images/iconController.png"  alt="Konsolen Bild">
                        <figcaption>KONSOLEN</figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="index.php?a=account">
                    <figure class="single">
                        <img src="assets/images/headIcon.png"  alt="Konto Bild">
                        <figcaption>KONTO</figcaption>
                    </figure>
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
   