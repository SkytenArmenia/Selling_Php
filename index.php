<?php
	require "header.php";
 ?>
<main>
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

</main>
<?php
	require "footer.php";
 ?>
