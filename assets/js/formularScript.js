document.addEventListener('DOMContentLoaded', function() {
    var validierung = true;
    var form = document.getElementById('iamform');
    var submit = document.getElementById('formularSubmitID');
    submit.addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        validierung = validate();
        if (validierung == true) {
            var request = new XMLHttpRequest();
            request.open(form.getAttribute('method'), 'index.php?c=formular&a=formular&ajax=1', true);
            request.onreadystatechange = function() {
                // request finished?
                if (this.readyState == 4) // XMLHttpRequest.DONE
                {
                    // HTTP-Status-Code is OK?
                    if (this.status == 200) {
                        window.location.assign("index.php");
                    } else {
                        alert(this.statusText);
                    }
                }
            }

            request.send(new FormData(form));
            //window.location.assign("index.php");
        }
    });


    function validate() {
        /*
        * We should check if an email is already existing in db
        * but for that feature we would have to check in the db with js
        * if js is disabled you get an error for duplicate email via php
        * */


        var firstName = document.getElementById('firstNameID');
        var lastName = document.getElementById('lastNameID');
        var email = document.getElementById('emailID');
        var password = document.getElementById('passwordID');
        var birthday = document.getElementById('birthdayID');
        var mobil = document.getElementById('mobilID');
        var phone = document.getElementById('phoneID');
        var validate = true;

        //validate Input
        if ((firstName.value.length < 3) || (firstName.value.match(/^[A-Z]{1}/) != firstName.value.charAt(0))) {
            firstName.parentNode.className += " errorinput";
            validate = false;
        } else {
            firstName.parentNode.className = firstName.parentNode.className.replace('errorinput', '');
        }
        if ((lastName.value.length < 3) || (lastName.value.match(/^[A-Z]{1}/) != lastName.value.charAt(0))) {
            lastName.parentNode.className += " errorinput";
            validate = false;
        } else {
            lastName.parentNode.className = lastName.parentNode.className.replace('errorinput', '');
        }
        if (!validateEmail(email)) {
            email.parentNode.className += " errorinput";
            validate = false;
        } else {
            email.parentNode.className = email.parentNode.className.replace('errorinput', '');
        }
        if (!validatePassword(password)) {
            password.parentNode.className += " errorinput";


            validate = false;
        } else {
            password.parentNode.className = password.parentNode.className.replace('errorinput', '');
        }
        if (birthday.value.match(/[0-9]{4}-[0-9]{2}-[0-9]{2}/i) === null) {
            birthday.parentNode.className += " errorinput";
            validate = false;
        } else {
            birthday.parentNode.className = birthday.parentNode.className.replace('errorinput', '');
        }
        if (mobil.value.length < 9) {
            mobil.parentNode.className += " errorinput";
            validate = false;
        } else {
            mobil.parentNode.className = mobil.parentNode.className.replace('errorinput', '');
        }


        return validate;
    }

});

function validateEmail(email) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value.match(mailformat)) {
        return true;
    } else {
        console.log("Sie haben eine ungültige Email-Adresse!");
        return false;
    }
}

function validatePassword(password) {
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    // Validate length,numbers,capital letters,lowercase letters

    if ((password.value.match(lowerCaseLetters)) && (password.value.match(upperCaseLetters)) &&
        (password.value.match(numbers)) && (password.value.length >= 8)) {
        return true;
    } else {
        console.log("Sie haben ein ungültiges Password!");
        return false;
    }

}