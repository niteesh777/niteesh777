<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
<body>
    <h2 name="head">Create your Account</h2>
    <form id="sform" method="POST">
        <label>ID</label><br>
        <input type="text" name="ID"><br>
        
        <label>Name</label><br>
        <input type="text" name="Name"><br>
        
        <label>Password</label><br>
        <input type="text" name="Password"><br>
        
        <label>Year</label><br>
        <input type="text" name="Year">
        <br>
        <br>
        <button name="s">Create Account</button>
    </form>
    <?php
    $server="localhost";
    $user="root";
    $password="";
    $db="studentmanagment";
    $con=mysqli_connect($server,$user,$password,$db);
    if(isset($_POST['s']))
            {
                $id=mysqli_real_escape_string($con,$_POST['ID']);
                $name=mysqli_real_escape_string($con,$_POST['Name']);
                $password=mysqli_real_escape_string($con,$_POST['Password']);
                $year=mysqli_real_escape_string($con,$_POST['Year']);
                $insertquery="insert into studentinfo(id, name, password, year) VALUES ('$id','$name','$password','$year')";
                $iquery=mysqli_query($con,$insertquery);
                if($iquery)
                {
                            ?>
                                <script>
                                    alert("created successful");
                                </script>
                            <?php
                }else
                {
                            ?>
                                <script>
                                    alert("creation not successful");
                                </script>
                            <?php
                }
                        

             }
                  
    ?>
    <hr>
    <p>Have an account?<a href="login.php">Log In</a></p>
</body>
</html>
