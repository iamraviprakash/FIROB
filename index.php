<html>
<head>
	<title>FIRO-B</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<style>
		.container{
		    padding: 0px;
		    z-index: 0;
		}
		.row{
		    margin: 0px;
		    padding: 0px;
		}
		#index-welcome{
			background:#689d9b;
			min-height: 250px;
			width:100%;
		}

		#index-welcome-text{
			color: white;
			font-family: 'Open Sans Condensed', sans-serif;
			font-size: 5em;
			margin-top: 50px;
			text-align: center;
			margin-bottom: 30px;
		}

		#index-search{
			background:#81b7b5;
			min-height: 150px;
			width:100%;
			
		}

		#index-search-form{
			font-size: 1.2em;
			margin-top:50px;
			text-align: center;
		}

		#index-search-form-textField{
				border-radius: 5px;
				color: grey;
				height:50px;
				padding-left:10px;
				width:65%;
		}

		#index-search-form-button{
				background: #689d9b;
				border-radius: 25px;
				border-width: 0px;
				box-shadow: 1.5px 1.5px 1.5px #77a6a5;
				color: white;
				font-weight: bold;
				height:50px;
				margin-left: 10px;
				width:50px;
		}
		#index-dataEntry{
			width: 100%;
			text-align: center;
		}
		#index-dataEntry-text{
			color: grey;
			font-size: 1.8em;
			margin-top: 100px;
		}
		#index-dataEntry-button{
			width:200px;
			height: 45px;
			color: white;
			font-size: 1.5em;
			border-width: 0px;
			margin-top: 80px;
			margin-bottom: 30px;
			background: #689d9b;
			border-radius: 3px;
			box-shadow: 1.5px 1.5px 1.5px 1.5px #81b7b5;

		}
	</style>

</head>
<body>
		<!-- Welcome part -->

		<div class="container" id="index-welcome">
			<div class="row">
				<div class="col-md-12" id="index-welcome-text">
					FIRO-B
					<br>
					<div style="font-size:0.5em;">Fundamental Interpersonal Relations Orientation Behaviour</div>
				</div>
			</div>
		</div>


		<!-- Search part -->

		<div class="container" id="index-search">
			<div class="row">
				<div class="col-md-12" >
					<form id="index-search-form" action="search.php" method="get">
						<input type="search" name="q" placeholder="Search by Name, Roll, etc." id="index-search-form-textField">
						<button id="index-search-form-button">Go</button>
					</form>
				</div>
			</div>
		</div>


		<!-- Data entry part -->

		<div class="container" id="index-dataEntry">
			<div class="row">
				<div class="col-md-12">
					<div id="index-dataEntry-text"> Have more data to add?</div>
					<a href="dataEntry.php"><button id="index-dataEntry-button"> Yeah, I do!</button></a>
				</div>
			</div>
		</div>

		<!--bottom -->
		<div class="container" id="bottom">
			<div class="row">
				<div class="col-md-12">
					<div id="triangle1-bottomRight"></div>
					<div id="bottom-bar"></div>
					<div id="triangle2-bottomRight"></div>
					<div id="bottom-text">Designed and developed by Ravi Prakash</div>
				</div>
			</div>
		</div>


	</body>
</html>