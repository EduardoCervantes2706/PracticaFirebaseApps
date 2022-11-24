<?php
include("config.php");
include("firebaseRDB.php");

$email = $_POST['email'];
$password = $_POST['password'];
$edad = $_POST['edad'];


if($email == ""){
   echo "Email is required";
}else if($password == " "){
   echo " Password is required ";
}else if($edad == ""){
  echo "edad is ";
 }else{ 
   $rdb = new firebaseRDB($databaseURL);
   $retrieve = $rdb->retrieve("/user","email","EQUAL",$email);
   $data = json_decode($retrieve,1);

  if(isset($data['email'])){
   echo " Email already used ";
}else{
   $insert = $rdb->insert("/user",[
      "name" => $name,
      "email" => $email,
      "password" => $password,
      "edad" => $edad
   ]);
   $result = json_decode($insert, 1);
   if(isset($result['name'])){
     echo " Signup success , please login " ;
   }else{
       echo " Signup failed " ;
	}
   }
}