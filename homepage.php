<?php include 'header.php'; ?>

<div class = "content">
<div class = "genre-banner"><h1 class="fa-regular fa-comments"></h1><h1>Home</h1></div>

    <div class = "homepage">
        <div class = "main-wrapper">

            <form class="d-flex gap-3" method="post">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Search by</option>
                    <option value="1">Latest</option>
                    <option value="2">Popular</option>
                    <option value="3">Most Comments</option>
                    <option value="3">Oldest</option>
                </select>

                <input name = "txtSearch" class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                <button name = "btnSearch" class="btn btn-outline-success" type="submit">Filter</button>
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

                <?php 

if(isset($_POST['btnSearch'])){	
    $searchKeyword = $_POST['txtSearch'];
    $sqlSearch = "SELECT * FROM tblpost WHERE PostTitle LIKE '%$searchKeyword%' OR Content LIKE '%$searchKeyword%'";
    $result = mysqli_query($connection, $sqlSearch);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    echo '<script>
        $(".posts-container").empty();
    </script>';
    
    if($row == 0){
        echo "<script>alert('NO POSTS')</script>";
    } else {
            $row = array_reverse($row);
            foreach($row as $post){
                

            $sql1 = "SELECT * FROM tbluseraccount WHERE acctid = ".$post['UserAccountID']."";
            $result = mysqli_query($connection,$sql1); 
            $user = mysqli_fetch_assoc($result);

               

            $sql2 = "SELECT * FROM tblpostcomment WHERE postID = ".$post['PostID']."";
            $result2 = mysqli_query($connection,$sql2); 
            $comments = mysqli_fetch_all($result2, MYSQLI_ASSOC);

           $postcomments = "";
           $modal = "";
           $modalCommentEdit = "";
           $modalPostEdit = "";


           $comments = array_reverse($comments);
           foreach($comments as $commentParse){
               //Comment Details
               $sql3 = "SELECT * FROM tblcomment WHERE CommentID = ".$commentParse['CommentID']."";
               $result3 = mysqli_query($connection,$sql3); 
               $comment = mysqli_fetch_assoc($result3);
               
               //Author of Comment
               $sql4 = "SELECT * FROM tbluseraccount WHERE acctid = ".$comment['UserAccountID']."";
               $result4 = mysqli_query($connection,$sql4); 
               $usercomment = mysqli_fetch_assoc($result4);


               $postcomments .= '<div class = "comment" id="'.$comment["CommentID"].'">
               <div class = "comment-header">
                   <div class = "author-comment">
                       <div class = "author-profile-comment"></div>
                       <div class = "author-name-comment">'.$usercomment["username"].'
                       <div style = "font-size: 1.5ch;color: #CCCCCC">'.$comment["Comment_Date"].'</div>
                       </div>
                   </div>

                   

                   
                   '.(($_SESSION['acctid'] == $usercomment["acctid"] || $_SESSION["isAdmin"] == 1) ? '<div class="dropdown">
                   <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis"></i>
                   </button>
                   <ul class="dropdown-menu">
                        <form method = "post">
                            <input type = "hidden" name = "commentID" value = "'.$comment['CommentID'].'">
                            <li>
                                <button type="button" class="dropdown-item btn btn-link"" data-bs-toggle="modal" data-bs-target="#editComment-'.$comment['CommentID'].'" id = "clickme">
                                    Edit
                                </button>
                            </li>
                            <li>
                                <button type="submit" name = "btnDeleteComment" class="dropdown-item btn btn-link">
                                    Delete
                                </button>
                            </li>
                        </form>
                   </ul>
               </div>
               ' : ' ').'
               </div>

               '.$comment["Content"].'
                </div>';

                $modalCommentEdit .= '<div class="modal fade" id="editComment-'.$comment['CommentID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Comment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method = "post">
                            <input type = "hidden" name = "commentID" value = "'.$commentParse['CommentID'].'">
                            <textarea name = "txtCommentContent" row="5" style="width: 100%;height: 5em">'.$comment["Content"].'</textarea>
                        
                    </div>
                    <div class="modal-footer">
                        <button type = "submit" name = "btnEditComment" class="btn btn-secondary" data-bs-dismiss="modal">Update Comment</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>';
           }
        
    

               

                

                echo '<div class = "post" id = "post-'.$post["PostID"].'">
                        
                        <div class = "post-image" style="background-image: url(\''.$post['ImageURL'].'\'"></div>
                        <div class = "post-content">
                            <div class = "post-content-top">
                                <div>Genre</div>
                                <div>• '.$post["Post_Date"].'</div>
                            </div>
                            <div class = "post-content-middle">
                                <h1>'.$post["PostTitle"].'</h1>
                                <div class = "author">
                                    <div class = "author-picture"></div>
                                    <div>'.$user["username"].'</div>
    
                                    <div class = "karma-container">
                                        <button><i class="fa-solid fa-thumbs-up"></i></button>
                                        <div class = "karma-counter">0</div>
                                        <button><i class="fa-solid fa-thumbs-down"></i></button>
                                    </div>
    
                                    <div class = "comments-container">
                                        <i class="fa-solid fa-comment"></i>
                                        <div class = "comments">'.count($comments).' comments</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "post-misc">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#postModal-'.$post['PostID'].'" id = "clickme">
                            View Post
                        </button>
                    </div>
            </div>';

            

            $modal.= '
            <div class="modal fade " id="editPost-'.$post["PostID"].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title  fs-5" id="staticBackdropLabel">Edit Discussion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method = "post">
                <div class="modal-body">

                    <input type = "hidden" name = "postID" value = "'.$post["PostID"].'">
                    
                    <label for="inputPostTitle" class="form-label">Post Title</label>
                        <input type="text" name = "txtPostTitle" id="inputPostTitle" class="form-control" value = "'.$post['PostTitle'].'" required>
                    <label for="inputUsername" class="form-label">Post Image link (optional)</label>
                        <input type="text" name = "txtImageURL" id="inputUsername" value = "'.$post['ImageURL'].'" class="form-control">
                    <label for="inputPassword5" class="form-label">Post Content</label>
                        <textarea class="form-control" name = "txtPostContent" value = "" required>'.$post['Content'].'</textarea>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" name = "btnUpdateDiscussion" class="btn btn-secondary" data-bs-dismiss="modal">Update</button>
                </div>
                </form>

                
                
                </div>
            </div>
            </div>
            
            
            <div class="modal fade " id="postModal-'.$post['PostID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header" style="flex-direction: column; align-items: start;" >
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <h1 class="modal-title  fs-8" id="staticBackdropLabel">'.$post["PostTitle"].'</h1>
                  
                  <div class = "author">
                      <div class = "author-picture"></div>
                      <div>'.$user["username"].'</div>
                  </div>

                  <h6 class="modal-title" id="staticBackdropLabel">Date posted: '.$post["Post_Date"].'</h6>

                  <div class = "post-toolbar">
                  <div class = "karma-container">
                      <button><i class="fa-solid fa-thumbs-up"></i></button>
                      <div class = "karma-counter">0</div>
                      <button><i class="fa-solid fa-thumbs-down"></i></button>
                  </div>

                  


                  
                  '.(($_SESSION['acctid'] == $user["acctid"] || $_SESSION["isAdmin"] == 1) ? '<div class="dropdown">
                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <form method = "post">
                            <input type = "hidden" name = "postID" value = "'.$post["PostID"].'">
                            <button type="button" class="dropdown-item btn btn-link"" data-bs-toggle="modal" data-bs-target="#editPost-'.$post["PostID"].'" id = "clickme">
                                    Edit
                                </button>
                            <li>
                            <button type="submit" name = "btnDeletePost" class="dropdown-item btn btn-link">
                                Delete
                            </button>
                            </li>
                            
                        </form>
                      </ul>
                  </div>' : ' ').'
              </div>
                 
                </div>
                <div class="modal-body">
                    '.(($post['ImageURL'] != NULL) ? ' <div class = "modal-content-picture" style="background-image: url(\''.$post['ImageURL'].'\'"></div>' : ' ' ).'
                   
                  <div>'.$post["Content"].'</div>
                 
                </div>
                <div class="modal-footer ">

                    <form method = "post" class = "post-comments-container">
                        <input type = "hidden" name = "postID" value = "'.$post["PostID"].'">
                        <textarea name = "txtCommentContent" row="3"></textarea>
                        <button type = "submit" name = "btnAddComment" class = "btn btn-primary">Add Comment</button>
                        <hr>
                    </form>

                      '.$postcomments.'
                   
                      

                  
               
                </div>
              </div>
            </div>
          </div>
          
          '.$modalCommentEdit.'
          ';

          echo $modal;
            }
        }
    
} else {
    $sql = "Select * FROM tblpost";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);


    if($row == 0){
        echo "<script>alert('NO POSTS')</script>";
    } else {
            $row = array_reverse($row);
            foreach($row as $post){
                
                // var_dump($post);
                $sql1 = "SELECT * FROM tbluseraccount WHERE acctid = ".$post['UserAccountID']."";
                $result = mysqli_query($connection,$sql1); 
                $user = mysqli_fetch_assoc($result);

                // $string = "<tr><th scope='row'>".$post['PostID']."</th>
                // <td>".$user['username']."</td>
                // <td>".$post['Content']."</td>
                // <td>".$post['Post_Date']."</td>";

            //     echo "<div class = 'post-container'> 
            //     <div class = 'img-placeholder' style = 'background-image: url(".$post["ImageURL"].")'> 
    
            //     </div> 
            //     <div class = 'post-details'>
            //         <div class = 'post-title'> 
            //                 <div class = 'post-label'> ".$post["PostTitle"]." </div>
            //                 <div class = 'post-date'> ".$post["Post_Date"]."</div>
            //         </div> 
            //         <div class = 'post-user'>
            //             <div class = 'user-icon' style = 'background-image: url("."https://media.licdn.com/dms/image/D4E03AQGcR5j4VPdjcA/profile-displayphoto-shrink_200_200/0/1710547017024?e=2147483647&v=beta&t=afPxv461uGfzyEYYQI7Ia5QME-z1_sviH_h9wsUa6FA".")'>  </div>
            //             <div class = 'user-name'> ".$user["username"]." </div>
            //         </div>
            //         <div class = 'post-content'>  ".$post["Content"]."</div>
            //     </div>
                
            // </div>";

            $sql2 = "SELECT * FROM tblpostcomment WHERE postID = ".$post['PostID']."";
            $result2 = mysqli_query($connection,$sql2); 
            $comments = mysqli_fetch_all($result2, MYSQLI_ASSOC);

           $postcomments = "";
           $modal = "";
           $modalCommentEdit = "";
           $modalPostEdit = "";


           $comments = array_reverse($comments);
           foreach($comments as $commentParse){
               //Comment Details
               $sql3 = "SELECT * FROM tblcomment WHERE CommentID = ".$commentParse['CommentID']."";
               $result3 = mysqli_query($connection,$sql3); 
               $comment = mysqli_fetch_assoc($result3);
               
               //Author of Comment
               $sql4 = "SELECT * FROM tbluseraccount WHERE acctid = ".$comment['UserAccountID']."";
               $result4 = mysqli_query($connection,$sql4); 
               $usercomment = mysqli_fetch_assoc($result4);


               $postcomments .= '<div class = "comment" id="'.$comment["CommentID"].'">
               <div class = "comment-header">
                   <div class = "author-comment">
                       <div class = "author-profile-comment"></div>
                       <div class = "author-name-comment">'.$usercomment["username"].'
                       <div style = "font-size: 1.5ch;color: #CCCCCC">'.$comment["Comment_Date"].'</div>
                       </div>
                   </div>

                   

                   
                   '.(($_SESSION['acctid'] == $usercomment["acctid"] || $_SESSION["isAdmin"] == 1) ? '<div class="dropdown">
                   <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis"></i>
                   </button>
                   <ul class="dropdown-menu">
                        <form method = "post">
                            <input type = "hidden" name = "commentID" value = "'.$comment['CommentID'].'">
                            <li>
                                <button type="button" class="dropdown-item btn btn-link"" data-bs-toggle="modal" data-bs-target="#editComment-'.$comment['CommentID'].'" id = "clickme">
                                    Edit
                                </button>
                            </li>
                            <li>
                                <button type="submit" name = "btnDeleteComment" class="dropdown-item btn btn-link">
                                    Delete
                                </button>
                            </li>
                        </form>
                   </ul>
               </div>
               ' : ' ').'
               </div>

               '.$comment["Content"].'
                </div>';

                $modalCommentEdit .= '<div class="modal fade" id="editComment-'.$comment['CommentID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Comment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method = "post">
                            <input type = "hidden" name = "commentID" value = "'.$commentParse['CommentID'].'">
                            <textarea name = "txtCommentContent" row="5" style="width: 100%;height: 5em">'.$comment["Content"].'</textarea>
                        
                    </div>
                    <div class="modal-footer">
                        <button type = "submit" name = "btnEditComment" class="btn btn-secondary" data-bs-dismiss="modal">Update Comment</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>';
           }
        
    

               

                

                echo '<div class = "post" id = "post-'.$post["PostID"].'">
                        
                        <div class = "post-image" style="background-image: url(\''.$post['ImageURL'].'\'"></div>
                        <div class = "post-content">
                            <div class = "post-content-top">
                                <div>Genre</div>
                                <div>• '.$post["Post_Date"].'</div>
                            </div>
                            <div class = "post-content-middle">
                                <h1>'.$post["PostTitle"].'</h1>
                                <div class = "author">
                                    <div class = "author-picture"></div>
                                    <div>'.$user["username"].'</div>
    
                                    <div class = "karma-container">
                                        <button><i class="fa-solid fa-thumbs-up"></i></button>
                                        <div class = "karma-counter">0</div>
                                        <button><i class="fa-solid fa-thumbs-down"></i></button>
                                    </div>
    
                                    <div class = "comments-container">
                                        <i class="fa-solid fa-comment"></i>
                                        <div class = "comments">'.count($comments).' comments</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "post-misc">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#postModal-'.$post['PostID'].'" id = "clickme">
                            View Post
                        </button>
                    </div>
            </div>';

            

            $modal.= '
            <div class="modal fade " id="editPost-'.$post["PostID"].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title  fs-5" id="staticBackdropLabel">Edit Discussion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method = "post">
                <div class="modal-body">

                    <input type = "hidden" name = "postID" value = "'.$post["PostID"].'">
                    
                    <label for="inputPostTitle" class="form-label">Post Title</label>
                        <input type="text" name = "txtPostTitle" id="inputPostTitle" class="form-control" value = "'.$post['PostTitle'].'" required>
                    <label for="inputUsername" class="form-label">Post Image link (optional)</label>
                        <input type="text" name = "txtImageURL" id="inputUsername" value = "'.$post['ImageURL'].'" class="form-control">
                    <label for="inputPassword5" class="form-label">Post Content</label>
                        <textarea class="form-control" name = "txtPostContent" value = "" required>'.$post['Content'].'</textarea>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" name = "btnUpdateDiscussion" class="btn btn-secondary" data-bs-dismiss="modal">Update</button>
                </div>
                </form>

                
                
                </div>
            </div>
            </div>
            
            
            <div class="modal fade " id="postModal-'.$post['PostID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header" style="flex-direction: column; align-items: start;" >
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  <h1 class="modal-title  fs-8" id="staticBackdropLabel">'.$post["PostTitle"].'</h1>
                  
                  <div class = "author">
                      <div class = "author-picture"></div>
                      <div>'.$user["username"].'</div>
                  </div>

                  <h6 class="modal-title" id="staticBackdropLabel">Date posted: '.$post["Post_Date"].'</h6>

                  <div class = "post-toolbar">
                  <div class = "karma-container">
                      <button><i class="fa-solid fa-thumbs-up"></i></button>
                      <div class = "karma-counter">0</div>
                      <button><i class="fa-solid fa-thumbs-down"></i></button>
                  </div>

                  


                  
                  '.(($_SESSION['acctid'] == $user["acctid"] || $_SESSION["isAdmin"] == 1) ? '<div class="dropdown">
                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <form method = "post">
                            <input type = "hidden" name = "postID" value = "'.$post["PostID"].'">
                            <button type="button" class="dropdown-item btn btn-link"" data-bs-toggle="modal" data-bs-target="#editPost-'.$post["PostID"].'" id = "clickme">
                                    Edit
                                </button>
                            <li>
                            <button type="submit" name = "btnDeletePost" class="dropdown-item btn btn-link">
                                Delete
                            </button>
                            </li>
                            
                        </form>
                      </ul>
                  </div>' : ' ').'
              </div>
                 
                </div>
                <div class="modal-body">
                    '.(($post['ImageURL'] != NULL) ? ' <div class = "modal-content-picture" style="background-image: url(\''.$post['ImageURL'].'\'"></div>' : ' ' ).'
                   
                  <div>'.$post["Content"].'</div>
                 
                </div>
                <div class="modal-footer ">

                    <form method = "post" class = "post-comments-container">
                        <input type = "hidden" name = "postID" value = "'.$post["PostID"].'">
                        <textarea name = "txtCommentContent" row="3"></textarea>
                        <button type = "submit" name = "btnAddComment" class = "btn btn-primary">Add Comment</button>
                        <hr>
                    </form>

                      '.$postcomments.'
                   
                      

                  
               
                </div>
              </div>
            </div>
          </div>
          
          '.$modalCommentEdit.'
          ';

          echo $modal;
            }
        }
}

                   
                    
                ?>
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
        <?php
            if(isset($_POST['btnLogout'])){
                session_destroy();
                echo "<script> window.location.replace('index.php');</script>";
            }
        ?>

    </div>
</div>


<!-- <div class="modal fade " id="post-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    <form method = "post">
                        <input type = "hidden" name = "postID" value = "'.$post["PostID"].'">
                        <li><a class="dropdown-item" name = "PostEdit">Edit</a></li>
                        <li><a class="dropdown-item" name = "PostDelete">Delete</a></li>
                    </form>
                
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
</div> -->

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
      <form method = "post">
      <div class="modal-body">
        
        <label for="inputPostTitle" class="form-label">Post Title</label>
            <input type="text" name = "txtPostTitle" id="inputPostTitle" class="form-control" required>
        <label for="inputUsername" class="form-label">Post Image link (optional)</label>
            <input type="text" name = "txtImageURL" id="inputUsername" class="form-control">
        <label for="inputPassword5" class="form-label">Post Content</label>
            <textarea class="form-control" name = "txtPostContent" required></textarea>
        
      </div>
      <div class="modal-footer">
        <button type="submit" name = "btnPostDiscussion" class="btn btn-secondary" data-bs-dismiss="modal">Post</button>
      </div>
      </form>

      
      
    </div>
  </div>
</div>

<?php
        if(isset($_POST['btnDeletePost'])){
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

        if(isset($_POST['btnDeleteComment'])){
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
        if(isset($_POST['btnEditComment'])){
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

        if(isset($_POST['btnUpdateDiscussion'])){
            $PostID = $_POST['postID'];	
            $PostTitle = $_POST['txtPostTitle'];	
            $PostContent  = $_POST['txtPostContent'];
            $PostImageURL = $_POST['txtImageURL'];

            $sqlUpdatePost ="UPDATE tblpost SET PostTitle = '$PostTitle', Content = '$PostContent', ImageURL = '$PostImageURL' WHERE PostID = '$PostID'";
            mysqli_query($connection, $sqlUpdatePost);

            echo "<script>
                window.onload = function() {
                const toastLiveExample = document.getElementById('updateToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
            };
            </script>";
        }
        
        if(isset($_POST['btnPostDiscussion'])){	
            $PostTitle = $_POST['txtPostTitle'];	
            $UserAccountID = $_SESSION['acctid'];
            $PostContent  = $_POST['txtPostContent'];
            $PostDate = date('Y-m-d');
            $PostImageURL = $_POST['txtImageURL'];

            $sqlInsertPost ="INSERT into tblpost(UserAccountID, PostTitle, Content, Post_Date, ImageURL) values('$UserAccountID','$PostTitle','$PostContent', '$PostDate', '$PostImageURL')";
            mysqli_query($connection, $sqlInsertPost);


            echo "<script>
                window.onload = function() {
                const toastLiveExample = document.getElementById('liveToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
            };
            </script>";
        }

        if(isset($_POST['btnAddComment'])){	
            $PostID = $_POST['postID'];	
            $UserAccountID = $_SESSION['acctid'];
            $CommentContent  = $_POST['txtCommentContent'];
            $CommentDate = date('Y-m-d');

            $sqlInsertComment ="INSERT into tblcomment(UserAccountID, Content, Comment_Date) values('$UserAccountID','$CommentContent','$CommentDate')";
            mysqli_query($connection, $sqlInsertComment);

            $sql = "SELECT * FROM tblcomment ORDER BY CommentID DESC LIMIT 1";
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($result);

            $CommentID = $row['CommentID'];

            $sql ="INSERT into tblpostcomment(CommentID, PostID) values('$CommentID', '$PostID')";
            mysqli_query($connection, $sql);


            echo "<script>
                const toastLiveExample = document.getElementById('commentToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()
            </script>";
        }


       

      ?>





<?php include 'footer.php';?>