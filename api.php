<?php
require_once("classess/autoload.php");

$DB = new Database();

$DATA_RAW = file_get_contents("php://input");//we use php://input insteads of Get & POST because for get & post the data should be formatted.
$DATA_OBJ= json_decode($data);
/*Here true convert object into an array

json_decode(json) = JSON.parse()
json_encode(value) = JSON.strgify()

$myobject = (array)$myobject; //Object converted into an array. This can done without writing true
$myobject = (object)$myobject; //array converted into an object. This can done without writing true


echo $myobject->gender;
die;

echo "<pre>";
print_r($myobject);
"</pre>";*/

// Process The Data
if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "signup")
{
     //SignUp
     $data = false;
     $data['userid'] = $DB-generate_id();
     $data['username'] = $DATA_OBJ->username;
     $data['email'] = $DATA_OBJ->email;
     $data['password'] = $DATA_OBJ->password;
     $data['date'] = date("Y-m-d H:i:s");
     $query = "insert into users (userid, username, email, password, date) values (:userid,:username, :email, :password, :date)";
     $DB->write($query); 
}