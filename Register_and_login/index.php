<html>
    <head>
        <style>
            #name_error{
                color: red;
            }
            #email_error{
                color: red;
            }
            #number_error{
                color: red;
            }
            #address_error{
                color: red;
            }
            #password_error{
                color: red;
            }
            p {
                font-size: 30px;
                text-align:center;
                border-bottom: 4px solid black;
            }
        </style>
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    </head>
    <body>
        <center><h2>User Registration Form</h2></center>
        <p id="success_message" ></p>
        <form id="Registration_Form"  method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label> Name :</label>
                        <input type="text" class="form-control" minlength="8" id="name" name="name" required="" >
                        <span  id="name_error"></span>
                    </div>
                    <div class="col-sm-6" >
                        <label>Email :</label>
                        <input type="email" class="form-control"  name="email" id="email" required="" >
                        <span  id="email_error"></span>
                    </div>
                </div><br>
                <div class="row" >
                <div class="col-sm-6" >
                        <lable>Number :</lable>
                        <input type="text" class="form-control" name="number" id="number" required="" >
                        <span  id="number_error"></span>
                    </div>
                    <div class="col-sm-6" >
                        <lable>Address</lable>
                        <textarea class="form-control" name="address" id="address" required="" rows="1" ></textarea>
                        <span  id="address_error"></span>
                    </div>
                </div><br>
                <div class="row" >
                    <div class="col-sm-6" >
                        <label>Password</label>
                        <input type="password" class="form-control"  name="password" id="password" required="">
                        <span id="password_error"></span>
                    </div>
                    <div class="col-sm-6" >
                        <lable>Conform Password</lable>
                        <input type="password" class="form-control" id="c_password" required="">
                        <span id="message"></span>
                    </div>
                </div><br>
                <br>
                <input type="submit" value="Register" name="regsiter">
            </div>
        </form>
        <!-------------script ------------->
        <script>
            $(document).ready(function () {
                $("#name_error").hide();
                $("#email_error").hide();
                $("#number_error").hide();
                $("#address_error").hide();
                $("#password_error").hide();

                var error_name = false;
                var error_email = false;
                var error_number = false;
                var error_address = false;
                var error_password = false;

                $("#name").focusout(function(){
                    check_name();
                });
                $("#email").focusout(function(){
                    check_email();
                })
                $("#number").focusout(function(){
                    check_number();
                })
                $("#address").focusout(function(){
                    check_address();
                })
                $("#password").focusout(function(){
                    check_password();
                })
                // Name Validation
                function check_name() {
                    var name_pattern = /^[a-zA-Z ]*$/;
                    var name = $("#name").val();
                    if (name_pattern.test(name) && name != '') {
                        $("#name_error").hide();
                        $("#name").css("border","2px solid green");
                    } else {
                        $("#name_error").html("Enter your valid Name");
                        $("#name_error").show();
                        error_name = true;
                    }
                }
                //Email validation
                function check_email(){
                    var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    var email = $("#email").val();
                    if(email_pattern.test(email) && email != ''){
                        $("#email_error").hide();
                        $("#email").css("border","2px solid green");
                    } else {
                        $("#email_error").html("Please enter your valid email");
                        $("#email_error").show();
                        error_email = true;
                    }
                }
                //number Validation
                function check_number(){
                    var number_pattern = /^[0]?[789]\d{9}$/;
                    var number = $("#number").val();
                    if(number_pattern.test(number) && number != ''){
                        $("#number_error").hide();
                        $("#number").css("border","2px solid green");
                    } else {
                        $("#number_error").html("Please enter your valid contact number");
                        $("#number_error").show();
                        error_number = true;
                    }
                }
                //Address validation
                function check_address(){
                    var address_pattern = /^[a-zA-Z ]*$/;
                    var address = $("#address").val();
                    if(address_pattern.test(address) && address != ''){
                        $("#address_error").hide();
                        $("#address").css("border","2px solid green");
                    } else {
                        $("#address_error").html("Please enter your Address");
                        $("#address_error").show();
                        error_address = true;
                    }
                }
                //Password validation
                function check_password(){
                    var password_pattern =  /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
                    var password = $("#password").val();
                    if(password_pattern.test(password) && password != ''){
                        $("#password_error").hide();
                        $("#password").css("border","2px solid green");
                    } else {
                        $("#password_error").html("Password should contain atleast one number and one special character");
                        $("#password_error").show();
                        error_password = true;
                    }
                }
                //password matching
                $('#password, #c_password').on('keyup', function () {
                    if ($('#password').val() == $('#c_password').val()) {
                        $('#message').html('Matching').css('color', 'green');
                    } else {
                        $('#message').html('Not Matching').css('color', 'red');
                    }      
                });
                $("#Registration_Form").submit(function(event) {
                    event.preventDefault();
                    check_name();
                    check_email();
                    check_number();
                    check_address();
                    check_password();
                        var name= $("#name").val();
						
                        var email= $("#email").val();
                        var number= $("#number").val();
                        var address= $("#address").val();
                        var password= $("#password").val();
                        $.ajax({
                            type: "POST",
                            url: 'ajax.php',
                            data: {
                                name: name,
                                email: email,
                                number: number,
                                address:address,
                                password:password,
                                'action':'insert'
                            },
                            success: function(response){
                                var obj = JSON.parse(response);;
                                if(obj.status !=''){
                                    if(obj.status == 2){
                                        jQuery('#success_message').text(obj.message);
                                        setTimeout(function() {
                                            $('#success_message').fadeOut();
                                            window.location.href="login.php";
                                        }, 3000 );
                                        jQuery('#Registration_Form')[0].reset();
                                    } else if(obj.status == 1){
                                        jQuery('#Registration_Form')[0].reset();
                                        jQuery('#success_message').text(obj.message);    
                                    }
                                }
                            }
                        });
                    return false;
                });
            });
        </script>
        <!-------------script ------------->
    </body>
</html>