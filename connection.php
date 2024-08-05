
<?php
//---------------------To Make Database Connecction----------------------//
$hostname = "localhost";
$username = "root";
$password ="";
$dbname = "projects";

$conn = new mysqli($hostname,$username,$password,$dbname);
if($conn->connect_errno){
    die("Something wrong:" .$conn-> connect_errno);
}
//------------------------------------------------------------------------//

?>