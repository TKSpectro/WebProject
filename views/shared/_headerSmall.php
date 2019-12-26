<header class="small">
  <ul class="icons">
  <li> <img id="Warenkorb" src="assets/images/shopping-cart.png" alt="Warenkorb"></li>

  <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
    <li><a href= "index.php?a=account" ><img src="assets/images/Account_verwaltung.png" alt="Account"></a></li>

  <form id="logoutButton"  action="<?=$_SERVER['PHP_SELF'].'?a=logout';?>" method="Post">
    <li><input type="submit" id="logout"  name="logout" value="abmelden"></li>
  </form> 
  <?php else :?>
  <li><a href= "index.php?a=login" ><img src="assets/images/Account_verwaltung.png" alt="Account"></a></li>
  <?php endif; ?>

  </ul> 

  <ul>
  <li><a href="index.php"><img id="logo" src="assets/images/Logo.png" alt="Toyplanet_logo"></a> </li>
  <li><div class="search">
  <img id="searchIcon"  src="assets/images/search_icon.png" alt="searchIcon">
  <input id="suchword" type="text" placeholder="Suchen">
  </div></li>
  </ul> 
</header>