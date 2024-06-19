<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="images/favicon.png" type="image/x-icon">

</head>
<body>

<?php include 'components/user_header.php'; ?>

 <section class="container about sec" id="about">
   
   <div style="margin-top:1rem;" class="about_container con-about grid_about">
      <div class="about_image">
         <img  src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
      </div>
         
      <div class="about_data">
         <p style="font-size: 2.5rem; font-weight:bold;"> Hello! <span ><?= $fetch_profile['name']; ?></span> ,</p>
         <p class="about_description">  
            Hope you are doing well and making the most of your educational journey. Engage with the community by liking, commenting and sharing your thoughts on lessons and topics of interest. Never lose track of your progress - save bookmarks to revisit your favorite playlists easily.Thanks for being a part of our learning community and stay connected with fellow the experts."

         </p>
         <div class="about_info">
            <div class="about_box">
            <div class="about_flex">
               <i class="about_icon fas fa-heart"></i>
               <div>
                  <h3><?= $total_likes; ?></h3>
               </div>
            </div>
            <div class="about_count">liked tutorials</div>
            <a href="likes.php" class="btn1">View</a>
            </div>

            <div class="about_box">
               <div class="about_flex">
                  <i style="background:#f9ca24" class="about_icon fas fa-comment"></i>
                  <div>
                     <h3><?= $total_comments; ?></h3>
                  </div>
               </div>
               <div class="about_count">comments</div>
               <a href="comments.php" class="btn1">View</a>
            </div>

            <div class="about_box">
               <div class="about_flex">
                  <i style="background:#00b894" class="about_icon fas fa-bookmark"></i>
                  <div>
                     <h3><?= $total_bookmarked; ?></h3>
                  </div>
               </div>
               <div class="about_count">saved tutorials</div>
               <a href="bookmark.php" class="btn1">View</a>
            </div>
            <div class="about_box">
               <div class="about_flex">
               <i class="about_icon fa-solid fa-trophy" style="color: #ffffff; background: #00b300;"></i>
                  <div>
                     <h3>0</h3>
                  </div>
               </div>
               <div class="about_count">certificates</div>
               <a href="bookmark.php" class="btn1">View</a>
            </div>
         </div>
         
         
         <a style="background: #f75842" href="update.php" class=" btn2 inline-btn">update profile</a>
         
      </div>
   </div>   
 </section>


<!--<section class="profile">

   <h1>Profile Details</h1>

   <div class="details">

      <div class="user">
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <p>Student</p>
         <a href="update.php" class=" btn1 inline-btn">update profile</a>
      </div>

      <div class="box-container">


         <div class="box">
            <div class="flex">
               <i style= "background:#f3a683;" class="fas fa-heart"></i>
               <div>
                  <h3><?= $total_likes; ?></h3>
                  <span>liked tutorials</span>
               </div>
            </div>
            <a href="likes.php" class="btn1 inline-btn">view liked</a>
         </div>

         <div class="box">
            <div class="flex">
               <i style = "background: #f7c94b;" class="fas fa-comment"></i>
               <div>
                  <h3><?= $total_comments; ?></h3>
                  <span>video comments</span>
               </div>
            </div>
            <a href="comments.php" class="btn1 inline-btn">view comments</a>
         </div>
         
         <div class="box">
            <div class="flex">
               <i style="background:#55efc4" class="fas fa-bookmark"></i>
               <div>
                  <h3><?= $total_bookmarked; ?></h3>
                  <span>saved playlists</span>
               </div>
            </div>
            <a href="bookmark.php" class="btn1 inline-btn">view playlists</a>
         </div>

      </div>

   </div>

</section>

 profile section ends -->












<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>  

<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/app.js"></script>
   
</body>
</html>