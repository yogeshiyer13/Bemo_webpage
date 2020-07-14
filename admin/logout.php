<?php
   session_start();
unset($_SESSION['valid']);
   session_destroy();
   
   echo 'Please wail......';
   header('Refresh: 1; URL = ../index.html');
?>