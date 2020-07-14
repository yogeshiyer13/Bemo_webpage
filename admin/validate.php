<?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'admin' && 
                  $_POST['password'] == 'admin@yogesh') {
                   session_start();
                  $_SESSION['valid'] = true;
                  
                  echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='upload.php';
                    </script>");
               }
                 else {
                  echo ("<script LANGUAGE='JavaScript'>
		    alert('Wrong details.');
		    window.location.href='login.html';
		    </script>");
               }
            }
         ?>