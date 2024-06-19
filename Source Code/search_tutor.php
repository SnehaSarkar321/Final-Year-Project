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
   <title>courses</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section style=margin-top:4rem; class="team">
      <h2 class="heading">Meet Our Team</h2>
         <div class="container teachers">
            <form action="search_tutor.php" method="post" class="search-tutor">
               <input type="text" name="search_tutor" maxlength="100" placeholder="search tutor..." required>
               <button type="submit" name="search_tutor_btn" class="fas fa-search"></button>
            </form>
         </div>
      <div class="container team_container ">

      <?php
         if(isset($_POST['search_tutor']) or isset($_POST['search_tutor_btn'])){
            $search_tutor = $_POST['search_tutor'];
            $ip='images/no-content.svg';
            $select_tutors = $conn->prepare("SELECT * FROM `tutors` WHERE name LIKE '%{$search_tutor}%'");
            $select_tutors->execute();
            if($select_tutors->rowCount() > 0){
               while($fetch_tutor = $select_tutors->fetch(PDO::FETCH_ASSOC)){

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
      ?>
      <article class="team_member">
            <div class="team_member-image">
               <img src="uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
            </div>
            <div class="team_member-info">
               <h4><?= $fetch_tutor['name']; ?></h4>
               <p><?= $fetch_tutor['profession']; ?></p>
            </div>
            <div class="view-admin">
               <form action="tutor_profile.php" method="post">
               <input type="hidden" name="tutor_email" value="<?= $fetch_tutor['email']; ?>">
               <input type="submit" value="view profile" name="tutor_fetch" class="">
               </form>
            </div>
         </article>
  
      <?php
               }
         }      
           
         else{
            echo '
            <div class="div-empty1">
                  <img src=" '.$ip .'" alt="">
                  <p >Teacher not found!</p>
            </div>
            ';         
         }
      
   

}else{
      echo '
      <div class="div-empty1">
            <img src=" '.$ip .'" alt="">
            <p >Please search somthing else!</p>
      </div>
      ';
 
   }
      ?>

   </div>

</section>

<!-- teachers section ends -->










<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/app.js"></script>
   
</body>
</html>