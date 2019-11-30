<form action="" method="post">

<div>
        <label for="first-name">Vorname</label>
        <input type="text" name="fname" 
        value="<?=isset($error) && isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : ''?>">
    </div>

    <div>
        <label for="last-name">Nachname</label>
        <input type="text" name="lname"
        value="<?= isset($error) && isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : ''?>">
    </div>


    <div>
        <label for="e-mail">E-Mail</label>
        <input type="email" name="email" 
        value="<?= isset($error) && isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''?>">
    </div>

    <div>
        <label for="password">password</label>
        <input type="text" name="password" 
        value="<?= isset($error) && isset($_POST['url']) ? htmlspecialchars($_POST['url']) : ''?>">
    </div>

    <div>
        <label for="birthday">Birthday</label>
        <input type="date" name="birthday" 
        value="<?= isset($error) && isset($_POST['url']) ? htmlspecialchars($_POST['url']) : ''?>">
    </div>

    <div>
        <label for="mobil">Mobil</label>
        <input type="number" name="mobil" 
        value="<?= isset($error) && isset($_POST['url']) ? htmlspecialchars($_POST['url']) : ''?>">
    </div>

    <div>
        <label for="phone">Phone</label>
        <input type="number" name="password" 
        value="<?= isset($error) && isset($_POST['url']) ? htmlspecialchars($_POST['url']) : ''?>">
    </div>

    <input type="submit" name="sendForm" value="schicken">

</form>