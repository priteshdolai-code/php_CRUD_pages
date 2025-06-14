 <?php 

$host="localhost";
$username ="root";
$password ="";
$dbname ="students";

$conn = mysqli_connect($host,$username,$password,$dbname);
if (!$conn) {
    die("failed to connect".mysqli_connect_error());
    //not require for the current project (26-2-25)
}
else {
    echo "succesfuly connected ";
}

$sql="insert into studata (name,email,age) values('stu5','stu5@gmail.com',25)";
$res=mysqli_query($conn,$sql);
if ($res) {
    $res2 = mysqli_query($conn,"select * from studata");
    while ($row = mysqli_fetch_assoc($res2)) {
       echo $row['name']." ".$row['email']." ".$row['age']." <br> ";
    }
}
else{
    echo "error".mysqli_error($conn);
}
mysqli_close($conn);
?> 
