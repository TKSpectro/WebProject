<section class="center">
<ul class="startseite">
  
  <li><img id="jung" src="assert/photos/jung.png" alt="jung_image"></li> 

    <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
    
      <h1>Sie sind angemeldet</h1>
      <form action="<?=$_SERVER['PHP_SELF'].'?a=logout';?>" method="Post">
        <input type="submit"  name="logout" value="Logout">
      </form> 
    <?php endif; ?>

  <li> <a href= "index.php?a=login" ><img id="vater" src="assert/photos/vater.png" alt="vater_image"></a></li>
  <li> <img id="girls" src="assert/photos/girls.png" alt="girls_image"></li>
  </ul>


</section>
	