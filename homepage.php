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
          $sqlSearch = "SELECT * FROM tblpost WHERE PostTitle LIKE '%$searchKeyword%' OR Content LIKE '%$searchKeyword%'";
          $result = mysqli_query($connection, $sqlSearch);
          $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

          if ($row == 0) {
            echo "<script>alert('NO POSTS')</script>";
          } else {
            loadDiscussions($row);
          }
        } else {
          $sql = "Select * FROM tblpost";
          $result = mysqli_query($connection, $sql);
          $row = mysqli_fetch_all($result, MYSQLI_ASSOC);


          if ($row == 0) {
            echo "<script>alert('NO POSTS')</script>";
          } else {
            loadDiscussions($row);
          }
        }

        ?>
      </div>

    </div>




    <form class="sidebar-wrapper" method="post">


      <button class="btn btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#createDiscussion">Create new Discussion</button>
      <a href="homepage.php" class="btn btn-custom">Home</a>
      <a href="profile.php" class="btn btn-custom">My Profile</a>
      <button class="btn btn-custom">Messages</button>
      <button type="submit" name="btnLogout" class="btn btn-danger">Logout</button>

      <hr>
      <h3>Genres</h3>
      <button class="btn btn-custom">Horror</button>
      <button class="btn btn-custom">Sci-fi</button>
      <button class="btn btn-custom">Slice of Life</button>
    </form>

    <?php
    if (isset($_POST['btnLogout'])) {
      session_destroy();
      echo "<script> window.location.replace('index.php');</script>";
    }
    ?>

  </div>
</div>

<!-- Toasts -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Successfully Posted!
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="deleteToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Successfully Deleted!
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="updateToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Successfully Updated!
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="commentToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Successfully Commented!
    </div>
  </div>
</div>


<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="deleteToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Successfully Deleted!
    </div>
  </div>
</div>

<!-- Create Discussion -->
<div class="modal fade " id="createDiscussion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title  fs-5" id="staticBackdropLabel">Create Discussion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post">
        <div class="modal-body">

          <label for="inputPostTitle" class="form-label">Post Title</label>
          <input type="text" name="txtPostTitle" id="inputPostTitle" class="form-control" required>
          <label for="inputUsername" class="form-label">Post Image link (optional)</label>
          <input type="text" name="txtImageURL" id="inputUsername" class="form-control">
          <label for="inputPassword5" class="form-label">Post Content</label>
          <textarea class="form-control" name="txtPostContent" required></textarea>

        </div>
        <div class="modal-footer">
          <button type="submit" name="btnPostDiscussion" class="btn btn-secondary" data-bs-dismiss="modal">Post</button>
        </div>
      </form>



    </div>
  </div>
</div>

<?php
if (isset($_POST['btnDeletePost'])) {
  $PostID = $_POST['postID'];
  $sqlDeletePost = "DELETE FROM tblpost WHERE PostID = '$PostID'";
  mysqli_query($connection, $sqlDeletePost);

  echo "<script>
                window.onload = function() {
                const toastLiveExample = document.getElementById('deleteToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
            };
            </script>";
}

if (isset($_POST['btnDeleteComment'])) {
  $CommentID = $_POST['commentID'];
  $sqlDeleteComment = "DELETE FROM tblcomment WHERE CommentID = '$CommentID'";
  mysqli_query($connection, $sqlDeleteComment);

  echo "<script>
                window.onload = function() {
                const toastLiveExample = document.getElementById('deleteToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
            };
            </script>";
}
if (isset($_POST['btnEditComment'])) {
  $CommentID = $_POST['commentID'];
  $UpdatedCommentContent = $_POST['txtCommentContent'];

  $sqlUpdateComment = "UPDATE tblcomment SET Content = '$UpdatedCommentContent' WHERE CommentID = '$CommentID'";
  mysqli_query($connection, $sqlUpdateComment);

  echo "<script>
                window.onload = function() {
                const toastLiveExample = document.getElementById('updateToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
            };
            </script>";
}

if (isset($_POST['btnUpdateDiscussion'])) {
  $PostID = $_POST['postID'];
  $PostTitle = $_POST['txtPostTitle'];
  $PostContent  = $_POST['txtPostContent'];
  $PostImageURL = $_POST['txtImageURL'];

  $sqlUpdatePost = "UPDATE tblpost SET PostTitle = '$PostTitle', Content = '$PostContent', ImageURL = '$PostImageURL' WHERE PostID = '$PostID'";
  mysqli_query($connection, $sqlUpdatePost);

  echo "<script>
                window.onload = function() {
                const toastLiveExample = document.getElementById('updateToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
            };
            </script>";
}

if (isset($_POST['btnPostDiscussion'])) {
  $PostTitle = $_POST['txtPostTitle'];
  $UserAccountID = $_SESSION['acctid'];
  $PostContent  = $_POST['txtPostContent'];
  $PostDate = date('Y-m-d');
  $PostImageURL = $_POST['txtImageURL'];

  $sqlInsertPost = "INSERT into tblpost(UserAccountID, PostTitle, Content, Post_Date, ImageURL) values('$UserAccountID','$PostTitle','$PostContent', '$PostDate', '$PostImageURL')";
  mysqli_query($connection, $sqlInsertPost);


  echo "<script>
                window.onload = function() {
                const toastLiveExample = document.getElementById('liveToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
            };
            </script>";
}

if (isset($_POST['btnAddComment'])) {
  $PostID = $_POST['postID'];
  $UserAccountID = $_SESSION['acctid'];
  $CommentContent  = $_POST['txtCommentContent'];
  $CommentDate = date('Y-m-d');

  $sqlInsertComment = "INSERT into tblcomment(UserAccountID, Content, Comment_Date) values('$UserAccountID','$CommentContent','$CommentDate')";
  mysqli_query($connection, $sqlInsertComment);

  $sql = "SELECT * FROM tblcomment ORDER BY CommentID DESC LIMIT 1";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($result);

  $CommentID = $row['CommentID'];

  $sql = "INSERT into tblpostcomment(CommentID, PostID) values('$CommentID', '$PostID')";
  mysqli_query($connection, $sql);


  echo "<script>
                const toastLiveExample = document.getElementById('commentToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
            </script>";
}




?>





<?php include 'footer.php'; ?>