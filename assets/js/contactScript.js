document.addEventListener('DOMContentLoaded', function () {
    var valid = true;
    var form = document.getElementById('formContact');
    var submit = document.getElementById('submitContact');
    submit.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        valid = validate();
        if (valid == true) {
            var request = new XMLHttpRequest();
            request.open(form.getAttribute('method'), 'index.php?c=contact&a=contact&ajax=1', true);
            request.onreadystatechange = function () {
                // request finished?
                if (this.readyState == 4) // XMLHttpRequest.DONE
                {
                    // HTTP-Status-Code is OK?
                    if (this.status == 200) {
                        alert('Nachricht wurde abgeschickt!');
                        // window.location.assign("index.php");
                    } else {
                        alert(this.statusText);
                    }
                }
            };

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
        if ((subject.value.length < 1) || !validateEmail(email)) {
            email.parentNode.className += " errorinput";
            valid = false;
        } else {
            email.parentNode.className = email.parentNode.className.replace('errorinput', '');
        }

        if ((subject.value.length < 1) || !validateSubject(subject)) {
            subject.parentNode.className += " errorinput";
            valid = false;
        } else {
            subject.parentNode.className = subject.parentNode.className.replace('errorinput', '');
        }

        if ((message.value.length < 1) || !validateMessage(message)) {
            message.parentNode.className += " errorinput";
            valid = false;
        } else {
            message.parentNode.className = message.parentNode.className.replace('errorinput', '');
        }

        if(valid == false)
            console.log('Failed');

        return valid;
    }

});

function validateEmail(email) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value.match(mailformat) != null) {
        return true;
    } else {
        console.log("Sie haben eine ungültige Email-Adresse eingegeben");
        return false;
    }
}

function validateSubject(subject){
    var format = /[#^&\[\]{}'|<>\/]/;
    if (subject.value.match(format) == null){
        return true;
    }else{
        console.log("Sie haben einen ungültigen Betreff eingegeben");
        return false;
    }
}

function validateMessage(message){
    var format = /[#^&\[\]{}'|<>\/]/;
    if (message.value.match(format) == null){
        return true;
    }else{
        console.log("Sie haben einen ungültige Nachricht eingegeben");
        return false;
    }
}