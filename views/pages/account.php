<div class="register">
    <form class="standardForm" method="Post">
        <figure>
            <img src="assets/images/Account_verwaltung2.png" alt="Account_verwaltung Bild">
            <figcaption>Persönliche Daten ändern</figcaption>
        </figure>
        <fieldset class="register_fieldset">
            <legend>Vorname</legend>
            <input type="text" name="firstName"
                   value="<?= isset($accounts['0']['firstname']) ? htmlspecialchars($accounts['0']['firstname']) : null ?>">
        </fieldset>
        <fieldset class="register_fieldset">
            <legend>Nachname</legend>
            <input type="text" name="lastName"
                   value="<?= isset($accounts['0']['lastname']) ? htmlspecialchars($accounts['0']['lastname']) : null ?>">
        </fieldset>
        <fieldset class="register_fieldset">
            <legend>E-Mail</legend>
            <input type="email" name="email"
                   value="<?= isset($accounts['0']['email']) ? htmlspecialchars($accounts['0']['email']) : null ?>">
        </fieldset>
        <fieldset class="register_fieldset">
            <legend>Passwort</legend>
            <input type="password" name="password" placeholder="Dein Password">
        </fieldset>
        <fieldset class="register_fieldset">
            <legend>Geburtstag</legend>
            <input type="date" name="birthday"
                   value="<?= htmlspecialchars($accounts['0']['birthday']) ?>"></fieldset>
        <fieldset class="register_fieldset">
            <legend>Handy</legend>
            <input type="number" name="mobile"
                   value="<?= htmlspecialchars($accounts['0']['mobile']) ?>"></fieldset>
        <fieldset class="register_fieldset">
            <legend>Telefon</legend>
            <input type="number" name="phone"
                   value="<?= htmlspecialchars($accounts['0']['phone']) ?>"></fieldset>
        <input type="submit" name="changeAccountData" value="Änderungen bestätigen">
    </form>
</div>
