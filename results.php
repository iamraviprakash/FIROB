<?php
	if(isset($_GET['id']))
	{
		$servername = "localhost";
		$username = "root";
		$password = "ravi";
		$dbname = "firob";
		$validity=true;
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		   //die("Connection failed: " . $conn->connect_error);
		   header('Location:dataEntry.php');
		}
		else
		{
?>
<html>
<head>
	<title>Result | FIRO-B</title>
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
		#results-topLeft{
			width: 100%;
			position: relative;
			height: 200px;
		}
		#results-triangle1-topLeft{
			position: absolute;
			left: 0px;
            width: 0;
            height: 0;
            border-top: 130px solid #537d7c;
            border-right: 90vw solid transparent;
        }
        #results-triangle2-topLeft{
			position: absolute;
			left: 30px;
            width: 0;
            height: 0;
            border-top: 150px solid #81b7b5;
            border-right: 90vw solid transparent;
        }
		#results-topLeft-text{
        	position: absolute;
        	top:50px;
        	color: white;
        	font-size: 1.8em;
        	font-weight: bold;
        	left: 16px;

        }
        #results-area{
        	width: 100%;

        }
        #results-area-table{
        	min-width:400px;
        	min-height: 300px;
        	
        }
        td{
        	min-width: 50px;
        	max-height: 50px;
        	text-align: center;
        }

        #results-bottom{
			width: 100%;
			position: relative;
			height: 300px;
		}
		#results-triangle1-bottomRight{
			position: absolute;
			top:100px;
			right: 0px;
            width: 0;
            height: 0;
            border-bottom: 200px solid #537d7c;
            border-left: 65vw solid transparent;
        }
        #results-triangle2-bottomRight{
			position: absolute;
			top:70px;
			right: 130px;
            width: 0;
            height: 0;
            border-bottom: 230px solid #81b7b5;
            border-left: 65vw solid transparent;
        }
        #results-bottom-text{
        	position: absolute;
        	top:250px;
        	color: white;
        	font-size: 1.2em;
        	font-weight: bold;
        	right: 20px;

        }
        #results-area-userDetails{
        	font-size: 1.3em;
        	font-weight: bold;
        	padding: 20px;
        }
        li{
        	margin-top: 10px;
        }
	</style>

</head>
<body>
<?php
	$user_id=$_GET['id'];
	
	$result=$conn->query("select * from results where user_id='$user_id'");
	$row=$result->fetch_assoc();

	$result1=$conn->query("select * from users where user_id='$user_id'");
	$row1=$result1->fetch_assoc();
?>

		<!-- top left corner part -->
	<div class="container" id="results-topLeft">
		<div class="row">
			<div class="col-md-12">
				<div id="results-triangle1-topLeft"></div>
				<div id="results-triangle2-topLeft"></div>
				<a href="index.php"><div id="results-topLeft-text">FIRO-B | Result</div></a>
			</div>
		</div>
	</div>
	<div class="container" id="results-area">
		<div class="row">
			<div class="col-md-6" id="results-area-userDetails">
				<ul type="none">
					<?php echo "<li>Id No./Roll No. : ".$row1['user_id']."</li>"; ?>
					<?php echo "<li>Name : ".$row1['user_name']."</li>"; ?>
					<?php echo "<li>Organisation/Institute : ".$row1['user_org']."</li>"; ?>
					<?php echo "<li>Date : ".$row1['entryDate']."</li>"; ?>
				</ul>
			</div>
			<div class="col-md-6">
				<table border="2" id="results-area-table">
					<tr>
						<td></td>
						<td><b>I </b></td>
						<td><b>C</b></td>
						<td><b>A</b></td>
					</tr>
					<tr>
						<td><b>E</b></td>
						<td><?php echo $row['E_I']; ?></td>
						<td><?php echo $row['E_C']; ?></td>
						<td><?php echo $row['E_A']; ?></td>
					</tr>
					<tr>
						<td><b>W</b></td>
						<td><?php echo $row['W_I']; ?></td>
						<td><?php echo $row['W_C']; ?></td>
						<td><?php echo $row['W_A']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<!--bottom -->
		<div class="container" id="results-bottom">
			<div class="row">
				<div class="col-md-12">
					<div id="results-triangle1-bottomRight"></div>
					<div id="results-triangle2-bottomRight"></div>
					<div id="results-bottom-text">Designed and developed by Ravi Prakash</div>
				</div>
			</div>
			
		</div>


	</body>
</html>
<?php 
			$conn->close();
		}
	}
	else
		header('Location:dataEntry.php');
 ?>