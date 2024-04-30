<script type="text/javascript">
        //declare Variables to be used
        var divs = ["errorFirst", "errorLast", "errorphone", "erroraddress", "erroremail", "errorpassword"];

        //Validation function
        function validate() {
            //just for input element
            var inputs = [
                document.getElementById('first_name').value,
                document.getElementById('last_name').value,
                document.getElementById('phone').value,
                document.getElementById('address').value,
                document.getElementById('email').value,
                document.getElementById('Password').value
            ];

            //just for errors
            var errors = [
                "Please enter your First name!",
                "Please enter your Last name!",
                "Please enter your phone!",
                "Please enter your address!",
                "Please enter your Email!",
                "Please enter your Password!"
            ];

            //we need to iterate through inputs
            for (var i = 0; i < inputs.length; i++) {
                var errorMessage = errors[i];
                var div = divs[i];
                if (inputs[i] == "") {
                    document.getElementById(div).innerHTML = errorMessage;
                } else {
                    document.getElementById(div).innerHTML = "OK!";
                }
            }
        }

        function finalValidate() {
            var count = 0;
            for (var i = 0; i < 6; i++) {
                var div = divs[i];
                if (document.getElementById(div).innerHTML == "OK!") {
                    count++;
                }
            }
            if (count == 6) {
                document.getElementById("errorfinal").innerHTML = "All the data you entered are correct!";
            }
        }
    </script>
