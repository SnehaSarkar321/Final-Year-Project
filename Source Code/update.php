<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
   $select_user->execute([$user_id]);
   $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

   $prev_pass = $fetch_user['password'];
   $prev_image = $fetch_user['image'];

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

  if(!empty($name)){
   $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
   $update_name->execute([$name, $user_id]);
   $message[] = 'username updated successfully!';
  }

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   if(!empty($email)){
      $select_email = $conn->prepare("SELECT email FROM `users` WHERE email = ?");
      $select_email->execute([$email]);
      if($select_email->rowCount() > 0){
         $message[] = 'email is same!';
      }else{
         $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
         $update_email->execute([$email, $user_id]);
         $message[] = 'email updated successfully!';
      }
   }

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_files/'.$rename;

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'image size too large!';
      }else{
         $update_image = $conn->prepare("UPDATE `users` SET `image` = ? WHERE id = ?");
         $update_image->execute([$rename, $user_id]);
         move_uploaded_file($image_tmp_name, $image_folder);
         if($prev_image != '' AND $prev_image != $rename){
            unlink('uploaded_files/'.$prev_image);
         }
         $message[] = 'image updated successfully!';
      }
   }

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   if($old_pass != $empty_pass){
      if($old_pass != $prev_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         if($new_pass != $empty_pass){
            $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_pass->execute([$cpass, $user_id]);
            $message[] = 'password updated successfully!';
         }else{
            $message[] = 'Password remained same as before!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/favicon.png" type="image/x-icon">
</head>
<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<nav class="nav">

   <section class="flex">

   <div class="main_logo">
         <i class="uil uil-airplay"></i>
         <a href="home.php" class="logo">TechTube</a>
      </div>

      <form action="search_course.php" method="post" class="search-form">
         <input type="text" name="search_course" placeholder="search courses..." required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_course_btn"></button>
      </form>
      <div class="navmenu">
         <a class="nav__link active-link" href="home.php"></i><span>Home</span></a>
      <a class="nav__link" href="about.php"></i><span>About</span></a>
      <a class="nav__link" href="courses.php"></i><span>Courses</span></a>
      <a class="nav__link" href="teachers.php"></i><span>Teachers</span></a>
      <a class="nav__link" href="contact.php"></i><span>Contact us</span></a>
      </div>

      <div class="icons">
         
         <div style="display: none;" id="search-btn" class="fas fa-search"></div>
         <div style="display: none;" id="user-btn" class="fas fa-user"></div>

  
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="close-btn" class="fas fa-times"></div>
         <div id="toggle-btn"class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img class="image" src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3 class="prof"><?= $fetch_profile['name']; ?></h3>
         <span class="student">Student</span>
         <a href="profile.php" class="btn" style =" background-color: #16a085">View profile</a>
         <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">Logout</a>
         <?php
            }else{
         ?>
         <h3>Please login or register</h3>
          <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>
</nav>

<section class="form-container" style="min-height: calc(100vh - 19rem);">
   <div class="welcome">
      <h1 >Let's stay Updated!</h1>
      <p>Keep your information current and relevant. Customize your profile to reflect your unique identity.
      </p>
      <img src="images/books.png" alt="">
    </div>
   <form action="" method="post" enctype="multipart/form-data">
      <h3 >update profile</h3>
      <div class="flex">
        
         <div class="form-box"> 
            <input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>" maxlength="100" class="box">
            <i class="uil uil-user"></i>
         </div>

         <div class="form-box">   
            <input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>" maxlength="100" class="box">
            <i class="uil uil-envelope"></i>
         </div>
            
         <div class="form-box"> 
         <input type="file" name="image" accept="image/*" class="box">
         <i class="uil uil-images"></i>
          </div>
         
          <div class="form-box"> 
               <input type="password" name="old_pass" placeholder="enter your old password" maxlength="50" class="box">
               <i class="uil uil-padlock"></i>
         </div>

         <div class="form-box">  
               <input type="password" name="new_pass" placeholder="enter your new password" maxlength="50" class="box">
               <i class="uil uil-padlock"></i>
         </div>

         <div class="form-box">
               <input type="password" name="cpass" placeholder="confirm your new password" maxlength="50" class="box">
               <i class="uil uil-padlock"></i>
         </div>
         
      </div>
      <input type="submit" name="submit" value="update profile" class="btnn btn">
   </form>

</section>

<!-- update profile section ends -->



<!-- custom js file link  -->
<script src="js/app.js"></script>
   
</body>
</html>