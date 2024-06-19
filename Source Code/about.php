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
   <title>TechTube - All in one educational platform</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
   <!-- favicon link  -->
   <link rel="icon" href="images/favicon.png" type="image/x-icon">

</head>
<body>
<?php include 'components/user_header.php'; ?>

<section class="about_achievements" id="about">
   <div class="container about_achivements-container">
      <div class="about_achivements-left">
         <img src="images/about achievements.svg" alt="">
      </div>
      <div class="about_achievements-right">
         <h1>Achievements</h1>
         <p>Welcome to Techtube! We are passionate tech enthusiast dedicated to exploring the ever-evolving world of technology. With a solid foundation in [mention relevant education or background], I've had the privilege to delve into numerous projects and initiatives that have left a mark in the tech sphere. Some of my notable achievements include [mention specific projects, innovations, or contributions]. These experiences have not only honed my technical skills in [list technical skills] but have also nurtured a deep-seated commitment to innovation and problem-solving. Beyond the code and circuits, I believe in the transformative power of technology to shape our future. Techtube is my platform to share insights, tutorials, and reviews that aim to inspire and empower fellow tech enthusiasts. Join me on this journey, and let's embark on a tech-filled adventure together</p>
         <div class="acheiments_cards">
            <article class="acheiment_cards">
               <span class="acheiments_icon">
                  <i class="uil uil-notebooks"></i>
               </span>
               <h3>100+</h3>
               <p>Courses</p>
            </article>
            <article class="acheiment_cards">
               <span class="acheiments_icon">
                  <i class="uil uil-book-reader"></i>
               </span>
               <h3>3k+</h3>
               <p>Students</p>
            </article>
            <article class="acheiment_cards">
               <span class="acheiments_icon">
                  <i class="uil uil-award"></i>
               </span>
               <h3>450+</h3>
               <p>Awards</p>
            </article>
            
         </div>
      </div>
      </div>
   </div>
</section>





<section class="faqs">
   <h2>Frequently Asked Question</h2>
   <div class="container faqs_container">
      <article class="faq">
         <div class="faq_icon"><i class="uil uil-plus"></i></div>
         <div class="question_answer">
            <h4>How do I make a purchase on your website?</h4>
            <p>All the courses are free so there is no need to purchase it only you have to add and learn.</p>
         </div>
      </article>
      <article class="faq">
         <div class="faq_icon"><i class="uil uil-plus"></i></div>
         <div class="question_answer">
            <h4>Can I access the content on multiple devices?</h4>
            <p>Yes! the content will be accessable on multiple devices at the same time.</p>
         </div>
      </article>
      <article class="faq">
         <div class="faq_icon"><i class="uil uil-plus"></i></div>
         <div class="question_answer">
            <h4> Do you offer a mobile app for offline access?</h4>
            <p>Currently we don't.</p>
         </div>
      </article>
      <article class="faq">
         <div class="faq_icon"><i class="uil uil-plus"></i></div>
         <div class="question_answer">
            <h4>How often is the content updated?</h4>
            <p>The contents are updated after every 2-3 months.</p>
         </div>
      </article>
      <article class="faq">
         <div class="faq_icon"><i class="uil uil-plus"></i></div>
         <div class="question_answer">
            <h4>Can I download videos or course materials for offline use?</h4>
            <p>Yes you can download the videos or course materials for offline use but it will only last for 6 months, after that if you want then you can re-download it.</p>
         </div>
      </article>
      <article class="faq">
         <div class="faq_icon"><i class="uil uil-plus"></i></div>
         <div class="question_answer">
            <h4>Are there any system requirement for using your website?</h4>
            <p>There is no such specific system requirement for using our website but yes you shouldn't uses the devices having old version.</p>
         </div>
      </article>
      <article class="faq">
         <div class="faq_icon"><i class="uil uil-plus"></i></div>
         <div class="question_answer">
            <h4>Is there any payment gateway in your website?</h4>
            <p>No there is no payment gateway in our website you have to just signin and learn.</p>
         </div>
      </article>
      <article class="faq">
         <div class="faq_icon"><i class="uil uil-plus"></i></div>
         <div class="question_answer">
            <h4>How can i provide feedback with the website?</h4>
            <p> There is section where you can give your feedback by just filling up the details and if your feedback follows all the community guidelines then your feedback will be displayed on our website also you can report the issues of the website in the report section.</p>
         </div>
      </article>

   </div>
</section>

<section class="container testimonials_container mySwiper">
   <h2>
      Students' Testimonials
   </h2>
   <div class=" test swiper-wrapper">
      <article class="testimonial swiper-slide">
         <div class="avatar">
            <img src="images/BeautyPlus_20230911191628649_save.jpg" >
         </div>
         <div class="testimonial_info">
            <h5> Kunal Kesh</h5>
            <small>Student</small>
         </div>
         <div class="testimonial_body">
            <p>
            I love your e-learning website! The user-freindly interface makes it so easy to navigate and the content is top-notch. It's been game changer for my learning journey
            </p>
         </div>
      </article>
      <article class="testimonial swiper-slide">
         <div class="avatar">
            <img src="images/IMG_20230911_173619.jpg" alt="">
         </div>
         <div class="testimonial_info">
            <h5>Sneha Sarkar</h5>
            <small>Student</small>
         </div>
         <div class="testimonial_body">
            <p>
            I have tried several e-learning platforms but Tech-tube stands out. The user freindly interface, diverse course offerings and excellent support make it my go-to-choice
            </p>
         </div>
      </article>
      <article class="testimonial swiper-slide">
         <div class="avatar">
            <img src="images/Romz.jpg" alt="">
         </div>
         <div class="testimonial_info">
            <h5>Roumodip Das</h5>
            <small>Student</small>
         </div>
         <div class="testimonial_body">
            <p>
            I appreciate how Tech-tube keeps adding new courses and updates existing ones to stay relevant. It shows their commitment to providing the best learning experience
            </p>
         </div>
      </article>
 
      <article class="testimonial swiper-slide">
         <div class="avatar">
            <img src="images/WhatsApp Image 2023-11-13 at 23.40.03_d5c86c0a.jpg" alt="">
         </div>
         <div class="testimonial_info">
            <h5>Abhishek Choudhary</h5>
            <small>Student</small>
         </div>
         <div class="testimonial_body">
            <p>
            Consider adding more advanced search filters to help users find courses that match their specific needs and skill levels, it will also make the website more user friendly and structured.

            </p>
         </div>
      </article>

      
   </div>
   <div class="swiper-pagination"></div>
</section>


<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->
<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,      
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
      },
      breakpoints: {
         600: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      }
    });
  </script>
</body>
</html>