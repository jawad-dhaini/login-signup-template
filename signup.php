<?php
    session_start();

    if($_SESSION["user-type"] === "administrator")
    {
        header("location:adminhome.php");
    }
    if($_SESSION["user-type"] === "user")
    {
        header("location:userhome.php");
    }

    $data = mysqli_connect("localhost","root","","users");
    if ($data === false) {
        die("Couldn't connect to database");
    }

    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        $user=$_POST["username"];
        $pass=md5($_POST["password"]);
        $email=$_POST["email"];

        $sql="select * from users where username='".$user."'";
        $result=mysqli_query($data,$sql);
        $num = mysqli_num_rows($result); 
        if ($num != 0) {
            echo "username or email already exist";
        } else {
            $sql = "INSERT INTO users VALUES ('$user','$email','$pass', 'user')";
            mysqli_query($data, $sql);
            header('location:login.php');
        } 
    }
?>


<html>
    <head>
        <title>Sign Up</title>
    </head>
    
    <body>
        <section style="display: flex; flex-direction: column; align-items: center">
            <h1>Signup Form</h1>
            <br><br><br><br>
            <div style="background-color: grey; width: 500px;">
                <br><br>

                <form action="#" method="POST" style="text-align: center">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" required>
                    </div>
                    <br><br>

                    <div>
                        <label>Email Address</label>
                        <input type="text" name="email" required>
                    </div>
                    <br><br>

                    <div>
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div>
                    <br><br>

                    <div>
                        <input type="submit" value="Create account">
                    </div>
                </form>
                <br><br>
            </div>
        </section>
        <p style="text-align: center">Already have an account? <a href="login.php">Login to your account!</a></p>
    </body>
</html>
