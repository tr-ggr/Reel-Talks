<?php include 'header.php'; ?>

<div class = "content">
<div class = "genre-banner"><h1 class="fa-regular fa-comments"></h1><h1>My Discussions</h1></div>

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
                <!-- <div class = "post">
                    <div class = "post-image"></div>
                    <div class = "post-content">
                        <div class = "post-content-top">
                            <div>Genre</div>
                            <div>• Time</div>
                        </div>
                        <div class = "post-content-middle">
                            <h1>Post Title</h1>
                            <div class = "author">
                                <div class = "author-picture"></div>
                                <div>Post Author</div>

                                <div class = "karma-container">
                                    <button><i class="fa-solid fa-thumbs-up"></i></button>
                                    <div class = "karma-counter">0</div>
                                    <button><i class="fa-solid fa-thumbs-down"></i></button>
                                </div>

                                <div class = "comments-container">
                                    <i class="fa-solid fa-comment"></i>
                                    <div class = "comments">0 comments</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "post-misc">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#post-1" id = "clickme">
                        View Post
                    </button>
                    </div>
                </div> -->

                <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">View Post</th>
      <th scope="col">Title</th>
      <th scope="col">Comments</th>
      <th scope="col">Ratings</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#post-1" id = "clickme">
                        View Post
                    </button>
      </th>
      <td>POST TITLE HAHAAHk</td>
      <td>0</td>
      <td>0</td>
      <td>            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                
                </ul>
            </div></td>
    </tr>
   
  </tbody>
</table>
            </div>

        </div>



        <form class = "sidebar-wrapper" method = "post">
       

            <button class = "btn btn-custom"  type="button" data-bs-toggle="modal" data-bs-target="#createDiscussion">Create new Discussion</button>
            <a href="homepage.php" class="btn btn-custom">Home</a>
            <a href="profile.php" class="btn btn-custom">My Profile</a>
            <button class = "btn btn-custom">Messages</button>
            <button type = "submit" name = "btnLogout" class = "btn btn-danger">Logout</button>
            
            <hr>
            <h3>Genres</h3>
            <button class = "btn btn-custom">Horror</button>
            <button class = "btn btn-custom">Sci-fi</button>
            <button class = "btn btn-custom">Slice of Life</button>
        </form>
    </div>
</div>


<div class="modal fade " id="post-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="flex-direction: column; align-items: start;" >
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h1 class="modal-title  fs-8" id="staticBackdropLabel">Post Title</h1>
        <div class = "author">
            <div class = "author-picture"></div>
            <div>Post Author</div>
        </div>
       
      </div>
      <div class="modal-body">
        <div>asnd snasuidnasjidn iasndiaj sndiaj ndijasnd ijasnd asijdn asijdn asjid</div>
        <hr>
        <div class = "post-toolbar">
            <div class = "karma-container">
                <button><i class="fa-solid fa-thumbs-up"></i></button>
                <div class = "karma-counter">0</div>
                <button><i class="fa-solid fa-thumbs-down"></i></button>
            </div>
            
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                
                </ul>
            </div>
        </div>
      </div>
      <div class="modal-footer">
       <div class = "post-comments-container">
            <textarea row="3"></textarea>
            <button class = "btn btn-primary">Add Comment</button>
            <hr>
            <div class = "comment">
                <div class = "comment-header">
                    <div class = "author-comment">
                        <div class = "author-profile-comment"></div>
                        <div class = "author-name-comment">Juan Dela Cruz</div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        
                        </ul>
                    </div>
                </div>
                oasmndjoasnd nd oajsnd asdn so joanjosand ojasnd as asojdn asjod nasjod nasjod nas djo nsaojd nasjodn asnd s
            </div>

            <div class = "comment">
                <div class = "comment-header">
                    <div class = "author-comment">
                        <div class = "author-profile-comment"></div>
                        <div class = "author-name-comment">Juan Dela Cruz</div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        
                        </ul>
                    </div>
                </div>
                oasmndjoasnd nd oajsnd asdn so joanjosand ojasnd as asojdn asjod nasjod nasjod nas djo nsaojd nasjodn asnd s
                
            </div>
        </div>
        
     
      </div>
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
      <div class="modal-body">
        <label for="inputUsername" class="form-label">Post Title</label>
            <input type="text" id="inputUsername" class="form-control" required>
        <label for="inputUsername" class="form-label">Post Image link (optional)</label>
            <input type="text" id="inputUsername" class="form-control">
        <label for="inputPassword5" class="form-label">Post Content</label>
            <textarea class="form-control" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Post</button>
      </div>
    </div>
  </div>
</div>


<?php include 'footer.php';?>