<?php include 'header.php'; ?>

<div class = "content">
<div class = "genre-banner"><h1 class="fa-regular fa-comments"></h1><h1>Home</h1></div>

    <div class = "homepage">
        <div class = "main-wrapper">

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

            <div class = "posts-container">
                <div class = "post">
                    <div class = "post-image" style='background-image: url("")'></div>
                    <div class = "post-content">
                        <h1>Title</h1>
                        <div class ="post-author-info">
                            <div class = "post-author-image"></div>
                            <h6 class = "ml-3">HAHA</h6>
                        </div>
                        <h6>Date and Time</h6>
                        <h6>Date and Time</h6>
                    </div>
                    <button class = "btn btn-outline-primary">View</button>
                </div>

                




            </div>

        </div>



        <div class = "sidebar-wrapper">
            <button class = "btn btn-primary">Create new Discussion</button>
            <button class = "btn btn-primary">Home</button>
            <button class = "btn btn-primary">My Activity</button>
            <button class = "btn btn-primary">Messages</button>
            <hr>
            <h3>Genres</h3>
            <button class = "btn btn-primary">Horror</button>
            <button class = "btn btn-primary">Sci-fi</button>
            <button class = "btn btn-primary">Slice of Life</button>

        </div>
    </div>
</div>

<?php include 'footer.php';?>