<?php
@include 'config.php';
if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['pass']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['Cpass']);
    $user_type=$_POST['user_type'];
    $select="SELECT * FROM user_form WHERE email='$email' && password='$password'";
    $result = mysqli_query($conn,$select);
    if(mysqli_num_rows($result)>0){
        $error[]='user already exist!';
    }else{
        if($password != $cpassword){
            $error[]='password not matched!';
        }else{
            $insert="INSERT INTO user_form (name,email,password,user_type) VALUES('$name','$email','$password','$user_type')";
            mysqli_query($conn,$insert);
            header('location:Alogin.php');
        }
    }


};

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>LOGIN</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="passstyle.css">
<script defer src="/style.js"></script>
</head>
<body background="bg1.jpg">
                <div class="containers">
                    
                    <div class="left"> </div>
                    <div class="right">
                        <div class="formBoxs">
                        <form action="" method="post">
                            <h4>REGISTER</h4>
                            <p>Full Names</p>
                            <input type="text" placeholder="Full Names" name="name">
                        <p>Email</p>
                        <input type="text" name="email" placeholder="Email">
                        <p>Password</p>
                        <input type="password" placeholder="Password" name="pass">
                        <p>Confirm Password</p>
                        <input type="password" placeholder="Confirm Password" name="Cpass" required />
                        <p>user_type</p>
                        <select name="user_type" placeholder="user_type">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                        <input type="submit" name="submit" value="Register">
                <p> existing user?<a id="a"href="Alogin.php"><i> click here</i> </a>to login</a></p>
                <?php
                            if(isset($error)){
                                foreach($error as $error){
                                    echo '<span class="error-msg" >'.$error.'</span>';
                                }
                            };
                            
                            ?>
		</div>
	   </form>
	</div></div>
</body>
</html>