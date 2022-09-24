<?php
   include 'partials/header.php';

   // fetch posts if id is set 
   if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
  }
  else{
    header('location :' . ROOT_URL . 'blog.php');
    die();
  }
 ?>

  <section class="signlepost">
    <div class="container signlepost__container">
      <h2><?= $post['title'] ?></h2>
      <div class="post__author">
          
          <?php
            // fetch author from users table using author_id
            $author_id = $post['author_id'];
            $author_query = "SELECT * FROM users WHERE id=$author_id";
            $author_result = mysqli_query($connection, $author_query);
            $author = mysqli_fetch_assoc($author_result);
          ?>

            <div class="post__author-avatar">
              <img src="./images/<?= $author['avatar'] ?>" alt="">
            </div>
            <div class="post__author-info">
              <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
              <small><?= date('M d ,Y - H:i', strtotime($post['date_time'])) ?></small>
            </div>
          </div>
      <div class="signlepost__thumpnail">
        <img src="./images/<?= $post['thumbnail'] ?>" alt="">
      </div>
      <p><?= $post['body'] ?></p>
    </div>
  </section>

  <?php
   include 'partials/footer.php'
 ?>