document.addEventListener('DOMContentLoaded', function() {
    var forms = document.getElementsByClassName('formClass');
    for (var i = 0; i < forms.length; ++i) {

        var form = forms[i];
        var submit = form.querySelector('input[type="submit"]');
        submit.addEventListener('click', function(event) {
            event.stopPropagation(); // no send to the top element
            event.preventDefault(); // no default action on submit

            var request = new XMLHttpRequest();
            request.open(this.form.getAttribute('method'), 'index.php?c=shoppingcart&a=shoppingCart&ajax=1', true);

            request.onreadystatechange = function() {
                    // request finished?
                    if (this.readyState == 4) // XMLHttpRequest.DONE
                    {
                        // HTTP-Status-Code is OK?
                        if (this.status == 200) {

                        } else {
                            alert(this.statusText);
                        }
                    }
                }
                /*var formData = ;

                formData.append(i, submit);*/

            request.send(new FormData(this.form));

        });
    }
});