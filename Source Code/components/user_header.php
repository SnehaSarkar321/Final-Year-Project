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
         
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>

  
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="close-btn" class="fas fa-times"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
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
         <h3 class="student" >Please login or register</h3>
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
