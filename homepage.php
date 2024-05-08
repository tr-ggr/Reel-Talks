<?php include 'header.php'; ?>

<div class="content">
  <div class="genre-banner">
    <h1 class="fa-regular fa-comments"></h1>
    <h1>Home</h1>
  </div>

  <div class="homepage">
    <div class="main-wrapper">

      <form class="d-flex gap-3" method="post">
        <select class="form-select" aria-label="Default select example">
          <option selected>Search by</option>
          <option value="1">Latest</option>
          <option value="2">Popular</option>
          <option value="3">Most Comments</option>
          <option value="3">Oldest</option>
        </select>

        <input name="txtSearch" class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        <button name="btnSearch" class="btn btn-outline-success" type="submit">Filter</button>
      </form>

      <div class="posts-container">

        <?php

        if (isset($_POST['btnSearch'])) {
          $searchKeyword = $_POST['txtSearch'];
          loadDiscussions($searchKeyword);
        } else {
          loadDiscussions();
        }

        ?>
      </div>

    </div>

    <form class="sidebar-wrapper" method="post">


      <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#createDiscussion">Create new Discussion</button>
      <a href="homepage.php" class="btn btn-custom">Home</a>
      <a href="profile.php?user=<?php echo $_SESSION['username']; ?>" class="btn btn-custom">My Profile</a>
      <?php
      if ($_SESSION["isAdmin"]) {
        echo '
      <a href="report.php" class="btn btn-custom">Report</a>';
      }

      ?>
      <button class="btn btn-custom">Messages</button>
      <button type="submit" name="btnLogout" class="btn btn-danger">Logout</button>

      <hr>
      <h3>Genres</h3>
      <button class="btn btn-custom">Horror</button>
      <button class="btn btn-custom">Sci-fi</button>
      <button class="btn btn-custom">Slice of Life</button>
    </form>


  </div>
</div>















<?php include 'footer.php'; ?>