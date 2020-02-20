<div class="formular">
    <form class="iamform" method="Post" id="iamform">
        <figure>
            <img src="assets/images/Account_verwaltung2.png" alt="Account_verwaltung Bild">
            <figcaption>Benutzerkonto Erstellen</figcaption>
        </figure>

        <fieldset class="register_fieldset">
            <legend>Vorname</legend>
            <div class="formularInput"><input type="text" id="firstNameID" name="firstName">
                <span class="error-message">Der Vorname muss mindestens 3 Zeichen sein und der erste Buchstabe groß geschrieben</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Nachname</legend>
            <div class="formularInput"><input type="text" id="lastNameID" name="lastName">
                <span class="error-message">Der Nachname muss mindestens 3 Zeichen sein und der erste Buchstabe groß geschrieben</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>E-Mail</legend>
            <div class="formularInput"><input type="email" id="emailID" name="email">
                <span class="error-message">Geb bitte eine E-Mail-Adresse in dieser Form: personalInfo@domain.examle</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Passwort</legend>
            <div class="formularInput"><input type="password" id="passwordID" name="password">
                <span class="error-message">Das Password muss mindestens 8 Zeichen, einen großen/kleinen Buchstabe und ein nummer haben</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Geburtstag</legend>
            <div class="formularInput"><input type="date" id="birthdayID" name="birthday">
                <span class="error-message">Geb bitte ein Datum mit dem Schema 2017-04-10 also JJJJ-MM-TT an.</span>
            </div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Handy</legend>
            <div class="formularInput"><input type="number" id="mobilID" name="mobile">
                <span class="error-message">Der Handy-Nummer muss mindestens 9 Zeichen sein</span></div>
        </fieldset>

        <fieldset class="register_fieldset">
            <legend>Telefon</legend>
            <input type="number" id="phoneID" name="phone"></fieldset>
        <input type="submit" id="formularSubmitID" name="sendAccount" value="Registrieren">
    </form>
</div>

