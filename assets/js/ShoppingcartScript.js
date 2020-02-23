document.addEventListener('DOMContentLoaded', function() {
    var forms = document.getElementsByClassName('formClass');
    var gesamts = document.getElementsByClassName("GesamtBerechung");
    var pergrafWithForm = new Array();


    for (var i = 0; i < forms.length; ++i) {
        var temporaryArray = new Array();
        var form = forms[i];
        var price = gesamts[i];

        temporaryArray.push(form, price);
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
            TotalPrice();
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
        let errorAusgabe = document.getElementById("errorMessage");
        errorAusgabe.style.display = "none";
        format[1].style.display = "inline";

        var price = format[0][0].value;
        var inputValue = format[0][2].value;
        var quantity = format[0][2].value;
        var result = price * quantity;

        if (inputValue <= 0) {

            errorAusgabe.style.display = "block";
            console.log("error");
            format[1].style.display = "none";
            return;
        }

        format[1].innerHTML = result;

    }

    function TotalPrice() {
        let htmlSpan = document.getElementById("gesamteSumme");
        let totalSumme = document.getElementsByClassName("GesamtBerechung");
        let gesamteSumme = 0;
        for (var i = 0; i < totalSumme.length; ++i) {

            gesamteSumme += parseInt(totalSumme[i].innerHTML);

        }

        htmlSpan.innerHTML = gesamteSumme;



    }
});