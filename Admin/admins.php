
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
<?php
// Include config file
require_once "dbconnection.php";


 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");

            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<?php
include('includes/header.php');
include('includes/navbar.php');

?>

<!-- Modal -->
<div class="modal fade" id="adduserprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="modal-body">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save">
        <input type="reset" class="btn btn-default" value="Reset">
      </div>
</form>

    </div>
  </div>
</div>

<div id="layoutSidenav_content">
<div class ="container-fluid">

        <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">

            <?php

                 if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                 {
                     echo '<script type= "text/javascript">
                              alert("'.$_SESSION['success'].'");
                            </script>';
                            unset($_SESSION['success']);

                  }


                  if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                 {
                     echo '<script type= "text/javascript">
                              alert("'.$_SESSION['status'].'");
                            </script>';
                            unset($_SESSION['status']);

                  }
                  ?>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Admin Profile
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduserprofile">
                      Add Admin Profile
                    </button>
              </h6>
            </div>
              <div class="table-responsive">

                <?php
                $link = mysqli_connect("localhost", "root", "", "audiobook");

                $query= "SELECT * FROM users";
                $query_run= mysqli_query($link, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Date Registered</th>
                      <th>DELETE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (mysqli_num_rows($query_run) > 0)
                     {
                        while ($row = mysqli_fetch_assoc($query_run) )
                        {
                           ?>
                           <tr>
                               <td> <?php echo $row['username']; ?> </td>
                               <td> <?php echo $row['password']; ?> </td>
                               <td> <?php echo $row['created_at']; ?> </td>
                               <td>
                                <form action="delete.php" method="post">
                                  <input type="hidden" name="delete_user_id" value="<?php echo $row['id']; ?>">
                                 <button type = "submit" name='delete_user_btn' class="btn btn-danger"> DELETE</button>
                               </form>
                               </td>
                        </tr>
                        <?php
                        }

                    }
                    else
                    {
                        echo "No Record Found";
                    }
                    ?>




                  </tbody>
                </table>

              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->
</div>
</div

