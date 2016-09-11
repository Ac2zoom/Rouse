<?php
include "rouse.php";
$first_name = $last_name = $email = $password_hash = $phone = $interests = $personalgoals = "";

if(isset($_POST['add'])) {
	$m = new MongoClient("mongodb://main:rouse@ds029456.mlab.com:29456/rouse");
	if (!$m) {
		echo "Could not connect to MongoDB";
	} else {
		$db = $m->rouse;
        $collection = $db->users;
		$first_name = $_POST['firstname'];
		$phone = $_POST['phonenumber'];
		$personalgoals = $_POST['personalgoals'];
		$interests = $_POST['expl'];
        $ret = register($collection, $first_name, $_POST['lastname'], $_POST['email'],
                 hash("sha256", $_POST['password']), $phone, $interests,
                 $personalgoals);
        if (strcmp($ret, "Success") === 0) {
            header("Location: http://localhost:8000/main_page.php?first_name=" . $first_name .
			"&phonenumber=" . $phone . "&personalgoals=" . $personalgoals . "&interests=" .
			$interests);
        } else {
            echo $ret;
        }
	}
} else if(isset($_POST['login'])) {
	$m = new MongoClient("mongodb://main:rouse@ds029456.mlab.com:29456/rouse");
	if (!$m) {
		echo "Could not connect to MongoDB";
	} else {
		$db = $m->rouse;
        $collection = $db->users;
        $ret = register($collection, $_POST['email'], hash("sha256", $_POST['password']));
        if (strcmp($ret, "Incorrect Password") !== 0) {
            header("Location: http://localhost:8000/main_page.php?first_name=" . $first_name .
			"&phonenumber=" . $phone . "&personalgoals=" . $personalgoals . "&interests=" .
			$interests);
        } else {
            echo $ret;
        }
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Rouse </title>

        <!-- Bootstrap Core CSS -->
		<link href="startbootstrap-new-age/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="startbootstrap-new-age/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="startbootstrap-new-age/vendor/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="startbootstrap-new-age/vendor/device-mockups/device-mockups.min.css">

        <!-- Theme CSS -->
        <link href="startbootstrap-new-age/css/new-age.min.css" rel="stylesheet">
	</head>
	<body ng-app="pennapps" ng-controller="MainCtrl">
		<div class="col-md-6 col-md-offset-3">
			<div class = "page-header text-center" style="font-size:55px; color:black;">
				Welcome to Rouse
			</div>
			<div class="horizontal-tab">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="false">Login</a></li>
					<li class=""><a href="#tab3" data-toggle="tab" aria-expanded="false">Sign up</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane" id="tab3">
						<div class="contact-form">
							<form method="post" action="<?php $_PHP_SELF ?>">
								<div class="row">
									<div class="col-md-5">
										<br> <br>
										<input type="text" input name="firstname" class="form-control" placeholder="First Name" ng-model="last" id="firstname" />
										<br>
										<input type="text" input name="lastname" class="form-control" placeholder="Last Name" ng-model="last" id="lastname" />
										<br>
										<input type="text" input name="email" class="form-control" placeholder="E-mail" ng-model="last" id="email" />
										<br>
										<input type="password" input name="password" class="form-control" placeholder="Password" ng-model="last" id="password" />
										<br>
										<input type = "text" input name="phonenumber" class = "form-control" placeholder="Your cell" ng-model="last" id="phonenumber"/>
										<br>
										<select class="form-control" input name="expl" id="expl" >
											<option type="text" class="form-control" placeholder="None" ng-model="none" /> Select from the following </option>
											<option type="text" class="form-control" placeholder="Programming" ng-model="none" /> Programming </option>
											<option type="text" class="form-control" placeholder="Music" ng-model="none" /> Music </option>
											<option type="text" class="form-control" placeholder="Sports" ng-model="none" /> Sports </option>
										</select>
										<br>
										<input type = "text" input name="personalgoals" class = "form-control" placeholder="What are some of your goals?" ng-model="last" id="personalgoals" />
										<br>
										<button type="submit" name="add" class="btn btn-primary" id="add" value = "submit" ng-click="submit">Login</button>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="tab-pane active in" id="tab1">
						<div class="contact-form">
							<form method="post" action="<?php $_PHP_SELF ?>">
								<div class="row">
									<div class="col-md-5">
										<br> <br>
										<input type="text" input name="name1" class="form-control" placeholder="User Login" ng-model="last" id="name1" />
										<br>
										<input type="password" input name="name2" class="form-control" placeholder="Password" ng-model="last2" id="name2" />
										<br>
										<button type="submit" name="add" class="btn btn-primary" id="login" value = "submit" ng-click="submit">Login</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

        <!-- jQuery -->
        <script src="startbootstrap-new-age/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="startbootstrap-new-age/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Theme JavaScript -->
        <script src="startbootstrap-new-age/js/new-age.min.js"></script>
	</body>
</html>
