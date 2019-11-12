<header>
    <nav>
        <ul>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=user">Konto</a></li>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=page1">Beispielseite 1</a></li>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=page2">Beispielseite 2</a></li>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=page3">Beispielseite 3</a></li>
        </ul>
        <form action="<?=$_SERVER['PHP_SELF'].'?p=user';?>" method="post">
            <input type="submit" name="submitLogout" value="logout">
        </form>
    </nav>
</header>

<main>

<?
switch($page)
{
    case 'user':
        $user = user($_SESSION['user']);
        include (VIEWPATH.'/pages/user.php');
    break;
    case 'page1':
        include (VIEWPATH.'/pages/page1.php');
    break;
    case 'page2':
        include (VIEWPATH.'/pages/page2.php');
    break;
    case 'page3':
        include (VIEWPATH.'/pages/page3.php');
    break;
    default:
        echo 'Error 404';
    break;
}
?>

<?


</main>

<footer>

</footer>