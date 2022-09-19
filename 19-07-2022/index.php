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
                border: 4px solid black;
            }
        </style>
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>   
    </head>
    <body>
        <center><h1>Bootstrap Form</h1></center>
        <p id="success_message" ></p>
        <?php
                $action=isset($_GET['action']) ? $_GET['action'] : '';
            ?>
                <form id="<?php
                if($action =="edit") {
                echo 'form_edit';
                } else{
                echo 'form_validation';

                }?>"  method="post">
        <?php
            $records = array();
            if(isset($_GET['id']) && !empty($_GET['id'])){
                include_once("connection.php");
                $id = $_GET['id'];
                $query ="SELECT * FROM student_data WHERE id = $id";
                $result = mysqli_query($conn,$query);
                 $row = $result->fetch_assoc();
                 $records["id"] = !empty($row["id"]) ? $row["id"] : "";
                 $records["fname"] = !empty($row["fname"]) ? $row["fname"] : "";
                 $records["lname"] = !empty($row["lname"]) ? $row["lname"] : "";
                 $records["email"] = !empty($row["email"]) ? $row["email"] : "";
                 $records["number"] = !empty($row["number"]) ? $row["number"] : "";              
            }
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" value="<?php echo !empty($records["id"])  ? $records["id"] : "";?>" id="id" name="">
                        <label>First Name :</label>
                        <input type="text" class="form-control" id="fname" name="fname" required="" value="<?php echo !empty($records["fname"])  ? $records["fname"] : "";?>">
                        <span class="error_form" id="fname_error"></span>
                    </div>
                    <div class="col-sm-6">
                        <label>Last Name :</label>
                        <input type="text" class="form-control"  name="lname" id="lname" required="" value="<?php echo !empty($records["lname"])  ? $records["lname"] : "";?>">
                        <span class="error_form" id="lname_error"></span>
                    </div>
                </div><br>
                <div class="row" >
                    <div class="col-sm-6" >
                        <label>Email :</label>
                        <input type="text" class="form-control"  name="email" id="email" required="" value="<?php echo !empty($records["email"])  ? $records["email"] : "";?>">
                        <span class="error_form" id="email_error"></span>
                    </div>
                    <div class="col-sm-6" >
                        <lable>Number :</lable>
                        <input type="text" class="form-control" name="number" id="number" required="" value="<?php echo !empty($records["number"])  ? $records["number"] : "";?>">
                        <span class="error_form" id="number_error"></span>
                    </div>
                </div><br>              
                <?php
                $action=isset($_GET['action']) ? $_GET['action'] : '';
                    if(isset($_GET['action']) && !empty($_GET['action']))
                    { ?>
                       <input type="submit" value="Edit" name="data">
                   <?php }else{ ?>
                    <input type="submit" value="Register" name="regsiter">
                  <?php  }
                ?>
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
               
                //firstname validate
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
                //lastname validate
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
                //email validate
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
                //Number validate
                function check_number() {
                    var pattern = /^[0]?[789]\d{9}$/;
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
                                'action':'save'
                            },
                            success: function(response){
                                var obj = JSON.parse(response);
                                if(obj.status !=''){
                                    if(obj.status == 3){
                                        jQuery('#success_message').text(obj.msg);
                                        $("#fname").css("border","2px solid #7f7f7f");
                                        $("#lname").css("border","2px solid #7f7f7f");
                                        $("#email").css("border","2px solid #7f7f7f");
                                        $("#number").css("border","2px solid #7f7f7f");
                                        jQuery('#form_validation')[0].reset();
                                    }
                                    else if(obj.status == 4){
                                        jQuery('#form_validation')[0].reset();
                                        jQuery('#success_message').text(obj.msg);
                                        $("#fname").css("border","2px solid #7f7f7f");
                                        $("#lname").css("border","2px solid #7f7f7f");
                                        $("#email").css("border","2px solid #7f7f7f");
                                        $("#number").css("border","2px solid #7f7f7f");   
                                        setTimeout(function() {
                                            $('#success_message').fadeOut();
                                            window.location.href="show.php";
                                        }, 3000 );
                                    }
                                }
                            }
                        });
                    }
                    return false;
                });
                $("#form_edit").submit(function(event) {
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
                        var id='<?php echo !empty($_GET['id']) ? $_GET['id'] : ""; ?>';
                        $.ajax({
                            type: "POST",
                            url: 'http://localhost/Ajad/19-07-2022/ajax.php',
                            data: {
                                firstname: firstname,
                                lastname: lastname,
                                emailid: emailid,
                                contactnumber: contactnumber,
                                'action':'edit',
                                'id':id
                            },
                            success: function(response){
                                var obj = JSON.parse(response);
                                if(obj.status !=''){
                                    if(obj.status == 1){
                                        jQuery('#success_message').text(obj.msg);
                                        $("#fname").css("border","2px solid #7f7f7f");
                                        $("#lname").css("border","2px solid #7f7f7f");
                                        $("#email").css("border","2px solid #7f7f7f");
                                        $("#number").css("border","2px solid #7f7f7f");
                                        setTimeout(function() {
                                            $('#success_message').fadeOut();
                                            window.location.href="show.php";
                                        }, 3000 );
                                        jQuery('#form_edit')[0].reset();
                                    }
                                    else if(obj.status == 2){
                                        jQuery('#form_edit')[0].reset();
                                        jQuery('#success_message').text(obj.msg);
                                        $("#fname").css("border","2px solid #7f7f7f");
                                        $("#lname").css("border","2px solid #7f7f7f");
                                        $("#email").css("border","2px solid #7f7f7f");
                                        $("#number").css("border","2px solid #7f7f7f");
                                    }
                                }
                            }
                        });
                    }
                    return false;
                });
            });
        </script>
        <!-----------Script End----------->
    </body>
</html>
