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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<style>
		
      
        /* updated */
        
        #heading{
            background:#689d9b;
        }
        #heading #text{
        	color: white;
        	font-size: 1.8em;
        	font-weight: bold;
            width: 100%;
			height: 50px;
            padding:5px 10px 5px 10px;
        }
        #segment-1{
            margin-top: 50px;
        }
        #navigation{
            background: #F8F8F8; 
        }
        #navigation div{
            text-align: center;
            padding: 10px;
        }
        #navigation .material-icons{
            color: gray;
            font-size: 30px;
            margin-left: 20px;
        }
        #navigation+div{
            margin-top: 50px;
        }
        #segment-1 #userDetails{
            font-size: 1.5em;
        	font-weight: bold;
        	padding: 20px;
        }
        li{
        	margin-top: 10px;
        }
        table{
            width: 100%;
            min-height: 300px;
        }
        td{
        	min-width: 40px;
        	max-height: 40px;
            font-size: 1.4em;
            padding: 5px;
        	text-align: center;
        }
        
	</style>
    <script>
        function adjustHeight() {
            var h = document.getElementsByTagName('body')[0].clientHeight;
            var h1= document.getElementById("segment-1").clientHeight;
            if(h>h1)
            {
                document.getElementById('adjust').style.height=h-h1-150+"px";
            }
        }
    </script>
</head>
<body onresize="adjustHeight()" onload="adjustHeight()">
<?php
	$user_id=$_GET['id'];
	
	$result=$conn->query("select * from results where user_id='$user_id'");
	$row=$result->fetch_assoc();

	$result1=$conn->query("select * from users where user_id='$user_id'");
	$row1=$result1->fetch_assoc();
?>

		<!-- top left corner part -->
	<div class="container-fluid" id="heading">
		<div class="row">
			<div class="col-md-12">
				<div id="text">FIRO-B | Result</div>
			</div>
		</div>
	</div>
    <!-- result area -->
	<div class="container-fluid" id="segment-1">
        <div class="row" id="navigation">
            <div class="col-md-12">
                <a href="index.php"><i class="material-icons">home</i></a> <i class="material-icons">mode_edit</i> <i class="material-icons">delete</i> <i class="material-icons">picture_as_pdf</i>
            </div>
        </div>
		<div class="row">
			<div class="col-md-6" id="userDetails">
				<ul type="none">
                    <li></li>
                    <br>
					<?php echo "<li>Id No./Roll No. : ".$row1['user_id']."</li>"; ?>
					<?php echo "<li>Name : ".$row1['user_name']."</li>"; ?>
					<?php echo "<li>Organisation/Institute : ".$row1['user_org']."</li>"; ?>
					<?php echo "<li>Date : ".$row1['entryDate']."</li>"; ?>
				</ul>
			</div>
			<div class="col-md-6">
				<table border="2">
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
    <div id="adjust"></div>
	<!--bottom -->
    <div class="container-fluid" id="bottom">
		<div>Designed and developed by Ravi Prakash</div>	
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