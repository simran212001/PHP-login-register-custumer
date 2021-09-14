

<?php 
//Start the session to see if the user is authencticated user. 
session_start(); 
//Check if the session variable for user authentication is set, if not redirect to login page. 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
//include the menu 
require('menu.php'); 
echo '<center><h1>Welcome to the Banking Enterprise</h1> 
<table border="1" width="560" cellpadding="5" cellspacing="1" bordercolor="black" style="border-right-width:1;"> 
<tr><td colspan="2" align="center"> - CUSTOMER - </td></tr> 
<tr><td><a href="view_customer.php">View All Customer Details</a> 
<br><a href="customer_stat.php">View Customer Information</a></td> 
<td><a href="register_customer.php">Register/Update Customer</a><td></tr> 
<tr><td colspan="2">&nbsp;</td></tr> 
<tr><td colspan="2" align="center"> - ACCOUNT - </td></tr> 
<tr><td><a href="view_account.php">View All Account Details</a> 
<td><a href="register_account.php">Register/Update Account</a><td></tr> 
<tr><td colspan="2">&nbsp;</td></tr> 
<tr><td colspan="2" align="center"> - LOAN - </td></tr> 
<tr><td><a href="view_loan.php">View All Loan Details</a> 
<td><a href="register_loan.php">Register/Update Loan</a><td></tr> 
<tr><td colspan="2">&nbsp;</td></tr> 
<tr><td colspan="2" align="center"> - BRANCH - </td></tr> 
<tr><td><a href="view_branch.php">View All Branch Details</a> 
<td><a href="register_branch.php">Register/Update Branch</a><td></tr> 
<tr><td colspan="2">&nbsp;</td></tr> 
 
</table> 
</center>'; 
exit(); 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
