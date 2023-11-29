<?php 

session_start();
	// cek apakah yang mengakses halaman ini sudah login

	if($_SESSION['level']==""){
		header("location:login.php?pesan=login_dulu_kakak^^");
	}
    $_SESSION['table'] = 'user';
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    $users = include('show-users.php');
 
	?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>tendaBiru - Stock</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="scss/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        .list-stock-Field {
        flex: 0 0 100%;
        padding: 20px;
        }

        .stocks {
        margin-right: 2rem;
        }

        .stocks table,
        th,
        td {
        border: 1px solid #00a6ffc0;
        border-collapse: collapse;
        }

        .stocks table {
        margin-left: 1rem;
        width: 100%;
        }

        .stocks table th {
        font-size: 1.2rem;
        font-weight: 700;
        text-transform: uppercase;
        background-color: #e7e7e7;
        text-align: center;
        }

        .stocks table td {
        font-size: 1rem;
        text-transform: capitalize;
        text-align: center;
        }

        .btn-addstock {
            margin-right: 1rem;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">tenda <sup>Biru</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Stock -->
            <li class="nav-item active">
                <a class="nav-link" href="stock.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Stock</span></a>
            </li>

            <!-- Nav Item - Orders -->
            <li class="nav-item">
                <a class="nav-link" href="orders.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Orders</span></a>
            </li>

                 <!-- Nav Item - Delivery -->
                 <li class="nav-item">
                <a class="nav-link" href="delivery.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Delivery</span></a>
            </li>

                 <!-- Nav Item - Inventory Report -->
                 <li class="nav-item">
                <a class="nav-link" href="inventoryReport.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Inventory Report</span></a>
            </li>

                 <!-- Nav Item - Daily usage -->
                 <li class="nav-item">
                <a class="nav-link" href="dailyUsage.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Daily usage</span></a>
            </li>

                <!-- Nav Item - User Management -->
                 <li class="nav-item">
                <a class="nav-link" href="usermanagement.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User Management</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="list-stock-Field">
                        <div class="content-title d-flex justify-content-between align-items-center">
                            <h2 href="">
                                <i class="fas fa-fw fa-table"></i>List Stock
                            </h2>
                            <button class="btn btn-primary btn-addstock" data-toggle="modal" data-target="#add-stockModal">Tambah Stock</button>
                        </div>
                        <div class="section_content">
                            <div class="stocks">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <!-- <th>Gambar</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Created by</th>
                                            <th>created at</th>
                                            <th>Update At</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $index => $user){ ?>
                                            <tr>
                                                <td><?= $index +1 ?></td>
                                                <td class="firstname"><?= $user['lastName'] ?></td>
                                                <td class="lastname"><?= $user['firstName'] ?> </td>
                                                <!-- <td class="username"><?= $user['username'] ?></td>
                                                <td class="level"><?= $user['level'] ?></td>
                                                <td class="level"><?= $user['level'] ?></td>
                                                <td class="level"><?= $user['level'] ?></td>
                                                <td class="level"><?= $user['level'] ?></td> -->
                                                <td >
                                                    <a href="#" data-toggle="modal" class="updateUser" data-target="#editModal"
                                                    data-userid="<?= $user['id'] ?>"
                                                    ><i class="fa-solid fa-pencil" ></i> Edit</a>
                                                    <a href="" class="deleteUser" 
                                                    data-userid="<?= $user['id'] ?>"
                                                    data-fname="<?= $user['firstName'] ?>"
                                                    data-lname="<?= $user['lastName'] ?>"
                                                    ><i class="fa-solid fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Add Modal -->
    <div class="modal fade" id="add-stockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Produk Baru</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="user-add.php" class="add-user" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="productName">Masukan Nama Produk</label>
                                    <input type="text" id="productName" name="productName" class="form-control" placeholder="Nama Produk" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Masukan Deskripsi</label>
                                    <textarea type="text" id="description" name="description" class="form-control" placeholder="Deskripsi" required></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="username">Input Username</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Input Password</label>
                                    <input type="text" id="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="level">Select Role</label>
                                    <select id="level" name="level" class="form-control">
                                        <option>Manager</option>
                                        <option>Staff</option>
                                        <option>Supplier</option>
                                    </select>
                                </div>            -->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" data-target="#addSuccess">Add Produk</button>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                            if(isset($_SESSION['response'])) {
                                $response_message = $_SESSION['response']['message'];
                                $is_success = $_SESSION['response']['success'];
                        ?>
                        <div class="responseMessage">
                            <p class="<?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                <?= $response_message ?>
                            </p>
                        </div>
                        <?php  unset($_SESSION['response']); } ?>
                    </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">#TITLE#</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modalBody">
            #message#
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">OK</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal Notification -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalNotificationTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modalNotificationMessage">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Simpan Perubahan</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Script -->
    <script src="js/script.js"></script>
    <script>
    function Script() {
        this.initialize = function () {
            this.registerEvents();
        },

        this.registerEvents = function () {
            document.addEventListener('click', function (e) {
                targetElement = e.target
                var classList = targetElement.classList;
                


                if (classList.contains('deleteUser')) {
                    e.preventDefault();
                    userId =targetElement.dataset.userid;
                    fname =targetElement.dataset.fname;
                    lname =targetElement.dataset.lname;
                    fullName = fname + ' ' +lname;
                    

                    if(window.confirm('Are you sure to delete ' + fullName + ' ?')) {
                        $.ajax({
                            method: 'POST',
                            data: {
                                user_id:userId,
                                f_name:fname,
                                l_name:lname,
                            },
                            url: 'delete-user.php',
                            dataType: 'json',
                            success: function(data){
                                if(data.success){                 
                                        $('#modalNotificationTitle').text('SUCCESS');
                                        $('#modalNotificationMessage').text(data.message);
                                        $('#notificationModal').modal('show');
                                        $('#notificationModal').find('.btn-primary').click(function () {
                                            location.reload();
                                        });                                   
                                } else window.alert(data.message)
                            }
                        })
                    } else {
                        console.log('will not delete');
                    }
                }

                

                if (classList.contains('updateUser')) {
                    e.preventDefault();
                    
                    firstname = targetElement.closest('tr'). querySelector('td.firstname').innerHTML;
                    lastname = targetElement.closest('tr'). querySelector('td.lastname').innerHTML;
                    username = targetElement.closest('tr'). querySelector('td.username').innerHTML;
                    //level = targetElement.closest('tr'). querySelector('td.level').innerHTML;
                    userId = targetElement.dataset.userid;

                    $('#modalTitle').text('Update User ' + firstname + ' ' + lastname + ' ?');
                    $('#modalBody').html(`
                        <form>
                            <div class="form-group">
                                <label for="firstname" class="col-form-label">First Name:</label>
                                <input type="text" class="form-control" id="firstnameUp" value="${firstname}">
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastnameUp" value="${lastname}">
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-form-label">Username:</label>
                                <input type="text" class="form-control" id="usernameUp" value="${username}">
                            </div>
                        </form>
                    `);

                    $('#editModal').find('.btn-primary').click(function () {
                        // Your callback logic here
                        var isUpdate = true; // You may need to determine this based on user action
                        callback(isUpdate);
                    });

                    function callback(isUpdate) {
                        if (isUpdate) { // if the user clicks the 'OK' button.
                            $.ajax({
                                method: 'POST',
                                data: {
                                    userId: userId,
                                    f_name: document.getElementById('firstnameUp').value,
                                    l_name: document.getElementById('lastnameUp').value,
                                    username: document.getElementById('usernameUp').value,
                                    //level: document.getElementById('level').value,
                                },
                                url: 'update-user.php', // Replace with the actual URL for your server-side script
                                dataType: 'json',
                                success: function (data) {
                                    if (data.success) {
                                        $('#editModal').modal('hide');
                                        $('#modalNotificationTitle').text('SUCCESS');
                                        $('#modalNotificationMessage').text('User berhasil Diperbarui');
                                        $('#notificationModal').modal('show');
                                        $('#notificationModal').find('.btn-primary').click(function () {
                                            location.reload();
                                        });

                                    } else {
                                        $('#editModal').modal('hide');
                                        $('#modalNotificationTitle').text('GAGAL');
                                        $('#modalNotificationMessage').text('User gagal Diperbarui');
                                        $('#notificationModal').modal('show');
                                    }
                                },
                            });
                        }
                    }

                }
            });
        }
    }

    var scriptInstance = new Script();
    scriptInstance.initialize();
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>