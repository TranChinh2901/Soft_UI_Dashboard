<?php 
require('../config/function.php');
if(isset($_SESSION['auth'])) {
   logoutSession();
   redirect('../login.php', 'You have been logged out successfully');
} else {
    redirect('../login.php', 'You are not logged in');
}
?>