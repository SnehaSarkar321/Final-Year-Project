<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['tutor_fetch'])){

   $tutor_email = $_POST['tutor_email'];
   $tutor_email = filter_var($tutor_email, FILTER_SANITIZE_STRING);
   $select_tutor = $conn->prepare('SELECT * FROM `tutors` WHERE email = ?');
   $select_tutor->execute([$tutor_email]);

   $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
   $tutor_id = $fetch_tutor['id'];

   $count_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
   $count_playlists->execute([$tutor_id]);
   $total_playlists = $count_playlists->rowCount();

   $count_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
   $count_contents->execute([$tutor_id]);
   $total_contents = $count_contents->rowCount();

   $count_likes = $conn->prepare("SELECT * FROM `likes` WHERE tutor_id = ?");
   $count_likes->execute([$tutor_id]);
   $total_likes = $count_likes->rowCount();

   $count_comments = $conn->prepare("SELECT * FROM `comments` WHERE tutor_id = ?");
   $count_comments->execute([$tutor_id]);
   $total_comments = $count_comments->rowCount();

}else{
   header('location:teachers.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tutor's profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/favicon.png" type="image/x-icon">
</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- teachers profile section starts  -->


<!-- teachers profile section ends -->
<section class="home">
   <div class="container">
      <div class=" home-info">
         <div class="left">
            <h3>Hello, I'm</h3>
            <h1><?= $fetch_tutor['name']; ?></h1>
            <h4>And I'm a <span class="multiple"><?= $fetch_tutor['profession']; ?></span></h4>
            <p>🚀As your dedicated teacher, we're excited to embark on this educational journey together. Get ready to dive into the fascinating realm of technology with Techtube. As your guides in this digital landscape, we're thrilled to inspire your curiosity and fuel your learning journey. Let's make every lesson a discovery and every challenge a triumph! 🚀🔍</p>
            <div class="about_info">
            <div class="about_box">
            <div class="about_flex">
               <i class="about_icon fas fa-heart"></i>
               <div>
                  <h3><?= $total_likes; ?></h3>
               </div>
            </div>
            <div class="about_count">likes recieved</div>
            </div>

            <div class="about_box">
               <div class="about_flex">
                  <i style="background:#f9ca24" class="about_icon fas fa-comment"></i>
                  <div>
                     <h3><?= $total_comments; ?></h3>
                  </div>
               </div>
               <div class="about_count">comments recieved</div>
            </div>

            <div class="about_box">
               <div class="about_flex">
                  <i style="background:#00b894" class="about_icon fas fa-bookmark"></i>
                  <div>
                     <h3><?= $total_playlists; ?></h3>
                  </div>
               </div>
               <div class="about_count">Created playlists</div>
            </div>
         </div>

         </div> 
         <div class="right">
               <div class="profile">
               <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
               </div>
         </div>
      </div>
   </div>
</section>


<section style="margin-top:-5rem;" class="courses">

   <h1 class="heading">Uploaded Playlists </h1>

   <div class="container  search-box-container">

      <?php
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ? AND status = ?");
         $select_courses->execute([$tutor_id, 'active']);
         if($select_courses->rowCount() > 0){
            while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
               $course_id = $fetch_course['id'];

               $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
               $select_tutor->execute([$fetch_course['tutor_id']]);
               $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);

               $count_videos = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ?");
               $count_videos->execute([$course_id]);
               $total_videos = $count_videos->rowCount();
      ?>
      <article class="course">
         <div class="tutor">
         <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            <div class="info">
               <h3><?= $fetch_tutor['name']; ?></h3>
               <span><?= $fetch_course['date']; ?></span>
            </div>
         </div>
         <div class="course_image">
            <img src="uploaded_files/<?= $fetch_course['thumb']; ?>" class="thumb" alt="">
            <span><?= $total_videos; ?> videos</span>
         </div>
         <div class="course_info">
            <h4 class="title"><?= $fetch_course['title']; ?></h4>
            <p class="description"><?= $fetch_course['description']; ?></p>
         <a  href="playlist.php?get_id=<?= $course_id; ?>"  class="inline-btn" style="background-color: #f75842;">view playlist</a>
         </div>
      </article>
      <?php
         }
      }else{
         echo '<p class="empty">no courses added yet!</p>';
      }
      ?>

   </div>

</section>












<?php include 'components/footer.php'; ?>    

<!-- custom js file link  -->
<script src="js/app.js"></script>
<script>
   document.querySelectorAll('.description').forEach(content => {
      if(content.innerHTML.length > 100) content.innerHTML = content.innerHTML.slice(0, 178);
   });
</script>  
</body>
</html>