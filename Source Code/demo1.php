<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>watch video</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
   <link rel="icon" href="images/favicon.png" type="image/x-icon">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<!-- watch video section starts  -->

<section style="margin: 1rem 0 0 0;" class=" watch-video">

   <div style="margin-bottom:40px;" class="video-details">
      <video src="images/Android Developement.mp4" class="video" poster="" controls ></video>
      <h3 class="title"></h3>
      <div class="tutor">
         <img src="images/images.jpg" alt="">
         <div>
            <h3>TechTube</h3>
            <span>Android Developer</span>
            
         </div>
      </div>
      <div class="info">  
         <p><i style=" color: #1abc9c;" class="fas fa-calendar"></i><span>07-11-23</span></p> 
      </div>
      <div  class="description"><p>Content description: An Android development course equips participants with the essential skills to create mobile applications for the Android operating system, user interface design, and integration of device features.</p></div>
   </div>

 



</section>

<!-- comments section ends -->








<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/app.js"></script>
   
</body>
</html>