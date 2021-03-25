<?php
include('includes/header.php');
include('includes/navbar.php');
include('security.php');

?>


<style type="text/css">
        body{ font: 14px sans-serif; }
    </style>

<body>


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="content-center">
                            <div class="col-lg-25 ">
                                <div class="card shadow-lg border-0 rounded-lg mt-20">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Upload Audio</h3></div>
                                    <div class="card-body">



<form action="audio.php" method="post" enctype="multipart/form-data">



<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Title of Message</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Text" name="text">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"> Message By:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Audio by" name="by">
</div>


<p></p>
<div>
  <label for="formFileLg" class="form-label">Choose Audio</label>
  <input class="form-control form-control-lg" id="formFileLg" type="file" name="audio">
</div>
  <p></p>
  <p></p>
<div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>

</form>
</div>
                                </div>        
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                </main>
            </div>
        
     
</body>

<?php
include('includes/footer.php');
include('includes/scripts.php')
?>