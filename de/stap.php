<?php 
	include 'config.php'
?>

<!doctype html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Guide Your Self</title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Path Finder</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			  <ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="#">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">About Us</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#">Contact Us</a>
				</li>
			  </ul>
			</div>
		</div>
	</nav>
	
	<?php
	$id = $_GET['id'];
	// echo $id; 
	// $query = "SELECT * FROM home_data where title='.$category.'";
	// $result = $connect->query($query);
	$iab_data = $conn->prepare("SELECT * FROM home_data where id=? ");
	$iab_data->bindParam(1, $id);
	$iab_data->execute();
	while ($rowdata = $iab_data->fetch(PDO::FETCH_ASSOC)) {
		// echo $rowdata['Step_1'];
		$temp = [];
		$temp[0] = $rowdata['Step_1'];
		$temp[1] = $rowdata['Step_2'];
		$temp[2] = $rowdata['Step_3'];
		$temp[3] = $rowdata['Step_4'];

		for ($i = 1; $i <= $rowdata['No_of_steps']; $i++) {
			$k = $temp[$i - 1];
			echo "
				<!--<div class='card bg-primary'>
					<div class='card-header'>Step $i</div>
					<div class='card-body text-center'>
						<p class='card-text'>$k Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nostrum dolor illo? Dolor a voluptates est officiis velit, maxime provident autem nostrum nobis aperiam vel.</p>
					</div>
				</div>-->
			
				<div  class='card bg-success text-white'>
				<div class='card-header'>Header</div>
				<div class='card-body'>
				<h5 class='card-title'>Step $i</h5>
				<p class='card-text'>$k Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis nostrum dolor illo? Dolor a voluptates est officiis velit, maxime provident autem nostrum nobis aperiam vel.</p>
				</div>
				</div>
			";
		} 	
	}
	?>
	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
	</body>
</html>
