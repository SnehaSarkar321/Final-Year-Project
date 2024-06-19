<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   
   if($select_user->rowCount() > 0){
     setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
     header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}


?>








<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TechTube - All in one educational platform</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- favicon link  -->
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
<section class="form-container">
    <div class="welcome">
      <h1 >Hello, Again!</h1>
      <p>We're delighted to see you return. Reconnect with your personalized dashboard, track your progress, and resume your learning journey seamlessly. Login now and let's continue this inspiring journey together.
      </p>
      <img src="images/books.png" alt="">
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="login">
      <h3>User Login</h3>
      <div class="form-box">
         <input type="email" name="email" placeholder="Enter your email" maxlength="50" required class="box">
         <i class="uil uil-envelope"></i>
      </div>
      <div class="form-box">
         <input type="password" name="pass" placeholder=" Enter your password" maxlength="20" required class="box">
         <i class="uil uil-padlock"></i>
      </div>
      <label for=""><input type="checkbox">Remember password</label>
      <input type="submit" name="submit" value="Login now" class="btnn btn">
      <p class="link">don't have an account? <a href="register.php">Register now</a></p>
   </form>
   </section>
    <script src="js/app.js"></script>
  </body>
</html>
