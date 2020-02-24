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
    else
    {
        ?>colorGirl<?
    }
}
else
{
    ?>colorGirl
<? } ?>