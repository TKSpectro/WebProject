<?php if (!isset($_GET['search']))
{
    if ($_GET['type'] == 'Jungs-Toys')
    {
        ?>colorBoy<?
    }
    elseif ($_GET['type'] == 'Konsolespiele' || isset($_GET['search']))
    {
        ?>colorConsole<?
    }
    elseif($_GET['type'] == 'Mädchen-Toys' || isset($_GET['search']))
    {
        ?>colorGirl<?
    }
    else{
        ?>colorFilter<?
    }
}
else
{
    ?>colorFilter
<? } ?>