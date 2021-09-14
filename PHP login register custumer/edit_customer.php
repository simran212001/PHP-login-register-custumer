<?php
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
// Code to be executed when 'Insert' is clicked. 
if ($_POST['submit'] == 'Insert'){
//validation flag to check that all validations are done 
$validationFlag = true; 
//Check all the required fields are filled 
if(!($_POST['customer_name']))
{ 
echo 'All the fields marked as * are compulsary.<br>'; 
$validationFlag = false; 
} 

else{ 
$customer_name = $_POST['customer_name']; 
$customer_city = $_POST['customer_city']; 
$customer_street = $_POST['customer_street']; 
}


//If all validations are correct, connect to MySQL and execute the query 
if($validationFlag){ 
//Connect to mysql server 
$link = mysql_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('1410109'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Create Insert query 
$query = "INSERT INTO customer (customer_name, customer_street, customer_city) VALUES ('$customer_name','$customer_city','$customer_street')"; 
//Execute query 
$results = mysql_query($query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysql_error() . '<br>'; 
else 
echo 'Data inserted successfully! '; 
} 
} 
 
// Code to be executed when 'Update' is clicked. 
if ($_POST['submit'] == 'Update'){ 
if(!$_POST['customer_name']) 
echo 'Enter the name of the customer as it is the primary key.'; 
else{ 
$validationFlag = true;

$customer_name = $_POST['customer_name']; 
$customer_city = $_POST['customer_city']; 
$customer_street = $_POST['customer_street']; 
 
//$update = "UPDATE customer SET customer_name = '$customer_name'"; 

if($_POST['customer_city']){ 
$update = "UPDATE customer SET customer_city = '$customer_city' WHERE customer_name = '$customer_name'"; 
} 
if($_POST['customer_street']){ 
$update = "UPDATE customer SET customer_street = '$customer_street' WHERE customer_name = '$customer_name'"; 
} 

//If all validations are correct, connect to MySQL and execute the query 
if($validationFlag){ 
//Connect to mysql server 
$link = mysql_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('1410109'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Execute query 
$results = mysql_query($update); 
if($results == FALSE) 
echo mysql_error() . '<br>'; 
else 
echo mysql_info(); 
} 
} 
} 
// Code to be executed when 'Delete' is clicked. 
if ($_POST['submit'] == 'Delete'){ 
if(!$_POST['customer_name']) 
echo 'Enter the name of the customer as it is the primary key.'; 
else{ 

$customer_name = $_POST['customer_name']; 
$customer_city = $_POST['customer_city']; 
$customer_street = $_POST['customer_street'];

$delete = "DELETE FROM customer WHERE customer_name = '$customer_name'"; 
//Connect to mysql server 
$link = mysql_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('1410109'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Execute query 
$results = mysql_query($delete); 
if($results == FALSE) 
echo mysql_error() . '<br>'; 
else 
echo 'Data deleted successfully'; 
} 
} 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
