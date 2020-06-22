<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>
        MedPlus+
    </title>

    <link rel="icon" type="image/png" href="./assets/img/favicon1.png">
    <link rel="stylesheet" type="text/css" href="./assets/css/login.css">

    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
	<div class="wrapper">
        <div class="loginwrapper">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <img id="doc_img" class="loginAvatars" src="assets/img/doc_avatar.png">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <img id="recp_img" class="loginAvatars"  src="assets/img/phar_avatar.png">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <img id="pat_img" class="loginAvatars"  src="assets/img/admin_avatar4.png">
                </div>
            </div>
        </div>
    </div>

    <div id="doc_modal" class="modal">
		<div class="container " id="log_card" >
			<div class="card">
				<div class="avatarDiv">
					<img src="./assets/img/doc_avatar.png" class="avatar" >
				</div>
				<div class="card-body">
					<form class="form-group" action="./assets/functions/func.php" method="post">
						<label><b>Username </b>:</label><br>
						<input type="text" name="username" class="form-control" placeholder="Enter Username"><br>
						<label><b>Password </b>:</label>
						<input type="password" name="password" class="form-control" placeholder="Enter Password"><br>
						<button name="doc_login" class="btn btn-primary btn-block">Login</button>
						<label><br><input type="checkbox" checked="checked" name="Remember">Remember me</label><br><br>

						<span>Forgot <a href="index.php">Password</a>?</span>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="phar_modal" class="modal">
		<div class="container " id="log_card">
			<div class="card">
				<div class="avatarDiv">
					<img src="./assets/img/phar_avatar.png" class="avatar" >
				</div>
				<div class="card-body">
					<form class="form-group" action="./assets/functions/func.php" method="post">
						<label><b>Username </b>:</label><br>
						<input type="text" name="username" class="form-control" placeholder="Enter Username"><br>
						<label><b>Password </b>:</label>
						<input type="password" name="password" class="form-control" placeholder="Enter Password"><br>
						<button name="phar_login" class="btn btn-primary btn-block">Login</button>
						<label><br><input type="checkbox" checked="checked" name="Remember">Remember me</label><br><br>

						<span>Forgot <a href="index.php">Password</a>?</span>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="admin_modal" class="modal">
		<div class="container" id="log_card">
			<div class="card">
				<div class="avatarDiv">
					<img src="./assets/img/admin_avatar4.png" class="avatar">
				</div>
				<div class="card-body">
					<form class="form-group" action="./assets/functions/func.php" method="post">
						<label><b>Username </b>:</label><br>
						<input type="text" name="username" class="form-control" placeholder="Enter Username"><br>
						<label><b>Password </b>:</label>
						<input type="password" name="password" class="form-control" placeholder="Enter Password"><br>
						<button name="admin_login" class="btn btn-primary btn-block">Login</button>
						<label><br><input type="checkbox" checked="checked" name="Remember">Remember me</label><br><br>

						<span>Forgot <a href="index.php">Password</a>?</span>
					</form>
				</div>
			</div>
		</div>
	</div>

    <script>
		var doc_modal = document.getElementById("doc_modal");
		var doc_open = document.getElementById("doc_img");
		doc_open.onclick = function(){
			doc_modal.style.display = "block";
			var modal = doc_modal;
		}

		var phar_modal = document.getElementById("phar_modal");
		var recp_open = document.getElementById("recp_img");
		recp_open.onclick = function(){
		  phar_modal.style.display = "block";
		}

		var admin_modal = document.getElementById("admin_modal");
		var pat_open = document.getElementById("pat_img");
		pat_open.onclick = function(){
		  admin_modal.style.display = "block";
		}

		window.onclick = function(event) {
			if (event.target == doc_modal || event.target == phar_modal || event.target == admin_modal) {
				doc_modal.style.display = "none";
				phar_modal.style.display = "none";
				admin_modal.style.display = "none";
			}
		}

    </script>
    
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>

</body>

</html>

