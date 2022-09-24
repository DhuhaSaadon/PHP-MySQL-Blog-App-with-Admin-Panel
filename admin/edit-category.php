<?php 
include 'partials/header.php';

if(isset($_GET['id'])){
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  // fetch category from database
  $query = "SELECT * FROM categories WHERE id=$id";
  $result = mysqli_query($connection, $query);

  if(mysqli_num_rows($result) == 1){
    $category = mysqli_fetch_assoc(($result));
  }
}
else{
  header('location :' .ROOT_URL . 'admin/manage-categories.php');
  die();
}

?>

  <nav>
    <div class="container nav__container">
      <a href="index.html" class="nav__logo">EGATOR</a>
      <ul class="nav__items">
        <li><a href="blog.html">Blog</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="contact.html">Contact</a></li>
        <!-- <li><a href="signin.html">Signin</a></li> -->
        <li class="nav__profile">
          <div class="avatar">
            <img src="./images/avatar1.jpg" alt="">
          </div>
          <ul>
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="logout.html">Log Out</a></li>
          </ul>
        </li>
      </ul>
      <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
      <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
    </div>
  </nav>

  <section class="form__section">
    <div class="container form__section-container">
      <h2>Edit Category</h2>
      <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="POST">
        <input type="text" name="id" hidden value="<?= $category['id'] ?>">
        <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
        <textarea rows="4" name="description" placeholder="Description"><?= $category['description'] ?></textarea>
        <button type="submit" name="submit" class="btn">Update Category</button>
      </form>
    </div>
  </section>

<?php 
include '../partials/footer.php';
?>
