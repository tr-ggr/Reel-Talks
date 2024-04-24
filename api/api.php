<?php

include 'connect.php';
    

function loadDiscussions($row){
    echo '<script>
        $(".posts-container").empty();
    </script>';
    
    $row = array_reverse($row);
    foreach($row as $post){
        
    $sql1 = "SELECT * FROM tbluseraccount WHERE acctid = ".$post['UserAccountID']."";
    $result = mysqli_query($GLOBALS['connection'],$sql1); 
    $user = mysqli_fetch_assoc($result);

    $sql2 = "SELECT * FROM tblpostcomment WHERE postID = ".$post['PostID']."";
    $result2 = mysqli_query($GLOBALS['connection'],$sql2); 
    $comments = mysqli_fetch_all($result2, MYSQLI_ASSOC);

   $postcomments = "";
   $modal = "";
   $modalCommentEdit = "";

   $comments = array_reverse($comments);
   foreach($comments as $commentParse){
       //Comment Details
       $sql3 = "SELECT * FROM tblcomment WHERE CommentID = ".$commentParse['CommentID']."";
       $result3 = mysqli_query($GLOBALS['connection'],$sql3); 
       $comment = mysqli_fetch_assoc($result3);
       
       //Author of Comment
       $sql4 = "SELECT * FROM tbluseraccount WHERE acctid = ".$comment['UserAccountID']."";
       $result4 = mysqli_query($GLOBALS['connection'],$sql4); 
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


?>