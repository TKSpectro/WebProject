<div class="documentation">
    <h1>Dokumentation</h1>
    <a href="#inhalt"><h2>1. Inhalt</h2></a>
    <a href="#recherche"><h2>2. Ergebnisse der Recherche</h2></a>
    <a href="#layout"><h2>3. Seitenlayout</h2></a>
    <a href="#design"><h2>4. Design</h2></a>
    <a href="#function"><h2>5. Funktionalitäten</h2></a>
    <a href="#ermodell"><h2>6. ER-Modell</h2></a>
    <a href="#special"><h2>7. Besonderheiten</h2></a>
    <a href="#challenges"><h2>8. Herausforderungen und Lösungen</h2></a>
    <a href="#managment"><h2>9. Projektmanagment</h2></a>
    -------------------------------------------------------------------------------------------------------------------
    <a name="inhalt"><h2>1. Inhalt</h2></a>
    <ul>
        <li>Wir sind ToyPlanet, ein Online Spielzeugshop.</li>
        <li>Die Websitenutzer sind vorrangig Kinder und deren Eltern.</li>
        <li>Kinder können sich somit einfach auf der Website zurecht finden und die Produkte wählen die sie wollen.</li>
        <li>Erwachsene sollen ebenfalls möglichst einfach Produkte finden und diese bestellen können.</li>
    </ul>
    <a name="recherche"><h2>2. Ergebnisse der Recherche</h2></a>
    <ul>
        Als Referenz-Seiten haben wir uns an folgenden orientiert:
        <li><a href="https://my-klein-toys.de">1. my-klein-toys</a></li>
        <br>
        <img src="assets/images/documentation/otherWebKlein.png" style="height: 700px;"><br>
        <li><a href="https://www.smoby.com">2. Smoby</a></li>
        <br>
        <img src="assets/images/documentation/otherWebSmoby.png" style="height: 700px;"><br>
    </ul>
    <a name="layout"><h2>3. Seitenlayout</h2></a>
    <ul>
        <li>WireFrames:</li>
        <img src="assets/images/documentation/WireFrame.png" style="height: 500px;">
        <li>SiteMap:</li>
        <img src="assets/images/documentation/SiteMap.png" style="height: 500px;">
    </ul>
    <a name="design"><h2>4. Design</h2></a>
    <ul>
        <li>
            Layout: Wir haben unsere Seiten so aufgebaut, dass Erwachsene aber auch Kinder diese Seite möglichst einfach
            nutzen können.<br> Des Weiteren ist unsere Seite für die IPad Auflösung(1024x768) responsiv optimiert.
        </li>
        <li>
            Farben: Wir nutzen Cremefarben für den Hintergrund und für die jeweiligen Kategorien jeweils eine
            zugewiesene Farbe für eine schnelle Unterscheidung.
        </li>
        <li>
            Schrift: Unsere Standard Schriftart ist "KGILikeToMoveIt". Für Login, Registrierung oder Lange Fließtexte
            wird "Roboto-Regular" verwendet um ein einfachereres lesen zu ermöglichen.
        </li>
        <li>
            Bilder: Bilder welche auf der Seite verwendet werden sind immer möglichst farbenfroh und passend zum
            Thema.<br>Produkbilder sollten immer nur das Produkt selbst zeigen.
        </li>
    </ul>
    <a name="function"><h2>5. Funktionalitäten</h2></a>
    <ul>
        Funktionalitäten, welche umgesetzt wurden:
        <ul>
            <li>Login, Registrierung, Accountdaten ändern</li>
            <li>Produktseite, Einzelproduktansicht, Produktfilterung, Produktsuche</li>
            <li>Warenkorb, Bestellvorgang, Angedeutete Bezahlung</li>
            <li>Kontakt-Formular</li>
        </ul>

        <li>Flowchart für den Bestell-/Login-/Registierungsvorgang:</li>
        <img src="assets/images/documentation/orderFlowChart.png" style="height: 800px; width: auto;">
        <br><br><br><br>

        <li>Die Seiten für Login, Registrierung und Accountdaten sind selbsterklärend</li>
        <img src="assets/images/documentation/webSitePictures/login.png"
             style="height:800px; width: auto; border: 1px solid black;">
        <br><br><br><br>

        <li>Produktseite</li>
        <img src="assets/images/documentation/webSitePictures/product.png"
             style="height:800px; width: auto; border: 1px solid black;">
        <br><br><br><br>

        <li>Warenkorb</li>
        <img src="assets/images/documentation/webSitePictures/shoppingCart.png"
             style="height:800px; width: auto; border: 1px solid black;">
        <br><br><br><br>
        <li>Bestellen falls man nicht eingeloggt ist</li>
        <img src="assets/images/documentation/webSitePictures/checkOutNotLoggedIn.png"
             style="height:800px; width: auto; border: 1px solid black;">
        <br><br><br><br>
    </ul>
    <a name="ermodell"><h2>6. ER-Modell</h2></a>
    <ul>
        <img src="assets/images/documentation/er.png">
    </ul>
    <a name="special"><h2>7. Besonderheiten</h2></a>
    <ul>
        <li>Wir haben unser Responsive Design für StandardDesktop(1920x1080) und IPad(1024x768) optimiert</li>
        <br>
        <li>Leider haben wir zwei Sachen nicht umsetzten können</li>
        <li>
            Zum einen das Entfernen eines Produkts aus dem Warenkorb per JS, da dafür per JS ein Datenbankupdate hätte
            abgeschickt werden müssen.
        </li>
        <li>
            Das Zweite was wir leider nicht umsetzten konnten war das Prüfen auf bereits vorhandene EMail Adressen bei
            der Registrierung per JS
        </li>
        <li>Ohne JS funktioniert aber beides</li>
    </ul>
    <a name="challenges"><h2>8. Herausforderungen und Lösungen</h2></a>
    <ul>
        <table style="width:100%; border-collapse: collapse;">
            <tr>
                <th>Herausforderung</th>
                <th>Lösung</th>
            </tr>
            <tr>
                <td>Umsetzten und Einbinden von JavaScript und AJAX</td>
                <td>Erst in einem Test Projekt, welches nich ganz so komplex war, umgesetzt und dann in richtiges
                    Projekt übertragen
                </td>
            </tr>
            <tr>
                <td>Filterung von Produkten</td>
                <td>Durch verschiedene Parameter ein SQL Statement aufbauen</td>
            </tr>
            <tr>
                <td>Speichern von Adressen und Bestellung</td>
                <td>Adressen nach Eingabe speichern und die ID in der Session speichern um diese beim Checkout
                    ordentlich zuordnen zu können
                </td>
            </tr>
        </table>
    </ul>

    <a name="managment"><h2>9. Projetkmanagment</h2></a>
    <ul>
        <table style="width:500px">
            <tr>
                <th>Tätigkeit</th>
                <th>Zuständiger</th>
            </tr>
            <tr>
                <td>Datenstruktur</td>
                <td>Beide</td>
            </tr>
            <tr>
                <td>Aussehen/CSS</td>
                <td>Bilal Alnaani</td>
            </tr>
            <tr>
                <td>Funktionalität</td>
                <td>Beide</td>
            </tr>
            <tr>
                <td>Dokumentation</td>
                <td>Tom Käppler</td>
            </tr>
        </table>
    </ul>
</div>