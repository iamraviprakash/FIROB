<?php
	if(isset($_GET['id']) && isset($_GET['org']))
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
            height: 65px;
            box-shadow: 2px 2px 2px lightgrey;
        }
        #heading #text{
        	color: white;
        	font-size: 1.3em;
            margin: 10px;
            margin-top:20px;
        }
        #heading .col-md-4 button{
            font-size: 1.1em;
            margin: 5px;
            margin-top: 20px;
            background: none;
            border:0px;
            color: white;
        }
        #heading .col-md-4{
            text-align: center;
        }
        
        
        #segment-1 .row{
            padding-top: 30px;
            padding-bottom: 30px;
        }
       
        #segment-1 #userDetails{
            font-size: 1.3em;
        	font-weight: bold;
        	padding: 50px;
            text-align: center;
        }
        #userDetails table{
            margin: auto;
            margin-top: 20px;
            margin-bottom: 20px;
            background: #eeeeee;
            border-radius: 5px;
        }
        #userDetails td{
        	min-width: 20px;
        	max-height: 20px;
            font-size: 1.1em;
            padding: 10px;
            padding-left: 15px;
            padding-right: 15px;
        }
        
        #userResult table{
            width: 50%;
            min-height: 300px;
            margin: auto;
        }
        #userResult td{
        	min-width: 40px;
        	max-height: 40px;
            font-size: 1.1em;
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
                document.getElementById('adjust').style.height=h-h1-115+"px";
            }
        }
    </script>
</head>
<body onresize="adjustHeight()" onload="adjustHeight()">
<?php
	$user_id=$_GET['id'];
	$user_org=$_GET['org'];
	$result=$conn->query("select * from results where user_id='$user_id' and user_organisation='$user_org'");
	$row=$result->fetch_assoc();

	$result1=$conn->query("select * from users where id='$user_id' and organisation='$user_org'");
	$row1=$result1->fetch_assoc();
?>

		<!-- top left corner part -->
	<div class="container-fluid" id="heading">
		<div class="row">
			<div class="col-md-8">
				<div id="text">FIRO-B | Result</div>
			</div>
            <div class="col-md-4">
                <a href="index.php"><button>Home</button><button>Edit</button><button>Pdf</button><button>Delete</button></a>
            </div>
		</div>
	</div>
    <!-- result area -->
	<div class="container-fluid" id="segment-1">
		<div class="row">
			<div class="col-md-12" id="userDetails">
                <span>User Profile</span>
                <table>
                    <tr>
                        <td>ID</td>
                        <td><?php echo $row1['id']; ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $row1['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Organisation</td>
                        <td><?php echo $row1['organisation']; ?></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?php echo $row1['entryDate']; ?></td>
                    </tr>
                </table>
			</div>
        </div>
        <div class="row">
			<div class="col-md-12" id="userResult">
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