<?php
$con = mysqli_connect('localhost','root');
if($con){
echo "Conneection Successfull.";
} else
{
echo "No connection.";
}
mysqli_select_db($con, 'islamix');
$user=$_POST['user'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$comment=$_POST['comment'];
$query = "insert into contacts_db (user, email, mobile, comment) values
('$user','$email', '$mobile','$comment')";
mysqli_query($con,$query);
header('location:index.php');
?>