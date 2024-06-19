<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>bookmarks</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/favicon.png" type="image/x-icon">
   

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section style="margin-top: 0" class="courses">

   <h1 class="heading">bookmarked playlists</h1>

   <div class="container search-box-container">

      <?php
         $select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
         $select_bookmark->execute([$user_id]);
         $ip='images/no-content.svg';
         if($select_bookmark->rowCount() > 0){
            while($fetch_bookmark = $select_bookmark->fetch(PDO::FETCH_ASSOC)){
               $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE id = ? AND status = ? ORDER BY date DESC");
               $select_courses->execute([$fetch_bookmark['playlist_id'], 'active']);
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
              ;
               echo '<p class="empty">no courses found!</p>';
            }
         }
      }else{
         echo '
      <div class="div-empty">
            <img style="height:150px; width: 150px;" src=" '.$ip .'" alt="">
            <p >nothing added to bookmarks yet!</p>
      </div>
      ';
      }
      ?>

   </div>

</section>










<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/app.js"></script>
<script>
   document.querySelectorAll('.description').forEach(content => {
      if(content.innerHTML.length > 100) content.innerHTML = content.innerHTML.slice(0, 179);
   });
</script>
</body>
</html>