<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $id = unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_files/'.$rename;

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email]);
   
   if($select_user->rowCount() > 0){
      $message[] = 'email already taken!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm passowrd not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, password, image) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $email, $cpass, $rename]);
         move_uploaded_file($image_tmp_name, $image_folder);
         
         $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
         $verify_user->execute([$email, $pass]);
         $row = $verify_user->fetch(PDO::FETCH_ASSOC);
         
         if($verify_user->rowCount() > 0){
            setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
            header('location:home.php');
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
   <title>Register Now - Welcome to TechTube</title>

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

<section  class="form-container">
   <div class="welcome">
      <h1 >Welcome to TechTube!</h1>
      <p>Join our community by creating your account today. Gain access to a world of educational resources, interactive courses, and expert guidance. Let us be your partner on your journey towards academic excellence. Sign up now and embark on a path to limitless learning and growth.
      </p>
      <img src="images/books.png" alt="">
    </div>
   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>create account</h3>
      <div class="flex">
         
            <div class="form-box">
               <input type="text" name="name" placeholder="Enter your name" maxlength="50" required class="box">
               <i class="uil uil-user"></i>
            </div>

            <div class="form-box">   
               <input type="email" name="email" placeholder="Enter your email" maxlength="50" required class="box">
               <i class="uil uil-envelope"></i>
            </div>

            <div class="form-box"> 
               <input type="password" name="pass" placeholder="Enter your password" maxlength="20" required class="box">
               <i class="uil uil-padlock"></i>
            </div>

            <div class="form-box"> 
               <input type="password" name="cpass" placeholder="Confirm your password" maxlength="20" required class="box">
               <i class="uil uil-lock-open-alt"></i>
            </div>
            
            <div class="form-box"> 
               <input type="file" id="img" name="image" accept="image/*" required class="box" >
               <i class="uil uil-images"></i>
            </div>
      </div>
     
      
      <p class="link">already have an account? <a href="login.php">Login now</a></p>
      <input type="submit" name="submit" value="Register now" class=" btnn btn">
   </form>

</section>














<!-- custom js file link  -->
<script src="js/app.js"></script>
   
</body>
</html>