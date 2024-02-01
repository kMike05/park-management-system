<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
   
    $user_type=$_POST['user_type'];

    $select="SELECT * FROM user_form WHERE email='$email' && password='$password'";

    $result = mysqli_query($conn,$select);

   if(mysqli_num_rows($result)>0){

       $row=mysqli_fetch_array($result);
    if($row['user_type']=='admin'){

        $_SESSION['admin_name']=$row['name'];
        header('location:adminP.php');

    }elseif($row['user_type']=='user'){

        $_SESSION['user_name']=$row['name'];
        header('location:Home.php');
    

    }
   }else{
    $error[]='*Incorrect email or password!';
}
};
if(isset($_POST['submit'])){

    // Clear the textboxes by setting their values to an empty string
    $_POST['email']= '';
    $_POST['password'] = '';
   
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
        <script defer src="/style.js"></script>
        <title></title>
        <link rel="stylesheet" type="text/css" href="passstyle.css">
    </head>
  <body background="BACK11.jpg" >
    
       <div class="container">
		<div class="left"> </div>
		<div class="right">
			<div class="formBox">
			<form action="" method="post">
                <h4> LOGIN</h4>
            

			<p >Email</p>  
            <div class="email"><input type="text" name="email" placeholder="Email" id="email" required=""></div>
            <p>Password</p><div class="password">    
            <input type="password" placeholder="Password" name="password" id="password" required /></div>
			<input type="submit" name="submit" value="Login">

            <p class="description"><a href='forgetpassword.html'>Forgot Password?</a> &nbsp;<a href='Aregister.php'>Create Account</a></p>
            <?php
                            if(isset($error)){
                                foreach($error as $error){
                                    echo '<span class="error-msg" >'.$error.'</span>';
                                }
                            };
                            
                            ?>
        </div>
        
</form></div>
		</div>
</div>

</body></div>
</html>