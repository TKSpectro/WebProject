<div class="formular">
    <form class="iamform" action="<?= $_SERVER['PHP_SELF'] . '?a=contact'; ?>" method="Post">

        <figure>
            <!--//TODO Change Picture-->
            <img src="assets/images/Account_verwaltung2.png" alt="Account_verwaltung Bild">
            <figcaption>Kontakt Formular</figcaption>
        </figure>

        <fieldset>
            <legend>E-Mail *</legend>
            <input type="email" name="eMail">
        </fieldset>


        <fieldset>
            <legend>Betreff *</legend>
            <input type="text" name="subject">
        </fieldset>


        <fieldset>
            <legend>Nachricht *</legend>
            <textarea id="message" name="message" placeholder="" style="height: 200px;"></textarea>
        </fieldset>

        <input type="submit" name="sendContact" value="Abschicken">
    </form>
</div>