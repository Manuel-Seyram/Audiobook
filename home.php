<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gec Audiobook</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">

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
              <h6 class="m-0 font-weight-bold text-primary">GEC AUDIOBOOK
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
                               <td class="text-center"><a href="admin/play.php?name=<?php echo $row['filename'];?>" class="btn btn-primary btn-sm"><i class="fa fa-play"></i></a>
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


