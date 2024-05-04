<?php include 'header.php'; ?>

<div class="content">
  <div class="genre-banner">
    <h1 class="fa-regular fa-user"></h1>
    <h1>User Profile</h1>
  </div>

  <div class="profilepage-container">
    <div class="profilepage-picture"></div>
    <div class="profilepage-info">
      <h1><?php echo $_GET['user']; ?></h1>
      <button class="btn btn-link">Following: <?php echo getFollowing() ?></button>
      <button class="btn btn-link">Followers: <?php echo getFollowers() ?></button>


      <form class="profilepage-buttons" method="post">
        <?php if ($_GET['user'] == $_SESSION['username']) {
          echo '<button class="btn btn-outline-primary">Edit Profile</button>';
        } else {
          if (isFollowing()) {
            echo '
            <button type = "submit" id="btnUnfollow" name = "btnUnfollow" class="btn btn-primary">Unfollow</button>
            <button class="btn btn-outline-primary">Message </button>';
          } else {
            echo '
            <button type = "submit" id="btnFollow" name = "btnFollow" class="btn btn-outline-primary">Follow</button>
            <button class="btn btn-outline-primary">Message </button>';
          }
        }

        if (isFollowed() && $_GET['user'] != $_SESSION['username']) {
          echo '<div>Follows you</div>';
        }

        if (isset($_POST['btnFollow'])) {
          if (followUser()) {
            echo "<script>      
            window.onload = function(){
              const toastLiveExample = document.getElementById('successFollow')
              const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
              toastBootstrap.show()
            } </script>";
          } else {
            echo "<script>      
            window.onload = function(){
              const toastLiveExample = document.getElementById('UserDoesNotExist')
              const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
              toastBootstrap.show()
            } </script>";
          }
        }

        if (isset($_POST['btnUnfollow'])) {
          if (unfollowUser()) {
            echo "<script>      
            window.onload = function(){
              const toastLiveExample = document.getElementById('successUnfollow')
              const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
              toastBootstrap.show()
            } </script>";
          } else {
            echo "<script>      
            window.onload = function(){
              const toastLiveExample = document.getElementById('UserDoesNotExist')
              const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
              toastBootstrap.show()
            } </script>";
          }
        }


        ?>






      </form>
    </div>
  </div>

  <div class="homepage">
    <div class="main-wrapper">

      <form class="d-flex gap-3" role="search">
        <select class="form-select" aria-label="Default select example">
          <option selected>Search by</option>
          <option value="1">Latest</option>
          <option value="2">Popular</option>
          <option value="3">Most Comments</option>
          <option value="3">Oldest</option>
        </select>

        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Filter</button>
      </form>

      <div class="posts-container">

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">View Post</th>
              <th scope="col">Title</th>
              <th scope="col">Date Posted</th>
              <th scope="col">Comments</th>
              <th scope="col">Ratings</th>
              <th scope="col">Options</th>
            </tr>
          </thead>
          <tbody>

            <?php if (!loadProfileDiscussions()) {
              echo '<tr>
              <td colspan="6">No discussions found</td>
            ';
            } ?>

          </tbody>
        </table>
      </div>

    </div>



    <form class="sidebar-wrapper" method="post">


      <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#createDiscussion">Create new Discussion</button>
      <a href="homepage.php" class="btn btn-custom">Home</a>
      <a href="profile.php?user=<?php echo $_SESSION['username']; ?>" class="btn btn-custom">My Profile</a>
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

<!-- Toast -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="successFollow" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Successfully Followed!
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="UserDoesNotExist" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      User Does Not Exist!
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="successUnfollow" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Successfully Unfollowed!
    </div>
  </div>
</div>


<?php include 'footer.php'; ?>