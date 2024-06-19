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
      <video src="images/Backend.mp4" class="video" poster="" controls ></video>
      <h3 class="title"></h3>
      <div class="tutor">
         <img src="images/images.jpg" alt="">
         <div>
            <h3>TechTube</h3>
            <span>Backend Development</span>
            
         </div>
      </div>
      <div class="info">  
         <p><i style=" color: #1abc9c;" class="fas fa-calendar"></i><span>07-11-23</span></p> 
      </div>
      <div class="description"><p>Backend development involves creating and maintaining server-side logic, databases, and APIs to ensure the functionality of web applications. It includes server management, database design, and handling business logic to enable seamless communication between the frontend and databases. Common backend technologies include languages like Python, Java, Node.js, and frameworks such as Django or Flask for Python, Spring for Java, and Express for Node.js. Database management systems like MySQL, PostgreSQL, and MongoDB are commonly used. Security, scalability, and performance optimization are key considerations in backend development.</p></div>
      
 


      </div>

 



</section>

<!-- comments section ends -->








<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/app.js"></script>
   
</body>
</html>