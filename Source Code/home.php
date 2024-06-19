<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
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
<?php include 'components/user_header.php'; ?>
<header id="header">
   <div class="container header_container">
      <div class="header_left"> 
         <h1 style="font-size: 3.4rem ; line-height: 4rem; padding-bottom: 20px;">Grow your skills to advance your career path</h1>
         <p style="font-size: 1.4rem;">Welcome to our educational website! Discover a world of knowledge with our wide range of interactive courses, informative articles, and engaging videos. Whether you're a student, educator, or lifelong learner, our platform is designed to empower you on your educational journey. Explore topics, enhance your skills, and expand your horizons with our user-friendly and comprehensive resources.</p> 
      <a href="login.php" class="main_btn btn-primary">Get Started</a>
      </div>
      <div class="header_right">
         <div class="header_right-image">
            <img src="images/header.svg">
         </div>
      </div>
   </div>
</header>   
<section class="categories">
   <div class="container categories_container">
      <div class="categories_left">
         <h1 style="font-size: 3.4rem">Categories</h1>
         <p style="font-size: 1.4rem">Dive into the world of technologies with our curated courses in HTML, CSS, PHP, JavaScript, React, and more. Whether you're a beginner or looking to level up your skills, our platform offers in-depth tutorials and hands-on projects led by industry experts. Master the languages that power the digital world and create stunning, interactive websites and applications. Join us on this coding journey and turn your ideas into reality!

         </p>
         <a href="about.php" class="main_btn1 ">Learn more</a>
      </div>
      <div class="categories_right">
         <article class="category">
            <span class="category_icon"><img src="images/html.png" alt=""></span>
            <h5>HTML</h5>
            <p>Learning HTML is paramount for anyone aspiring to build websites,allowing you to create, structure, and design engaging web content. </p>
         </article>
         <article class="category">
            <span class="category_icon"><img src="images/css-3.png"></span>
            <h5>CSS</h5>
            <p>CSS is crucial for creating visually appealing appearance, responsiveness ensures an exceptional user experience.</p>
         </article>
         <article class="category">
            <span class="category_icon"><img src="images/js.png"></span>
            <h5>JavaScript</h5>
            <p>JavaScript can create everything from games to complex applications, makes it an indispensable skill for modern developers.</p>
         </article>
         <article class="category">
            <span class="category_icon"><img src="images/pypng.png"></span>
            <h5>Python</h5>
            <p>Python is crucial for its simplicity, and wide application in web development, data analysis, AI, enhances career opportunities and many more.</p>
         </article>
         <article class="category">
            <span class="category_icon"><img class="category_php" src="images/physics.png"></span>
            <h5>ReactJs</h5>
            <p>React is a component-based architecture and a cornerstone of building fast, scalable, and maintainable web applications</p>
         </article>
         <article class="category">
            <span class="category_icon"><img src="images/sqlpng.png"></span>
            <h5>SQL</h5>
            <p>It empowers you to query, retrieve, and manipulate data in databases as it forms the backbone of data-driven decision-making.</p>
         </article>
      </div>
   </div>
</section>





<section class="courses" >

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
         <a href="demo5.php" class="main_btn inline-btn" >Watch Demo</a>
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

   <div class="more-btn">
      <a href="courses.php" class=" inline-option-btn" style="background-color: seagreen;">view all courses</a>
   </div>

</section>


<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->
<script src="js/app.js"></script>
<script>
   document.querySelectorAll('.description').forEach(content => {
      if(content.innerHTML.length > 100) content.innerHTML = content.innerHTML.slice(0, 179);
   });
</script>
</body>
</html>