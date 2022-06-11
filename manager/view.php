<?php
session_start();
require "../connection/connection.php";
require "../func/redirect.php";
function isUserAuthenticated(){
    if(!$_SESSION["auth"]){
        redirect("../login.php?unauthorized");
    }
}
isUserAuthenticated();


isUserAuthenticated();
$firstname = $_SESSION["firstname"];
$lastname = $_SESSION["lastname"];







?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medic - View Manger</title>
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">


    <div id="wrapper">


        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-file-medical-alt    "></i>
                </div>
                <div class="sidebar-brand-text mx-3">MEDIC</div>
            </a>


            <hr class="sidebar-divider my-0">


            <li class="nav-item ">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <hr class="sidebar-divider">


            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-fw fa-user"></i>
                    <span>Pharmacist</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pharmacist Options</h6>
                        <a class="collapse-item" href="../pharmacist/add.php">Add Pharmacist</a>
                        <a class="collapse-item" href="../pharmacist/view.php">View Pharmacists</a>
                    </div>
                </div>
            </li>


            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-fw fa-user-plus"></i>
                    <span>Manager</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manager Options</h6>
                        <a class="collapse-item" href="add.php">Add Manager</a>
                        <a class="collapse-item" href="view.php">View Managers</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCasher" aria-expanded="true" aria-controls="collapseCasher">
                    <i class="fas fa-fw fa-dollar-sign    "></i>
                    <span>Casher</span>
                </a>
                <div id="collapseCasher" class="collapse" aria-labelledby="headingCasher" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Casher Options</h6>
                        <a class="collapse-item" href="../casher/add.php">Add Casher</a>
                        <a class="collapse-item" href="../casher/view.php">View Cashers</a>
                    </div>
                </div>
            </li>


            <hr class="sidebar-divider">


            <div class="sidebar-heading">
                Data
            </div>


            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Stock</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Out Of Stock</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                    <span>Expire Soon</span></a>
            </li>


            <hr class="sidebar-divider d-none d-md-block">


            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>

        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">


                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h5>Pharmacy Management System</h5>

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>





                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo "$firstname" . " " . "$lastname"; ?>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">
                    <div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Athul Vinod Medic 2022</span>
                    </div>
                </div>
            </footer>

        </div>






    </div>


    </div>



    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


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
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>

<script>
    var table = $('#dataTable').dataTable({
        ajax: {
            url: "data.php",
            dataSrc: "",
            type: "POST",
            data: function(e) {
                return JSON.stringify(e)

            }
        },
        fnCreateRow: function(nRow, aData, iDataIndex) {
            $(nRow).attr("id", aData[0])
        },
    


    });

    function deleteUser(id){
        if(confirm("Are you sure you want to delete this user?")){
             $.ajax({
                url:"delete.php?id="+id,
                method:"post",
                success(data){
                    alert(data);
                    window.location.reload();
                }    
             })
        }
    }
</script>