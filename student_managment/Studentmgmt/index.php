<?php
    session_start();

    if(!isset($_SESSION['id'])) 
    {
        echo "you are logged out";
        header('location:login.php');
    }   

?>

<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <h2 id="indexhead">Welcome <?php echo $_SESSION['id']?> </h2>
    <br>
    <button ><a href="logout.php" style="text-decoration:none;">Logout</a></button>
    <hr>
    <form method="POST">
  <label>Filter by:</label>
  <select id="select" name="filter">
    <option value="All">All</option>
    <option value="class">Class</option>
    <option value="lab">Lab</option>
    <option value="library">Library</option>
  </select>
   <span>     </span>
  <span>Date:</span>
  <input type="date" id="date" name="date">
  <button name="submit">submit</button>
</form>
<br>
<br>
<h3>
<?php
if(isset($_POST['submit']))
{
echo $_POST['filter']."   ".$_POST['date'];
}
?>
</h3>

<table> 
          <tr>
       <th>Id</th>
       <th>Intime</th>
       <th>Outtime</th>
       <th>Remarks</th>
       </tr>
<?php
        $server="localhost";
        $user="root";
        $password="";
        $db="studentmanagment";
        $con=mysqli_connect($server,$user,$password,$db);
        
        if(isset($_POST['submit']))
        {
            $selectOption = $_POST['filter'];
            $date = $_POST['date'];
            $id = $_SESSION['id'];
            $i=0;
            if($selectOption === "class")
            {
                $data="select a.id,a.Intime,a.outtime,b.name,b.subject from class a,proffesorinfo b where a.id='$id' AND a.date='$date' AND a.profid=b.id";
                $result=mysqli_query($con,$data);
                if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {
         
                     echo '<tr><td>'.$row['id'].'</td>'.'<td>'.$row['Intime'].'</td><td>'.$row['outtime'].'</td><td>'.'Proffesor Name: '.$row['name'].'  , Subject: '.$row['subject'].'</td></tr>';
                    
                   
                 }
               } else {
                 echo "0 results";
               }
            }
            else if($selectOption === "library")
            {
                $data="select * from library where id='$id' AND date='$date'";
                $result=mysqli_query($con,$data);
                if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {
         
                    echo '<tr><td>'.$row['id'].'</td>'.'<td>'.$row['Intime'].'</td><td>'.$row['outtime'].'</td><td>'.'Library'.'</td></tr>';
                     
                   
                 }
               } else {
                 echo "0 results";
               }
            }
            else if($selectOption === "lab")
            {
                $data="select a.id,a.Intime,a.outtime,a.labname,b.name from computerlab a,proffesorinfo b where a.id='$id' AND a.date='$date' AND a.profid=b.id";
                $result=mysqli_query($con,$data);
                if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {
         
                    echo '<tr><td>'.$row['id'].'</td>'.'<td>'.$row['Intime'].'</td><td>'.$row['outtime'].'</td><td>'.'Lab Incharge: '.$row['name'].'  , Lab Name:'.$row['labname'].'</td></tr>';
                     
                   
                 }
               } else {
                 echo "0 results";
               }
            }
           else if($selectOption ==="All")
           {
            $data="select a.id,a.Intime,a.outtime,b.name,b.subject from class a,proffesorinfo b where a.id='$id' AND a.date='$date' AND a.profid=b.id";
            $result=mysqli_query($con,$data);
            if (mysqli_num_rows($result) > 0) {
             while($row = mysqli_fetch_assoc($result)) {
     
                echo '<tr><td>'.$row['id'].'</td>'.'<td>'.$row['Intime'].'</td><td>'.$row['outtime'].'</td><td>'.'Proffesor Name: '.$row['name'].'  , Subject: '.$row['subject'].'</td></tr>';
                
               
             }   
             }
           $data="select a.id,a.Intime,a.outtime,a.labname,b.name from computerlab a,proffesorinfo b where a.id='$id' AND a.date='$date' AND a.profid=b.id";
           $result=mysqli_query($con,$data);
           if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
    
                echo '<tr><td>'.$row['id'].'</td>'.'<td>'.$row['Intime'].'</td><td>'.$row['outtime'].'</td><td>'.'Lab Incharge: '.$row['name'].'  , Lab Name:'.$row['labname'].'</td></tr>';
                
              
            }
          } 
          $data="select * from library where id='$id' AND date='$date'";
          $result=mysqli_query($con,$data);
          $i=0;
          if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
   
               echo '<tr><td>'.$row['id'].'</td>'.'<td>'.$row['Intime'].'</td><td>'.$row['outtime'].'</td><td>'.'Library'.'</td></tr>';
               
             
           }
         } 

           }
       
       //$today= date("Y-m-d");      
   
    }

      ?>
 </table>
</body>
</html>