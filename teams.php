<?php
include './src/head.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include './src/sidebar.php';


        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include './src/nav.php'
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid d-flex mt-4" style="gap: 1rem; ">
                    <div class="col-6  ">
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Team_Name</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $teamsSQL = "SELECT * FROM `teams`";
                                    $teams = mysqli_query($conn , $teamsSQL);

                                    while($row = mysqli_fetch_assoc($teams)):
                                    $id = $row['team_id'];
                                    $name = $row['team_name'];
                                    ?>
                                        <tr>
                                        <th scope="row"><?= $id ?></th>
                                        <td><?= $name ?></td>
                                        <td>
                                            <a class="btn btn-info" href="teams.php?edit=<?=$id?>">Edit</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="teams.php?del =<?=$id?>">Delete</a>
                                        </td>
                                    </tr>

                                     <?php endwhile; ?>
                                    

                                </tbody>
                                <?php
                                if(isset($_GET['del'])){
                                    $del_id = $_GET['del'];
                                    $delteamSQL = "DELETE FROM `teams` WHERE `$id` = '$del_id' ";
                                    $delete = mysqli_query($conn , $delteamSQL);
                                    header("Location:teams.php");
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class=" col-6 ">
                        <div class="card p-3 text-center">
                            <form action="" method="post">
                                <Label>
                                    <h2>Add New Team</h2>
                                </Label>
                                <input type="text" name="team_name" class="form-control" placeholder="Enter Team Name...">
                                <br>
                                <br>
                                <button class="btn btn-success" name="add_team" type="submit">Add Team</button>
                            </form>
                            <?php
                            if(isset($_POST['add_team'])){
                                $team_name = $_POST['team_name'];
                                $addteamSQL = "INSERT INTO `teams` (`team_name`) VALUE('$team_name')";
                                $create = mysqli_query($conn , $addteamSQL);
                                header("Location:teams.php");
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include './src/footer.php';
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>