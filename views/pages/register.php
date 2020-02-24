<div class="register">
    <form class="iamform" method="Post" id="iamform">
        <figure>
            <img src="assets/images/Account_verwaltung2.png" alt="Account_verwaltung Bild">
            <figcaption>Benutzerkonto Erstellen</figcaption>
        </figure>

        <fieldset class="register_fieldset">
            <legend>Vorname</legend>
            <div class="registerInput"><input type="text" id="firstNameID" name="firstName">
                <span class="error-message">Der Vorname muss mindestens 3 Zeichen sein und der erste Buchstabe groß geschrieben werden.</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Nachname</legend>
            <div class="registerInput"><input type="text" id="lastNameID" name="lastName">
                <span class="error-message">Der Nachname muss mindestens 3 Zeichen sein und der erste Buchstabe groß geschrieben werden.</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>E-Mail</legend>
            <div class="registerInput"><input type="email" id="emailID" name="email">
                <span class="error-message">Geben Sie bitte eine E-Mail-Adresse in dieser Form ein: personalInfo@domain.examle</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Passwort</legend>
            <div class="registerInput"><input type="password" id="passwordID" name="password">
                <span class="error-message">Das Password muss aus mindestens 8 Zeichen, einem großen/kleinen Buchstaben und einer Nummer bestehen.</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Geburtstag</legend>
            <div class="registerInput"><input type="date" id="birthdayID" name="birthday">
                <span class="error-message">Geben Sie bitte das Datum in dieser Form ein: 2017-04-10 also JJJJ-MM-TT</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Handy</legend>
            <div class="registerInput"><input type="number" id="mobilID" name="mobile">
                <span class="error-message">Die Handy-Nummer muss mindestens 9 Zeichen lang sein.</span></div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Telefon</legend>
            <input type="number" id="phoneID" name="phone"></fieldset>
        <input type="submit" id="registerSubmitID" name="sendAccount" value="Registrieren">
    </form>
</div>

