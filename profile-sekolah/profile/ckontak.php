<?php 	 
error_reporting(0);

if(isset($_GET['aksi'])){ 
    $status=$_GET['yaksi'];

    if($status=='1'){  
        include "./kontak.php";    
    }
    if($status=='2'){  
        if (isset($_POST['submit'])){   
            $name=$_POST['name']; 
            $email=$_POST['email'];   
            $message=$_POST['message'];  

            $result = $function_all->input_data_contact($name, $email,$message); 
            if ($result) {
                echo '<div class="alert alert-success">Thank you for contacting us!</div>';
            } else {
                echo '<div class="alert alert-danger">We are sorry, the submit is failed</div>';
            } 
            echo '<meta http-equiv="refresh" content="1;url=?aksi=contact&yaksi=1">';
        }
    } 
}
?>