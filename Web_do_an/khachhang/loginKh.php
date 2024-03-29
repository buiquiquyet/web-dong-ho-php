
<!doctype html>
<?php
include "database.php";
global $db;
$db = new database();
?>
<html lang="en">
  <head>
  	<title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="../images/favicon.ico" type="image/favicon.ico" />


	</head>
	<body>
	<?php
								if(!isset($_SESSION)){
									session_start();
								   }

								   if(isset($_SESSION["user"])){
									header("location:index.php");
									//echo $_SESSION['user'];
								   }
								  
								if($_POST){
	
									$user_name=$_POST['taiKhoanKh'];
									$user_pass=md5($_POST['matKhau']);
									$result=$db->thucthi("SELECT * from khachhang where taiKhoanKh ='$user_name' and matKhau='$user_pass'");
									$row=mysqli_fetch_array($result);
									//var_dump($row);
									//die;
								
									if ($user_name == "" || $user_pass =="") {
										echo "<script>alert('Tên đăng nhập hoặc password bạn không được để trống!')</script>";
									}
									else if(is_array($row)){
									  //header("Location:customers.php");
									   echo"<script>alert('Đăng nhập thàng công!')</script>";
									 // header("Location: tables1.php");
									 $_SESSION["user"] = $row["taiKhoanKh"];
									 $ma =  $_SESSION["user"];
									 echo"<script>window.location.href ='index.php';</script>";

									 
									}else{
									 	echo "<script>alert('Tài khoản hoặc mật khẩu chưa đúng!')</script>";
									}
									}
									?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Đăng nhập</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/bg.jpg);"></div>
		      	<h3 class="text-center mb-0">Welcome To My Shop</h3>
		      	<p class="text-center"></p>
						<form action="loginKh.php"  method="post" class="login-form">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" class="form-control" name = "taiKhoanKh" placeholder="Tài Khoản" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" class="form-control" name = "matKhau" placeholder="Mật Khẩu" required>
	            </div>
	            <div class="form-group d-md-flex">
								<div class="w-100 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn form-control btn-primary rounded submit px-3">Get Started</button>
	            </div>
	          </form>
	          <div class="w-100 text-center mt-4 text">
	          	<a href="dangkiKh.php"><p class="mb-0">Don't have an account?</p></a>
		          <a href="index.php">Trang chủ</a>
	          </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

