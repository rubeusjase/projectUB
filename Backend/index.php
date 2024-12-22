<?php
ob_start();
session_start();
//authguard page = melindungi sebuah halaman dari proses penerobosan tanpa login
if (isset($_SESSION['info'])) {
    if ($_SESSION['info'] == 'gagal') {
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}
//tambahkan class AuthService
include_once('services/authservice.php');
// include_once('services/heroservice.php');
$usr = new AuthService();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Single Page Application</title>
    <link href="img/favicon.png" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <style>
        h3:hover {
            color: white;
            font-weight: bold;
        }
        .custom-card {
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,0.15);
            width: 100%;
            height: 100%;
            background: url('img/landscape.jpg');
            background-size: cover;
            background-position: center;
        }
        .custom-text {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: black;
        }
    </style>
</head>

<body id="page-top">
    

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-cyan sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MINDCAREHUB</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider bg-white my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                <i class="fas fa-home"></i>
                <span>Home</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider bg-white my-0">
            <li class="nav-item">
                <a class="nav-link" href="?page=home">
                <i class="far fa-edit"></i>
                    <span>Edit Home</span>
                </a>
            </li>

            <!-- Nav Item - Keuangan Collapse Menu -->
            <hr class="sidebar-divider bg-white my-0">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-question"></i>
                    <span>Pertanyaan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pertanyaan:</h6>
                        <a class="collapse-item" href="?page=pertanyaan">Pertanyaan 1</a>
                        <a class="collapse-item" href="?page=pertanyaan2">Pertanyaan 2</a>
                        <a class="collapse-item" href="?page=pertanyaan3">Pertanyaan 3</a>
                        <a class="collapse-item" href="#">Pertanyaan 4</a>
                        <a class="collapse-item" href="#">Pertanyaan 5</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider bg-white my-0">
            <li class="nav-item">
                <a class="nav-link" href="?page=dokter">
                <i class="fas fa-user-md"></i>
                    <span>Konselor</span>
                </a>
            </li>

            <!-- Nav Item - Keuangan Collapse Menu -->
            <hr class="sidebar-divider bg-white my-0">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fab fa-blogger-b"></i>
                    <span>Blog</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Artikel:</h6>
                        <a class="collapse-item" href="?page=blog">Data Artikel 1</a>
                        <a class="collapse-item" href="?page=artikel2">Data Artikel 2</a>
                        <a class="collapse-item" href="?page=artikel3">Data Artikel 3</a>
                        <a class="collapse-item" href="#">Data Artikel 4</a>
                        <a class="collapse-item" href="#">Data Artikel 5</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider bg-white my-0">
            <li class="nav-item">
                <a class="nav-link" href="?page=kontak">
                <i class="fas fa-phone"></i>
                        <span>Kontak</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider bg-white d-none d-md-block">

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
                <?php
                if (isset($_GET['page'])) {
                    include 'pages/' . $_GET['page'] . '.php';
                } else {
                    echo '
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

                    <div class="d-flex min-vh-100">
                    <!-- Begin Page Content -->
                    <div class="container">

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Cuaca, Tanggal & Waktu -->
                            <div class=" col-md-6 mb-4 mt-2">
                                <div class="card card-bg custom-card p-4 text-center">
                                    <div class="d-flex justify-content-center align-items-center mb-4">
                                        <i class="fas fa-sun fa-3x mr-2 custom-icon" id="weather-icon" style="font-size: 40px; margin-right: 10px;"></i>
                                        <h1 class="display-4 mb-0 custom-text" id="time"></h1>
                                        <span class="h4 ml-1 custom-text" id="seconds"></span>
                                    </div>
                                    <p class="h5 mb-1 custom-text" id="date"></p>
                                    <p class="h5 mb-4 custom-text">Mental Health Care.</p>
                                </div>
                            </div>
                            <!-- end Cuaca, Tanggal & Waktu -->

                            <div class="col-md-6">
                                <!-- Jumlah Konselor -->
                                <div class="row">
                                    <div class="p-3 col-md-6 mb-4">
                                        <div class=" row align-items-center card border-left-primary shadow py-2 p-4 text-center">
                                            <div class="mb-1 h6 text-uppercase font-weight-bold text-primary">
                                                Jumlah Konselor
                                            </div>
                                            <div class="font-weight-bold h3 text-gray-800 mb-0">4</div>
                                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <!-- end Jumlah Konselor -->

                                    <!-- Jumlah Artikel -->
                                    <div class="p-3 col-md-6 mb-4">
                                        <div class="row align-items-center card border-left-success shadow py-2 p-4 text-center">
                                            <div class="mb-1 h6 font-weight-bold text-success text-uppercase">
                                                Jumlah Artikel
                                            </div>
                                            <div class="font-weight-bold h3 text-gray-800 mb-0">6</div>
                                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <!-- end Jumlah Artikel -->

                                    <!-- Jumlah Video -->
                                    <div class="p-3 col-md-6 mb-4">
                                        <div class="row align-items-center card border-left-info shadow py-2 p-4 text-center">
                                            <div class="mb-1 h6 font-weight-bold text-info text-uppercase">
                                                Jumlah Video
                                            </div>
                                            <div class="font-weight-bold h3 text-gray-800 mb-0">1</div>
                                            <i class="fas fa-photo-video fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <!-- end Jumlah Video -->

                                    <!-- Jumlah Sosmed -->
                                    <div class="p-3 col-md-6 mb-4">
                                        <div class="row align-items-center card border-left-warning shadow py-2 p-4 text-center">
                                            <div class="mb-1 h6 font-weight-bold text-warning text-uppercase">
                                                Jumlah Sosmed
                                            </div>
                                            <div class="font-weight-bold h3 text-gray-800 mb-0">4</div>
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <!-- end Jumlah Sosmed -->
                                </div>
                            </div>
                        </div>
                        <!-- end Content Row -->
                    </div>

                </div>';
                }
                ?>
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
                    <div class="modal-header bg-cyan">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Apakah Anda Yakin Ingin Keluar?</div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                        <a class="btn btn-primary" href="logout.php">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/jszip/jszip.min.js"></script>
        <script src="plugins/pdfmake/pdfmake.min.js"></script>
        <script src="plugins/pdfmake/vfs_fonts.js"></script>
        <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>

<script>
        // Function to update time
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('time').textContent = `${hours}:${minutes}`;
            document.getElementById('seconds').textContent = seconds;
        }

        // Function to update date
        function updateDate() {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' };
            const formattedDate = now.toLocaleDateString('id-ID', options);
            document.getElementById('date').textContent = formattedDate;
        }

        // Function to fetch weather data
        async function fetchWeather() {
            const apiKey = '111a45d5acf76aee964532a705b24d9d';
            const city = 'Malang';
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

            try {
                const response = await fetch(url);
                const data = await response.json();
                const weatherIcon = data.weather[0].icon;
                const weatherDescription = data.weather[0].description;

                document.getElementById('weather-icon').className = `fas fa-${getWeatherIcon(weatherIcon)} text-4xl`;
                document.getElementById('weather-description').textContent = weatherDescription;
            } catch (error) {
                console.error('Error fetching weather data:', error);
            }
        }

        // Function to map OpenWeatherMap icons to FontAwesome icons
        function getWeatherIcon(icon) {
            const iconMap = {
                '01d': 'sun',
                '01n': 'moon',
                '02d': 'cloud-sun',
                '02n': 'cloud-moon',
                '03d': 'cloud',
                '03n': 'cloud',
                '04d': 'cloud-meatball',
                '04n': 'cloud-meatball',
                '09d': 'cloud-showers-heavy',
                '09n': 'cloud-showers-heavy',
                '10d': 'cloud-sun-rain',
                '10n': 'cloud-moon-rain',
                '11d': 'bolt',
                '11n': 'bolt',
                '13d': 'snowflake',
                '13n': 'snowflake',
                '50d': 'smog',
                '50n': 'smog'
            };
            return iconMap[icon] || 'sun';
        }

        // Update time and date every second
        setInterval(updateTime, 1000);
        setInterval (updateDate, 1000);

        // Fetch weather data on page load
        fetchWeather();
    </script>

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