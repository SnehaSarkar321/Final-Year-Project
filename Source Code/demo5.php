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
   <title>Watch Demo</title>

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

<section style="margin: 3rem 0 0 0; padding-bottom:5rem;" class=" watch-video">

   <div class="video-details">
      <video src="images/FrontEnd.mp4" class="video" poster="" controls ></video>
      <h3 class="title"></h3>
      <div class="tutor">
         <img src="images/images.jpg" alt="">
         <div>
            <h3>TechTube</h3>
            <span>Frontend Development</span>
            
         </div>
      </div>
      <div class="info">  
         <p><i style=" color: #1abc9c;" class="fas fa-calendar"></i><span>07-11-23</span></p> 
      </div>
      <div class="description"><p>Content Description:   Frontend development focuses on creating the user interface and user experience of a website or application. It involves implementing designs using HTML, CSS, and JavaScript, making content visually appealing and interactive. Frontend developers work with frameworks/libraries like React, Angular, or Vue.js to build efficient and dynamic user interfaces. Responsiveness, cross-browser compatibility, and accessibility are crucial aspects. Frontend development is closely tied to user experience design, ensuring that the application is intuitive and easy to navigate. Collaboration with backend developers is essential for seamless integration between the user interface and the server-side logic.</p></div>
      
 


      </div>

 



</section>

<!-- comments section ends -->








<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/app.js"></script>
   
</body>
</html>