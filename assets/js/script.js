document.addEventListener('DOMContentLoaded', function() {

            var form = document.getElementById('form-date');
            var submit = document.getElementById('senddate');
            //var errorBox = document.getElementById('error-box');

            submit.addEventListener('click', function(event) {
                    event.stopPropagation(); // no send to the top element
                    event.preventDefault(); // no default action on submit

                    var request = new XMLHttpRequest();
                    request.open(form.getAttribute('method'), '?ajax=1', true);
                    console.log(form.getAttribute('method'); request.onreadystatechange = function() {
                            // request finished?
                            if (this.readyState == 4) // XMLHttpRequest.DONE
                            {
                                // HTTP-Status-Code is OK?
                                if (this.status == 200) {
                                    alert(this.responseText);
                                } else {
                                    alert(this.statusText);
                                }
                            }
                        }


                        var formData = new FormData(form); formData.append('delete', '1'); request.send(formData);

                    });
            });