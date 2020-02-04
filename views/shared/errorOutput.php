<?php
if (!isset($_GET['ajax']) && isset($_POST['errorList']))
{
    print_r($_POST['errorList']);
}
//output error array