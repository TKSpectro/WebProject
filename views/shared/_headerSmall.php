<header class="small">
    <ul class="icons">
    <li> <img id="Warenkorb" src="assets/images/shopping-cart.png" alt="Warenkorb"></li>
    <li><a href= "index.php?a=formular"><img src="assets/images/Account_verwaltung.png" alt="Account"></a></li>
    <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
    
        <li><div class="test">Sie sind angemeldet</div></li>
        
    <form action="<?=$_SERVER['PHP_SELF'].'?a=logout';?>" method="Post">
      <li><input type="submit" id="logout"  name="logout" value="Logout"></li>
    </form> 
  <?php endif; ?>
    </ul> 

    <ul >
    <li><img id="logo" src="assets/images/Logo.png" alt="Toyplanet_logo"> </li>
    <li><div class="search">
    <img id="searchIcon"  src="assets/images/search_icon.png" alt="searchIcon">
    <input id="suchword" type="text" placeholder="Search">
    </div></li>
    </ul> 
</header>