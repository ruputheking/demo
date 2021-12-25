<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>CRUD Application</title>
	<link rel="stylesheet" href="/aamaya/plugins/fontawesome/css/all.css">
	<!-- DataTable -->
	<link href="/aamaya/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
	<!--  Notifications Plugin    -->
	<link href="/aamaya/plugins/toastr/css/toastr.css" rel="stylesheet">
	<style media="screen">
		.required {
			color: red;
		}
	</style>
</head>

<body class="body">
	<!-- Main Modal -->
	<div id="main_modal" class="modal animated bounceInDown" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="modal-btn btn btn-danger btn-sm float-end" data-bs-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> Exit</button>
				</div>
				<div class="alert alert-danger" style="display:none; margin: 15px;"></div>
				<div class="alert alert-success" style="display:none; margin: 15px;"></div>
				<div class="modal-body" style="overflow:hidden;"></div>
			</div>

		</div>
	</div>
	<div id="preloader">
		<div class="bar"></div>
	</div>

	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="/aamaya/index.php">Navbar</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse float-end" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<div id="attendance-data">

						</div>
						<li class="nav-item dropdown">
				          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				            More
				          </a>
				          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: auto; right: 0">
							  <li>
							  	<a class="dropdown-item" aria-current="page" href="index.php">Catagory</a>
							  </li>
							  <li>
							  	<a class="dropdown-item" href="/aamaya/menu">Menus List</a>
							  </li>
							  <li>
							  	<a class="dropdown-item" href="/aamaya/attendances">Attendances Report</a>
							  </li>
							  <li>
							  	<a class="dropdown-item" href="/aamaya/backend/leavetypes">Leave Types</a>
							  </li>
							  <li>
							  	<a class="dropdown-item" href="/aamaya/leaveapplications">Leave Application</a>
							  </li>
							  <li>
							  	<a class="dropdown-item" href="/aamaya/backend/leaveapplications">Leave Application Reports</a>
							  </li>
				            <!-- <li><a class="dropdown-item" href="#">Check In</a></li>
				            <li><a class="dropdown-item" href="#">Check Out</a></li> -->
				          </ul>
				        </li>
					</ul>
				</div>
			</div>
		</nav>

		@provide(content)

	</div>
	<!-- JQuery 3.6 -->
	<script src="/aamaya/assets/js/jquery.min.js" charset="utf-8"></script>
	<!-- bootstrap 5.1 -->
	<script src="/aamaya/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- DataTable -->
	<script src="/aamaya/plugins/dataTable/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" charset="utf-8"></script>
	<script src="/aamaya/plugins/dataTable/js/jquery.nestable.js"></script>
	<script type="text/javascript" src="/aamaya/plugins/toastr/js/toastr.js"></script>
	<script src="/aamaya/plugins/js/script.js" charset="utf-8"></script>

</body>

</html>
