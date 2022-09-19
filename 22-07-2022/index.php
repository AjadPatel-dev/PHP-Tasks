<html>
    <head>
        <style>
            .error_form {
                top: 12px;
                color: rgb(216, 15, 15);
                font-size: 15px;
                font-family: Helvetica;
            }
            p {
                font-size: 30px;
                text-align:center;
                /* color: red; */
                border: 4px solid black;
            }
        </style>
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <!-- <script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>   
    </head>
    <body>
        <center><h1>Bootstrap Form</h1></center>
        <p id="success_message" ></p>
        <form id="form_validation"  method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label>First Name :</label>
                        <input type="text" class="form-control" id="fname" name="fname" required="">
                        <span class="error_form" id="fname_error"></span>
                    </div>
                    <div class="col-sm-6">
                        <label>Last Name :</label>
                        <input type="text" class="form-control"  name="lname" id="lname" required="" >
                        <span class="error_form" id="lname_error"></span>
                    </div>
                </div><br>
                <div class="row" >
                    <div class="col-sm-6" >
                        <label>Email :</label>
                        <input type="text" class="form-control"  name="email" id="email" required="">
                        <span class="error_form" id="email_error"></span>
                    </div>
                    <div class="col-sm-6" >
                        <lable>Number :</lable>
                        <input type="text" class="form-control" name="number" id="number" required="" >
                        <span class="error_form" id="number_error"></span>
                    </div>
                </div><br>
                <input type="submit" value="Register" name="">
            </div>
        </form>
        <!-----------Script Start----------->
        <script>
            $(document).ready(function(){
                $("#fname_error").hide();
                $("#lname_error").hide();
                $("#email_error").hide();
                $("#number_error").hide();

                var error_fname = false;
                var error_lname = false;
                var error_email = false;
                var error_number = false;

                $("#fname").focusout(function(){
                    check_fname();
                });

                $("#lname").focusout(function() {
                    check_lname();
                });

                $("#email").focusout(function() {
                    check_email();
                });

                $("#number").focusout(function(){
                    check_number();
                });

                function check_fname() {
                    var fname_pattern = /^[a-zA-Z]*$/;
                    var firstname = $("#fname").val();
                    if (fname_pattern.test(firstname) && firstname != '') {
                        $("#fname_error").hide();
                        $("#fname").css("border","2px solid #34F458");
                    } else {
                        $("#fname_error").html("Enter your valid first name");
                        $("#fname_error").show();
                        $("#fname").css("border","2px solid #F90A0A");
                        error_fname = true;
                    }
                }

                function check_lname() {
                    var lname_pattern =/^[a-zA-Z]*$/;
                    var lastname = $("#lname").val()
                    if (lname_pattern.test(lastname) && lastname != '') {
                        $("#lname_error").hide();
                        $("#lname").css("border","2px solid #34F458");
                    } else {
                        $("#lname_error").html("Enter your valid last name");
                        $("#lname_error").show();
                        $("#lname").css("border","2px solid #F90A0A");
                        error_lname = true;
                    }
                }

                function check_email() {
                    var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    var emailid = $("#email").val();
                    if (email_pattern.test(emailid) && emailid != '') {
                        $("#email_error").hide();
                        $("#email").css("border","2px solid #34F458");
                    } else {
                        $("#email_error").html("Invalid Email");
                        $("#email_error").show();
                        $("#email").css("border","2px solid #F90A0A");
                        error_email = true;
                    }
                }

                function check_number() {
                    var pattern = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
                    var contactnumber = $("#number").val();
                    if (pattern.test(contactnumber) && contactnumber != '') {
                        $("#number_error").hide();
                        $("#number").css("border","2px solid #34F458");
                    } else {
                        $("#number_error").html("Invalid Number");
                        $("#number_error").show();
                        $("#number").css("border","2px solid #F90A0A");
                        error_number = true;
                    }
                }

                $("#form_validation").submit(function(event) {
                    // alert("111");
                    event.preventDefault();
                    error_fname = false;
                    error_lname = false;
                    error_email = false;
                    error_number = false;

                    check_fname();
                    check_lname();
                    check_email();
                    check_number();

                    if (error_fname === false && error_lname === false && error_email === false && error_number === false) {
                        var firstname= $("#fname").val();
                        var lastname= $("#lname").val();
                        var emailid= $("#email").val();
                        var contactnumber= $("#number").val();
                        $.ajax({
                            type: "POST",
                            url: 'http://localhost/Ajad/19-07-2022/ajax.php',
                            data: {
                                firstname: firstname,
                                lastname: lastname,
                                emailid: emailid,
                                contactnumber: contactnumber,
                                'action':'save_form'
                            },
                            success: function(response){
                                $('#success_message').fadeIn().html(response);
                                setTimeout(function() {
                                    $('#success_message').fadeOut();
                                    window.location.href="show.php";
                                }, 3000 );
                            }

                        });

                    }else{
                            alert("Please Currect fill the form");
                            return false;
                        }
                    return false;
                });
            });
        </script>
        <!-----------Script End----------->
    </body>
</html>