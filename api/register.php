<?php

   include("connect.php");
   
   $name = $_POST['name'];
   $number = $_POST['number'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $address = $_POST['address'];
   $image = $_FILES['name']['photo'];
   $tmp_name = $_FILES['tmp_name']['photo'];
   $role = $_POST['role'];
   
   if($password==$cpassword){
      move_uploaded_file($tmp_name, "../uploads/$image");
      $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, address, password, photo, role, status, votes) VALUES ('$name', '$mobile', '$password', '$address', '$image', '$role', 0, 0)");
      if ($insert) {
         echo '
       <script>
         alert("Registration Successful");
        window.location = "../";
      </script>
      ';
      }
      else{
         echo '
       <script>
         alert("Some Error Ocurred");
        window.location = "../register.html";
      </script>
      ';
      }
   }
   else{
       echo '
       <script>
	      alert("password and confirmed password does not match");
		  window.location = "../register.html";
		</script>
      ';
   }

?>