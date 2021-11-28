<?php
    session_start(); 


?>

<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
<body>
    <h2 name="head">Login</h2>
    <form id="lform" method="POST">
        <label>ID</label><br>
        <input type="text" name="ID"><br>        
        <label>Password</label><br>
        <input type="text" name="Password"><br>
        <br>
        <br>
        <button name="submit">Login</button>
    </form>
    <?php
    $server="localhost";
    $user="root";
    $password="";
    $db="studentmanagment";
    $con=mysqli_connect($server,$user,$password,$db);
    if(isset($_POST['submit']))
    {
        $ID=$_POST['ID'];
        $password=$_POST['Password'];

        $ids="select password from studentinfo where id='$ID'";
        $query=mysqli_query($con,$ids);

        $idcount=mysqli_num_rows($query);

        if($idcount)
        {
            $idpass=mysqli_fetch_assoc($query);
            $db_pass=$idpass['password'];
            $_SESSION['id']=$ID;
            echo $password."<br>";
            
            echo $db_pass."<br>";
            
            if($password===$db_pass)
            {
                echo 'login successful';
                ?>
                    <script>
                        location.replace("index.php");
                    </script>

                <?php
            }else{
                echo 'password incorrect';
            }

        }
        else{
            echo "invalid id";
        }
    }
                  
    ?>
    <hr>
    <p>Don't Have an account?<a href="signup.php">Sign Up</a></p>
</body>
</html>