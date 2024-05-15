<?php include 'header.php'; ?>

<div class="content">
    <div class="genre-banner">
        <h1 class="fa-regular fa-comments"></h1>
        <h1>Admin Report</h1>
    </div>

    <div class="homepage">
        <div class="report-wrapper">
            <div class="total-activity-chart">

            </div>
            <h3> Stats Board </h3>
            <div class="stats-board">

                <div class="card border-secondary mb-3" style="min-width: 11em; max-width: 18rem;">
                    <div class="card-header">Total Posts</div>
                    <div class="card-body text-secondary">
                        <h1 class="card-title" style="font-size: 5ch; display:flex; width:100%; justify-content: center;"><?php echo getNumberofPosts() ?></h1>
                    </div>
                </div>

                <div class="card border-secondary mb-3" style="min-width: 11em; max-width: 18rem;">
                    <div class="card-header">Total Comments</div>
                    <div class="card-body text-secondary">
                        <h1 class="card-title" style="font-size: 5ch; display:flex; width:100%; justify-content: center;"><?php echo getNumberofComments() ?></h1>
                    </div>
                </div>

                <div class="card border-secondary mb-3" style="min-width: 11em; max-width: 18rem;">
                    <div class="card-header">Total Users</div>
                    <div class="card-body text-secondary">
                        <h1 class="card-title" style="font-size: 5ch; display:flex; width:100%; justify-content: center;"><?php echo getTotalUsers() ?></h1>
                    </div>
                </div>

                <div class="card border-secondary mb-3" style="min-width: 11em; max-width: 18rem;">
                    <div class="card-header">Total Admins</div>
                    <div class="card-body text-secondary">
                        <h1 class="card-title" style="font-size: 5ch; display:flex; width:100%; justify-content: center;"><?php echo getTotalAdmins() ?></h1>
                    </div>
                </div>

                <div class="card border-secondary mb-3" style="min-width: 11em; max-width: 18rem;">
                    <div class="card-header">Average Comments Today</div>
                    <div class="card-body text-secondary" style="display:flex; width:100%; justify-content: center; align-items:center; flex-direction: column;">
                        <h1 class="card-title" style="font-size: 5ch; display:flex; width:100%; justify-content: center; align-items:center;"><?php echo (getAvgCommentsPerPostToday()) ?></h1>
                        <p class="card-text" style='font-size:2ch;text-align: center;'>per post</p>
                    </div>
                </div>

            </div>



            <!-- Table 1 -->
            <div class="most-active-table">
                <h3> Most Active Users </h3>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">UserID</th>
                            <th scope="col">Username</th>
                            <th scope="col">No. of Comments</th>
                            <th scope="col">No. of Posts</th>
                            <th scope="col">Total Activity </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo getMostActive() ?>
                    </tbody>
                </table>
            </div>

            <!-- Table 2 -->
            <div class="most-active-table">
                <h3> Most Interacted Posts </h3>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">PostID</th>
                            <th scope="col">Title</th>
                            <th scope="col">No. of Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo getMostInteracted() ?>
                    </tbody>
                </table>
            </div>

            <!-- Table 3 -->
            <div class="most-active-table">
                <h3> Latest Posts </h3>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date created</th>
                        </tr>


                    </thead>
                    <tbody>
                        <?php echo getLatestPost() ?>
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

<?php include 'footer.php'; ?>