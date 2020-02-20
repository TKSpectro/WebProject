<?php
if (!isset($_GET['ajax']) && isset($_POST['errorList']))
{
    ?>
<div class="alert alertError">
   <?=$_POST['errorList']?>
</div>
<?
}