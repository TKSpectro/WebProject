document.addEventListener('DOMContentLoaded', function() {
    var forms = document.getElementsByClassName('formClass');
    var gesamts = document.getElementsByClassName("GesamtBerechung");
    var pergrafWithForm = new Array();


    for (var i = 0; i < forms.length; ++i) {
        var temporaryArray = new Array();
        var form = forms[i];
        var test = gesamts[i];

        temporaryArray.push(form, test);
        pergrafWithForm.push(temporaryArray);
        productprice(pergrafWithForm[i]);

        var submit = form.querySelector('input[type="submit"]');
        submit.addEventListener('click', function(event) {
            event.stopPropagation(); // no send to the top element
            event.preventDefault(); // no default action on submit

            for (var i = 0; i < pergrafWithForm.length; ++i) {
                if (this.form == pergrafWithForm[i][0]) {
                    productprice(pergrafWithForm[i]);
                }
            }

            var request = new XMLHttpRequest();
            request.open(this.form.getAttribute('method'), 'index.php?c=shoppingcart&a=shoppingCart&ajax=1', true);

            request.onreadystatechange = function() {
                // request finished?
                if (this.readyState == 4) // XMLHttpRequest.DONE
                {
                    // HTTP-Status-Code is OK?
                    if (this.status == 200) {
                        console.log("done");
                    } else {
                        alert(this.statusText);
                    }
                }
            }


            request.send(new FormData(this.form));

        });
    }

    function productprice(format) {

        var price = format[0][0].value;
        var quantity = format[0][2].value;
        var result = price * quantity;

        format[1].innerHTML = result;


    }
});