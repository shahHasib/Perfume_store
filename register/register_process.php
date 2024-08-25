<?php 

include "../admin/config.php";

$categotry=$_POST["category"];
$username=$_POST['username'];
$phone=$_POST["phone"];
$email=$_POST["email"];
$password=$_POST["password"];

if($categotry === "user"){
 $sql=$conn->prepare("INSERT INTO users(username,phone,email,password) VALUES (?,?,?,?);");
 $sql->bind_param('siss',$username,$phone,$email,$password);

 if($sql->execute()===TRUE){
    header("Location:../homepage/home.html");
 }
 else{
    echo "Registeration unsuccessfull.";
 }
}

$conn->close();
?>