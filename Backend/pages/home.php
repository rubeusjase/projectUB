<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Absensi</title>
    <style>
        table {
            margin-top: 20px;
        }
        select {
            width: 150px;
            font-weight: bold;
            padding: 6px;
        }
    </style>
</head>
<body>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v" style="font-size: 20px;"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" onclick="toggleFullscreen()">
                    <i class="fas fa-expand fa-sm fa-fw mr-2 text-gray-400"></i>
                    Fullscreen
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
<!-- End of Topbar -->

    <!-- Edit Home -->
    <div class="container">
        <h4 class="mt-4 mb-4 text-center bg-cyan text-white p-2">Edit Home</h4>
        <form  method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=home'; ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="judul">Judul:</label>
                    <textarea type="text" class="form-control" id="judul" name="judul" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>
            </div>
            <input type="hidden" name="id" value="-1">
            <input type="hidden" name="aksi" value="new">
            <button type="submit" class="btn btn-primary mb-3">Tambahkan</button>
        </form>

        <?php
            $hsl = $usr->bacaTabelAll('home');
            if(mysqli_num_rows($hsl) > 0) {
        ?>
                <div class="table-responsive container">
                    <!-- Tabel untuk menampilkan data home -->
                    <table id="example1" class="table table-bordered text-center table-striped">
                        <thead class="bg-cyan">
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Dibuat</th>
                                <th style="width: 50px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_array($hsl)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><?php echo $row['deskripsi']; ?></td>
                                        <td><?php echo $row['created_at']; ?></td>
                                        <td>
                                            <button 
                                                title="Edit"
                                                class="btn btn-sm btn-outline-success"
                                                data-toggle="modal"
                                                data-target="#modaledit<?php echo $row['id']; ?>">
                                                <i class="fas fa-user-edit"></i>
                                            </button>

                                                <button 
                                                    title="Delete"
                                                    class="btn btn-sm btn-outline-danger"
                                                    data-toggle="modal"
                                                    data-target="#modaldelete<?php echo $row['id']; ?>">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </td>
                                    </tr>

                        <!-- modal delete -->
                        <div class="modal fade" id="modaldelete<?php echo $row['id']; ?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h3>DELETE DATA</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="perta">Judul: <?php echo $row['judul'] ?> </label>
                                        <h6>Apakah Data ini ingin dihapus?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="<?php echo $_SERVER["PHP_SELF"]."?page=home" ?>" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="aksi" value="delete">
                                            <button type="submit" class="btn btn-sm btn-danger">Yes</button>
                                            <button 
                                                type="button" class="btn btn-sm btn-primary" 
                                                data-dismiss="modal" aria-label="Close">
                                                No
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal delete-->

                        <!-- modal edit -->
                        <div class="modal fade" id="modaledit<?php echo $row['id']; ?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h3>EDIT DATA</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo $_SERVER["PHP_SELF"]."?page=home"?>" method="POST" enctype="multipart/form-data">                                            
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="judul">Judul:</label>
                                                            <input 
                                                            type="text" 
                                                            class="form-control" 
                                                            id="judul" 
                                                            name="judul"
                                                            placeholder="Ketikkan judul"
                                                            value="<?php echo $row['judul']?>"
                                                            required
                                                            >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="deskripsi">Deskripsi:</label>
                                                            <textarea 
                                                            type="text" 
                                                            class="form-control" 
                                                            id="deskripsi" 
                                                            name="deskripsi"
                                                            placeholder="Ketikkan deskripsi"
                                                            value="<?php echo $row['deskripsi']?>"
                                                            required
                                                            ></textarea>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col text-center">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <input type="hidden" name="aksi" value="edit">
                                                        <button style="width: 100%; margin-right: 320px;" type="submit" class="btn btn-sm btn-primary">Yes</button>
                                                        <button 
                                                            type="button" class="btn btn-sm btn-danger" style="width: 100%; margin-top: 5px;"
                                                            data-dismiss="modal" aria-label="Close">
                                                            No
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <!-- end modal edit-->
                                        
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
        <?php
            }
        ?> 
    </div>

    <script>
        // Fungsi untuk masuk/keluar fullscreen untuk seluruh halaman
        function toggleFullscreen() {
        if (document.fullscreenElement) {
            document.exitFullscreen(); // Keluar dari mode fullscreen
        } else {
            let element = document.documentElement;

            if (element.requestFullscreen) {
            element.requestFullscreen();
            } else if (element.mozRequestFullScreen) { // Firefox
            element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) { // Chrome, Safari, Opera
            element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) { // Internet Explorer
            element.msRequestFullscreen();
            }
        }
        }
    </script>
</body>
</html>

<?php
    include_once('./services/authservice.php');
    $home = new AuthService();  //instance class AuthService

    if(isset($_POST['aksi'])) {
        $aksi=$_POST['aksi'];
        switch($aksi) {
            case 'new': //menambahkan data home
                $dthome = [
                    'id'        => $_POST['id'],
                    'judul'  => $_POST['judul'],   
                    'deskripsi'  => $_POST['deskripsi'],           
                ];

                $aksi = $_POST['aksi'];
                
                $hsl=$home->Savehome($dthome, $aksi);
                
                if($hsl){
                    header("Refresh:0");
                }
                break;

            case 'edit': //edit data home
                $dthome = [
                    'id'        => $_POST['id'],
                    'judul'  => $_POST['judul'],   
                    'deskripsi'  => $_POST['deskripsi'],           
                ];
                
                $aksi = $_POST['aksi'];
                
                $hsl=$home->Savehome($dthome, $aksi);
                
                if($hsl){
                    header("Refresh:0");
                }
                break;
            case 'delete': //hapus data home
                $id = $_POST['id'];
                $hsl=$home->deletehome($id,'delete');
                if($hsl){
                    header("Refresh:0");
                }
                break;
        }
    }
?>

