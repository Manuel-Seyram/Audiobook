


<?php
include('includes/header.php');
include('includes/navbar.php');

?>



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
              <h6 class="m-0 font-weight-bold text-primary">Uploads
              </h6>
            </div>
              <div class="table-responsive">

                <?php
                $link = mysqli_connect("localhost", "root", "", "audiobook");

                $query= "SELECT * FROM audio";
                $query_run= mysqli_query($link, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th>Message</th>
                     <th>By</th>
                      <th>Date&Time</th>
                      <th>Play Online or Download</th>
                      <th></th>
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
                           <td> <?php echo $row['text']; ?> </td>
                           <td> <?php echo $row['byy']; ?> </td>
                               <td> <?php echo $row['created_at']; ?> </td>
                               <td class="text-center"><a href="play.php?name=<?php echo $row['filename'];?>" class="btn btn-primary btn-sm"><i class="fa fa-play"></i></a>
                               </td>
                               <td>
                                <form action="delete.php" method="post">
                                  <input type="hidden" name="delete_user" value="<?php echo $row['id']; ?>">
                                 <button type = "submit" name='delete_btn' class="btn btn-danger"> DELETE</button>
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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>





<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Gec Audiobook 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>

