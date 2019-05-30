<!DOCUMENT html>
<html lang="am">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<title>Selling</title>
</head>
<body>
		<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
			  <h5 class="my-0 mr-md-auto font-weight-normal">Selling</h5>
			  <nav class="my-2 my-md-0 mr-md-3">
			    <a class="p-2 text-dark" href="#">Features</a>
			    <a class="p-2 text-dark" href="#">Enterprise</a>
			    <a class="p-2 text-dark" href="#">Support</a>
			    <a class="p-2 text-dark" href="#">Pricing</a>
			  </nav>
			  <a class="btn btn-outline-primary" href="#">Sign Up</a>
		</div>
		<div class="container mt-4">
			<h3 class="mb-5">Հայտարարություններ</h3>
			<div class="d-flex flex-wrap">
				<?php
				$con = mysqli_connect('localhost:3306', 'root', 'root');
				mysqli_select_db($con, 'selling');

				if(!isset($_GET[page])) {
					$page = 1;
				} else {
					$page = $_GET[page];
				}

				$number_per_page = 3;
				$sql = "SELECT * FROM products LIMIT " . ($page - 1)*$number_per_page . "," . $number_per_page;
				$result = mysqli_query($con, $sql);

				$number_of_results = mysqli_num_rows(mysqli_query($con, "SELECT * FROM  products"));
				$page_numbers = ceil($number_of_results / $number_per_page);

				while ($row = mysqli_fetch_array($result)) {
				echo
					'<div class="card mb-4 shadow-sm">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">'.$row['title'].'</h4>
					</div>
					<div class="card-body">
						<img alt="" src="img/'.$row['img_url'].'">
						<ul class="list-unstyled mt-3 mb-4">
							<li>10 users included</li>
							<li>2 GB of storage</li>
							<li>Email support</li>
							<li>Help center access</li>
						</ul>
						<button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
					</div>
				</div>';
				}
				?>
			</div>
		</div>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<?php
				for ($i=1; $i <= $page_numbers; $i++) {
					echo '<li effect="material" class="page-item "'.($i==$page ? 'active' : '').'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
				}
				?>

				<li class="page-item">
					<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav>
		<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
        <small class="d-block mb-3 text-muted">© 2017-2019</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
          <li><a class="text-muted" href="#">Team feature</a></li>
          <li><a class="text-muted" href="#">Stuff for developers</a></li>
          <li><a class="text-muted" href="#">Another one</a></li>
          <li><a class="text-muted" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>
          <li><a class="text-muted" href="#">Another resource</a></li>
          <li><a class="text-muted" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Team</a></li>
          <li><a class="text-muted" href="#">Locations</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>
