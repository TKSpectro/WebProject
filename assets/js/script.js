document.addEventListener('DOMContentLoaded', function() {
    if ((document.getElementById('form-date') != null) && (document.getElementById('senddate') != null)) {
        var form = document.getElementById('form-date');
        var submit = document.getElementById('senddate');
    }
    /*else {
           var form = document.getElementById('formContactUs');
           var submit = document.getElementById('submitContactUs');
       }*/
    //var errorBox = document.getElementById('error-box');

    submit.addEventListener('click', function(event) {
        event.stopPropagation(); // no send to the top element
        event.preventDefault(); // no default action on submit

        var request = new XMLHttpRequest();
        request.open(form.getAttribute('method'), 'index.php?c=shoppingcart&a=shoppingCart&ajax=1', true);
        console.log(form.getAttribute('method'));
        request.onreadystatechange = function() {
            // request finished?
            if (this.readyState == 4) // XMLHttpRequest.DONE
            {
                // HTTP-Status-Code is OK?
                if (this.status == 200) {
                    alarm('läuft');
                } else {
                    alert(this.statusText);
                }
            }
        }


        var formData = new FormData(form);
        formData.append('delete', '1');
        request.send(formData);

    });

});