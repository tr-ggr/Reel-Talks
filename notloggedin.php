<?php include 'header.php'; ?>

<div class = "content">
    <div class = "notloggedin-wrapper">
        <i style="font-size: 30ch" class="fa-solid fa-face-sad-tear"></i>
        
        <div>
            <h1><b>Uh oh...</b></h1>
            <div>you're not logged in</div>
        </div>
        
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal" id = "clickme">
            Get Started! -- It's Free!
        </button>
    </div>
</div>


<!-- Login Modal -->
<div class="modal fade " id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title  fs-5" id="staticBackdropLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form style="width: 100%;" method = "post">
                <!-- Username input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form2Example1" class="form-control" name = "txtusername" />
                  <label class="form-label" for="form2Example1">Username</label>
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form2Example2" class="form-control" name = "txtpassword" />
                  <label class="form-label" for="form2Example2">Password</label>
                </div>

              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary" name = "btnLogin">Log in</button>
              
                
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Login</button>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerModal" id = "clickme">
            Don't have an account
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal fade " id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title  fs-5" id="staticBackdropLabel">Register</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form style="width: 100%;" method = "post">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
            <input type="email" id="form2Example1" class="form-control" name = "txtemail" required/>
            <div id="emailHelpBlock" class="form-text">
                Please enter a valid email address.
            </div>

            
        </div>

        <!-- Username input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Username</label>
            <input type="text" id="form2Example2" class="form-control" name = "txtusername" required min="3"/>
            <div id="usernameHelpBlock" class="form-text">
                Username must be at least 3 characters long.
            </div>

        </div>
        
        <!-- Password input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Password</label>
            <input type="password" id="form2Example2" class="form-control" name = "txtpassword" required min="3"/>
            <div id="passwordHelpBlock" class="form-text">
                Your password must be at least 3 characters characters long.
            </div>

        </div>

        <!-- Firstname input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Firstname</label>
            <input type="text" id="form2Example2" class="form-control" name = "txtfirstname" required/>
            <div id="firstnameHelpBlock" class="form-text">
                Please enter your firstname.
            </div>

        </div>

        <!-- Lastname input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Lastname</label>
            <input type="text" id="form2Example2" class="form-control" name = "txtlastname" required/>
            <div id="lastnameHelpBlock" class="form-text">
                Please enter your lastname.
            </div>

        </div>

        <!-- Gender input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Gender</label>
            <select class="form-select" name="txtgender" id="cars">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
            </select>

            <div id="genderHelpBlock" class="form-text">
                Please select your gender.
            </div>

        </div>


        <!-- Birthdate input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Birthdate</label> 
            <input type="date" id="form2Example2" class="form-control" name="birthdate" required/>
            <div id="birthdateHelpBlock" class="form-text">
                Please enter your birthdate.
            </div>

        </div>


        <button type="submit" class="btn btn-primary btn-block" name="btnRegister">Register</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- toasts -->

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Invalid Username or Password!
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="failedToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Username or Email already in use!
    </div>
  </div>
</div>


<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="failedNameToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Name is already registered!
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Reel Talks</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Successfully Registered!
    </div>
  </div>
</div>


<!-- login php -->
<?php	 
	if(isset($_POST['btnLogin'])){				
		$uname=$_POST['txtusername'];
		$pword=$_POST['txtpassword'];
		
		//query data from tbluserprofile			
		$sql1 = "Select * FROM tbluseraccount WHERE username = '".$uname."'" ;
		$result = mysqli_query($connection,$sql1);
        $row = mysqli_fetch_assoc($result);

    if($row == 0){
      echo "<script>
      const toastLiveExample = document.getElementById('liveToast')
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
      toastBootstrap.show()
    </script>";
    } else {
      if(password_verify($pword, $row['password'])){
        $_SESSION["acctid"] = $row['acctid'];
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["isAdmin"] = $row['isAdmin'];
        echo "<script> window.location.replace('homepage.php');</script>";
      } else {
        echo "<script>
        const toastLiveExample = document.getElementById('liveToast')
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastBootstrap.show()
      </script>";
      }

    }

		
		
	}
		

?>
    

<!-- register php -->
<?php	 
	if(isset($_POST['btnRegister'])){		
		//retrieve data from form and save the value to a variable
		//for tbluserprofile
		$fname=$_POST['txtfirstname'];		
		$lname=$_POST['txtlastname'];
		$gender=$_POST['txtgender'];
		$birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
		//for tbluseraccount
		$email=$_POST['txtemail'];		
		$uname=$_POST['txtusername'];
		$pword = password_hash($_POST['txtpassword'], PASSWORD_DEFAULT);
		

		
		//Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
		$sql2 ="Select * from tbluseraccount where username='".$uname."' or emailadd = '".$email."'";
		$result = mysqli_query($connection,$sql2);
		$row = mysqli_num_rows($result);

		if($row == 0){
      //save data to tbluserprofile			
      $sql1 ="INSERT into tbluserprofile(firstname, lastname, gender, birthdate) values('$fname','$lname','$gender', '$birthdate')";
      mysqli_query($connection,$sql1);

      //get user id
      $sql3 = "SELECT * FROM tbluserprofile WHERE firstname='$fname' AND lastname='$lname' AND gender='$gender' AND birthdate='$birthdate'";
      $result2 = mysqli_query($connection,$sql3);
      $row2 = mysqli_fetch_assoc($result2);

			$sql ="Insert into tbluseraccount(emailadd,username,password, userid) values('".$email."','".$uname."','".$pword."', ".$row2['userid'].")";
			mysqli_query($connection,$sql);

      echo "<script>
              const toastLiveExample = document.getElementById('successToast')
              const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
              toastBootstrap.show()
            </script>";
			// header("location: index.php");
		}else{
      echo "<script>
              const toastLiveExample = document.getElementById('failedToast')
              const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
              toastBootstrap.show()
            </script>";
		}
			
		
	}
		

?>
    

<?php include 'footer.php';?>