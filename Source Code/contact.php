<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $name = $_POST['name']; 
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email']; 
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['lname']; 
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg']; 
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE name = ? AND email = ? AND lname = ? AND message = ?");
   $select_contact->execute([$name, $email, $number, $msg]);

   if($select_contact->rowCount() > 0){
      $message[] = 'message sent already!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `contact`(name, email, lname, message) VALUES(?,?,?,?)");
      $insert_message->execute([$name, $email, $number, $msg]);
      $message[] = 'message sent successfully!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- favicon link  -->
   <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>
<body>
<?php include 'components/user_header.php'; ?>

<section style="margin-top:30px" class="contact" id="contact">
   <div class="container contact_container">
      <aside class="contact_aside">
      <div class="aside_image">
         <img src="./images/contact.svg">
      </div>
      <h2>Contact Us</h2>
      <p>
      We value your opinion! Help us improve your experience on Techtube by sharing your feedback. . 
      </p>
      <ul class="contact_details">
       <li>
         <i class="uil uil-phone-times"></i>
         <h5>1234567890</h5>
      </li>
      <li>
         <i class="uil uil-envelope"></i>
         <h5>suppor@techtube.com</h5>
      </li>
      <li>
         <i class="uil uil-location-point"></i>
         <h5>AEC, Asansol</h5>
      </li>
      </ul>
   </aside>
   <form action="https://formspree.io/f/mjvqdkqg" class="contact_form" method="POST">
      <div class="form_name">
         <input type="text" name="name" placeholder="First Name" required>
         <input type="text" name="number" placeholder="Last Name" required>
      </div>
      <input type="email" name="email" placeholder="Your Email Address"required>
      <textarea name="msg" rows="7" placeholder="Type Your Message" required></textarea>
      <button type="submit" class="btn btn-primary" name="submit">Send Message</button>
   </form>
   </div>
</section>  

<?php include 'components/footer.php'; ?>  

<!-- custom js file link  -->
<script src="js/app.js"></script>
   
</body>
</html>