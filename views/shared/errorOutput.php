<?php
if (!isset($_GET['ajax']) && isset($_POST['errorList']))
{
    ?>
<div class="errorList">
   <?=$_POST['errorList']?>
</div>
<?
}