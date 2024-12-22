<?php
    include_once('../../Backend/services/authservice.php');
    $usr = new AuthService();
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>MindCareHub - Blog-Single.</title>
		
		<!-- Favicon -->
        <link rel="icon" href="../img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="../css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="../css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="../css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="../css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="../css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="../css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="../css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="../css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../css/responsive.css">
		<style>
			.logo {
				font-size: 30px;
				margin: 0;
				padding: 0;
				line-height: 1;
				font-weight: 700;
				letter-spacing: 0.5px;
				font-family: "Poppins", sans-serif;
			}
			.logo a {
				color: #2c4964;
			}
			.logo img {
				max-height: 40px;
				}
		</style>
		
    </head>
    <body>
	
		<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
	
		<!-- Header Area -->
		<header class="header" >
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<h1 class="logo me-auto"><a href="index.php">MindCareHub</a></h1>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-12 mb-2">
								<div class="get-quote">
									<a href="../index.php" class="btn">Back To Home</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		
		<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Blog Single</h2>
							<ul class="bread-list">
								<li><a href="index.php">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Blog</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Single News -->
		<section class="news-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="row">
							<div class="col-12">
								<div class="single-main">
								<?php
									$hsl = $usr->bacaTabelAll('blog');
									if(mysqli_num_rows($hsl) > 0) {
								?>
								<?php
									while($row = mysqli_fetch_array($hsl)) {
								?>
									<!-- News Head -->
									<div class="news-head">
										<img src="../../Backend/assets/<?php echo  $row['foto'] ?>" alt="#">
									</div>
									<!-- News Title -->
									<h1 class="news-title"><?php echo $row['judul']; ?></h1>
									<!-- News Text -->
									<div class="news-text">
										<p><?php echo $row['deskripsi']; ?></p>
										<div class="image-gallery">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-12">
													<div class="single-image">
														<img src="../img/blog2.jpg" alt="#">
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-12">
													<div class="single-image">
														<img src="../img/blog3.jpg" alt="#">
													</div>
												</div>
											</div>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam.</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non commodo et, sodales id dui.</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum consequat, pretium pretium nulla. Suspendisse</p>
									</div>
									<div class="blog-bottom">
										<!-- Social Share -->
										<ul class="social-share">
											<li class="facebook"><a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
											<li class="twitter"><a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
											<li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
											<li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
										</ul>
										<!-- Next Prev -->
										<ul class="prev-next">
											<li class="prev"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
											<li class="next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
										</ul>
										<!--/ End Next Prev -->
									</div>
									<?php
										}
									?>
									<?php
										}
									?> 
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="main-sidebar">
							<!-- Single Widget -->
							<div class="single-widget category">
								<h3 class="title">Blog Categories</h3>
								<ul class="categor-list">
									<li><a href="#">Therapy Works</a></li>
									<li><a href="#">Self Compassion</a></li>
									<li><a href="#">Emotional Health</a></li>
									<li><a href="#">MentalHealthMatters</a></li>
									<li><a href="#">Positive Vibes</a></li>
								</ul>
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget recent-post">
								<h3 class="title">Recent post</h3>
								<!-- Single Post -->
								<div class="single-post">
									<div class="image">
										<img src="../img/blog-sidebar1.jpg" alt="#">
									</div>
									<div class="content">
										<h5><a href="#">We have annnocuced our new product.</a></h5>
										<ul class="comment">
											<li><i class="fa fa-calendar" aria-hidden="true"></i>Jan 11, 2020</li>
											<li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</li>
										</ul>
									</div>
								</div>
								<!-- End Single Post -->
								<!-- Single Post -->
								<div class="single-post">
									<div class="image">
										<img src="../img/blog-sidebar2.jpg" alt="#">
									</div>
									<div class="content">
										<h5><a href="#">Top five way for solving teeth problems.</a></h5>
										<ul class="comment">
											<li><i class="fa fa-calendar" aria-hidden="true"></i>Mar 05, 2019</li>
											<li><i class="fa fa-commenting-o" aria-hidden="true"></i>59</li>
										</ul>
									</div>
								</div>
								<!-- End Single Post -->
								<!-- Single Post -->
								<div class="single-post">
									<div class="image">
										<img src="../img/blog-sidebar3.jpg" alt="#">
									</div>
									<div class="content">
										<h5><a href="#">We provide highly business soliutions.</a></h5>
										<ul class="comment">
											<li><i class="fa fa-calendar" aria-hidden="true"></i>June 09, 2019</li>
											<li><i class="fa fa-commenting-o" aria-hidden="true"></i>44</li>
										</ul>
									</div>
								</div>
								<!-- End Single Post -->
							</div>
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<!--/ End Single Widget -->
							<!-- Single Widget -->
							<div class="single-widget side-tags">
								<h3 class="title">Tags</h3>
								<ul class="tag">
									<li><a href="#">PositiveVibes</a></li>
									<li><a href="#">MentalHealth</a></li>
									<li><a href="#">SelfCare</a></li>
									<li><a href="#">Mindfulness</a></li>
									<li><a href="#">Education</a></li>
									<li><a href="#">TherapyWorks</a></li>
									<li><a href="#">MentalHealthMatters</a></li>
								</ul>
							</div>
							<!--/ End Single Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Single News -->
		
		<!-- jquery Min JS -->
        <script src="../js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="../js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="../js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="../js/easing.js"></script>
		<!-- Color JS -->
		<script src="../js/colors.js"></script>
		<!-- Popper JS -->
		<script src="../js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="../js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="../js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="../js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="../js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="../js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="../js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="../js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<!-- Steller JS -->
		<script src="../js/steller.js"></script>
		<!-- Wow JS -->
		<script src="../js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="../js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="../js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="../js/main.js"></script>
    </body>
</html>