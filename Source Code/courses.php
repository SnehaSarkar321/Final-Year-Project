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
   <title>Courses</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="icon" href="images/favicon.png" type="image/x-icon">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- courses section starts  -->

<section style="margin-top: 10px" class="courses" id="courses">

   <h1 style="font-size: 3.4rem; text-align: center; padding-bottom: 30px;">Our Popular Courses</h1>

   <div class="container box-container">
   <article class="course">
         <div class="tutor">
            <img src="images/favicon.png" alt="">
            <div class="info">
               <h3>TechTube</h3>
               <span>21-10-2023</span>
            </div>
         </div>
         <div class="course_image">
            <img src="images/course16.jpg" alt="">
         </div>
         <div class="course_info">
            <h4> Frontend Development</h4>
         <p class="description">
         Frontend development focuses on creating the user interface and user experience of a website or application. It involves implementing designs using HTML, CSS, and JavaScript, making content visually appealing and interactive. Frontend developers work with frameworks/libraries like React, Angular, or Vue.js to build efficient and dynamic user interfaces. Responsiveness, cross-browser compatibility, and accessibility are crucial aspects. Frontend development is closely tied to user experience design, ensuring that the application is intuitive and easy to navigate. Collaboration with backend developers is essential for seamless integration between the user interface and the server-side logic.
         </p>
         <a href="demo5.php" class="main_btn inline-btn" >view demo</a>
         </div>
      </article>
      <article class="course">
         <div class="tutor">
            <img src="images/favicon.png" alt="">
            <div class="info">
               <h3>TechTube</h3>
               <span>21-10-2023</span>
            </div>
         </div>
         <div class="course_image">
            <img src="images/course17.jpg" alt="">
         </div>
         <div class="course_info">
            <h4> Backend Development</h4>
         <p class="description">
         Backend development involves creating and maintaining server-side logic, databases, and APIs to ensure the functionality of web applications. It includes server management, database design, and handling business logic to enable seamless communication between the frontend and databases. Common backend technologies include languages like Python, Java, Node.js, and frameworks such as Django or Flask for Python, Spring for Java, and Express for Node.js. Database management systems like MySQL, PostgreSQL, and MongoDB are commonly used. Security, scalability, and performance optimization are key considerations in backend development.
         </p>
         <a href="demo4.php" class="main_btn inline-btn" >Watch Demo</a>
         </div>
      </article>
      <article class="course">
         <div class="tutor">
            <img src="images/favicon.png" alt="">
            <div class="info">
               <h3>TechTube</h3>
               <span>21-10-2023</span>
            </div>
         </div>
         <div class="course_image">
            <img src="images/course20.jpg" alt="">
         </div>
         <div class="course_info">
            <h4> DevOps </h4>
         <p class="description">
         DevOps is a set of practices that aims to improve collaboration and communication between development (Dev) and operations (Ops) teams throughout the software development lifecycle. It involves the automation of processes, continuous integration, continuous delivery/deployment (CI/CD), and infrastructure as code (IaC). DevOps strives to enhance efficiency, shorten development cycles, and improve product quality. Popular tools in the DevOps ecosystem include Jenkins, Docker, Kubernetes, Ansible, and Git. The ultimate goal of DevOps is to create a culture of collaboration, where developers and operations teams work seamlessly together to deliver and maintain software more effectively.
         </p>
         <a href="demo6.php" class="main_btn inline-btn">Watch Demo</a>
         </div>
      </article>
      <article class="course">
         <div class="tutor">
            <img src="images/favicon.png" alt="">
            <div class="info">
               <h3>TechTube</h3>
               <span>21-10-2023</span>
            </div>
         </div>
         <div class="course_image">
            <img src="images/course6.jpg" alt="">
            
         </div>
         <div class="course_info">
            <h4> ANDROID DEVELOPMENT</h4>
         <p class="description">
         An Android development course equips participants with the essential skills to create mobile applications for the Android operating system, user interface design, and integration of device features. 
         </p>
         <a href="demo1.php" class="main_btn inline-btn" >Watch Demo</a>
         </div>
      </article>
      <article class="course">
         <div class="tutor">
            <img src="images/favicon.png" alt="">
            <div class="info">
               <h3>TechTube</h3>
               <span>07-11-23</span>
            </div>
         </div>
         <div class="course_image">
            <img src="images/blockchain.png" alt="">
   
         </div>
         <div class="course_info">
            <h4> BLOCKCHANING</h4>
         <p class="description">
         This course provides comprehensive knowledge on the principles, applications, and implementation of blockchain technology. Participants gain practical skills to navigate the evolving landscape of blockchain.
         </p>
         <a href="demo2.php" class="main_btn inline-btn" >Watch Demo</a>
         </div>
      </article>
      <article class="course">
         <div class="tutor">
            <img src="images/favicon.png" alt="">
            <div class="info">
               <h3>TechTube</h3>
               <span>21-10-2023</span>
            </div>
         </div>
         <div class="course_image">
            <img src="images/course9.jpg" alt="">
            
         </div>
         <div class="course_info">
            <h4> UI/UX Designing</h4>
         <p class="description">
         This course covers fundamental design principles, user research methodologies, prototyping tools, and interaction design.Students learn to create seamless user experiences by understanding user needs, wireframing & testing prototypes.
         </p>
         <a href="demo3.php" class="main_btn inline-btn" >Watch Demo</a>
         </div>
      </article>
      
      <!--<div class="box">
         <div class="tutor">
            <img src="images/pic-2.jpg" alt="">
            <div class="info">
               <h3>john deo</h3>
               <span>21-10-2022</span>
            </div>
         </div>
         <div class="thumb">
            <img src="images/thumb-1.png" alt="">
            <span>10 videos</span>
         </div>
         <h3 class="title">complete HTML tutorial</h3>
         <a href="playlist.html" class="inline-btn">view playlist</a>
      </div>
   -->

      

   </div>

</section>
<section style="margin-top: 10px" class="courses">

<h1 style="font-size: 3.4rem; text-align: center; padding-bottom: 30px;">Uploaded courses by our Experts</h1>

   <div class="container box-container ">

      <?php
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? ORDER BY date DESC");
         $select_courses->execute(['active']);
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
         <a  href="playlist.php?get_id=<?= $course_id; ?>"  class="main_btn inline-btn" >view playlist</a>
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

<!-- courses section ends -->










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