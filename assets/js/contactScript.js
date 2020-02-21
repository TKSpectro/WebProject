document.addEventListener('DOMContentLoaded', function () {
    var valid = false;
    var form = document.getElementById('iamform');
    var submit = document.getElementById('submitContact');
    submit.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        valid = validate();
        if (valid == true) {
            var request = new XMLHttpRequest();
            request.open(form.getAttribute('method'), 'index.php?c=formular&a=formular&ajax=1', true);
            request.onreadystatechange = function () {
                // request finished?
                if (this.readyState == 4) // XMLHttpRequest.DONE
                {
                    // HTTP-Status-Code is OK?
                    if (this.status == 200) {
                        alert('Nachricht wurde abgeschickt!')
                        // window.location.assign("index.php");
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

        var email = document.getElementById('emailID');
        var subject = document.getElementById('subjectID');
        var message = document.getElementById('messageID');
        var valid = true;

        //validate Input
        if (!validateEmail(email)) {
            email.parentNode.className += " errorinput";
            validate = false;
        } else {
            email.parentNode.className = email.parentNode.className.replace('errorinput', '');
        }

        if ((subject.value.length < 1) || validateSubject(subject)) {
            subject.parentNode.className += " errorinput";
            validate = false;
        } else {
            subject.parentNode.className = subject.parentNode.className.replace('errorinput', '');
        }

        if ((message.value.length < 1) || validateMessage(message)) {
            message.parentNode.className += " errorinput";
            validate = false;
        } else {
            message.parentNode.className = message.parentNode.className.replace('errorinput', '');
        }

        return validate;
    }

});

function validateEmail(email) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value.match(mailformat)) {
        return true;
    } else {
        console.log("Sie haben eine ungültige Email-Adresse eingegeben");
        return false;
    }
}

function validateSubject(subject){
    var format = /[ #^&\[\]{}'|<>\/]/;
    if (!format.test(subject){
        return true;
    }else{
        console.log("Sie haben einen ungültigen Betreff eingegeben")
        return false;
    }
}

function validateMessage(message){
    var format = /[ #^&\[\]{}'|<>\/]/;
    if (!format.test(subject){
        return true;
    }else{
        console.log("Sie haben einen ungültige Nachricht eingegeben")
        return false;
    }
}