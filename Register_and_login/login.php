<html>
    <head>
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    </head>
    <body>
        <center><h2>Login Form</h2></center>
        <fieldset style="width: 50%;">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>User Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Please enter your Register email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Please enter your password">
        </div>
        <input type="submit" name="login" class="btn btn-primary" >
        </form>
        <!-------------php-------->
        <?php 
        if(isset($_POST['login'])){
           
            include_once("config.php");
            $username = $_POST['email'];
        
            $password = md5($_POST['password']);
            $query = "SELECT id,name,email,number,address,password FROM `user_details` where email='$username' AND Password='$password'";   
        $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    session_start();
                    $_SESSION["name"] = $row["name"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["number"] = $row["number"];
                    $_SESSION["address"] = $row["address"];
                    $_SESSION["password"] = $row["password"];
                    $_SESSION["id"] = $row["id"];


                    header("Location:user_dash_bord.php");
                }
            }else{
                echo '<div class="alert alert-danger">User name and password are not match</div>';
            }
        }
        ?>
        <!-------------php-------->
        </fieldset>
    </body>
</html>

