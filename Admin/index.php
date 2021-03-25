<?php
include('includes/header.php');
include('includes/navbar.php');
include('security.php');
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Number of Admins</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                        require 'dbconnection.php';
                        $query= "SELECT id FROM users ORDER BY id";
                        $query_run= mysqli_query($link, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1>'.$row.'</h1>';

                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Number of Uploads</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                        
                        $query= "SELECT id FROM audio ORDER BY id";
                        $query_run= mysqli_query($link, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1>'.$row.'</h1>';

                        ?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            







<?php
include('includes/footer.php');
include('includes/scripts.php')
?>
