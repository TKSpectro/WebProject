<div class="non-content-pages">
    Du bist angemeldet als <?=user($_SESSION['user'])['firstName'].' '.user($_SESSION['user'])['lastName']?>
    Und du bist auf <?=$page?><br>
    <br>
    Folgende Seiten hast du bereits besucht:
    <br>
    <? foreach($_SESSION['user']['visitedPages'] as $page => $value) : ?>
        <? if($value) : ?>
            <br>    
            <?=$page?>
        <? endif;?>
    <? endforeach;?>
</div>