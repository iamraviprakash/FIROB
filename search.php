<?php
	if(isset($_GET['q']))
	{
		$servername = "localhost";
		$username = "root";
		$password = "ravi";
		$dbname = "firob";
		$validity=true;
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		   //die("Connection failed: " . $conn->connect_error);
		   header('Location:index.php');
		}
		else
		{
?>
<html>
<head>
	<title>Search | FIRO-B</title>
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
		#search-topLeft{
			width: 100%;
			position: relative;
			height: 200px;
		}
		#search-triangle1-topLeft{
			position: absolute;
			left: 0px;
            width: 0;
            height: 0;
            border-top: 130px solid #537d7c;
            border-right: 90vw solid transparent;
        }
        #search-triangle2-topLeft{
			position: absolute;
			left: 30px;
            width: 0;
            height: 0;
            border-top: 150px solid #81b7b5;
            border-right: 90vw solid transparent;
        }
		#search-topLeft-text{
        	position: absolute;
        	top:50px;
        	color: white;
        	font-size: 1.8em;
        	font-weight: bold;
        	left: 16px;

        }
       

        #search-bottom{
			width: 100%;
			position: relative;
			height: 300px;
		}
		#search-triangle1-bottomRight{
			position: absolute;
			top:100px;
			right: 0px;
            width: 0;
            height: 0;
            border-bottom: 200px solid #537d7c;
            border-left: 65vw solid transparent;
        }
        #search-triangle2-bottomRight{
			position: absolute;
			top:70px;
			right: 130px;
            width: 0;
            height: 0;
            border-bottom: 230px solid #81b7b5;
            border-left: 65vw solid transparent;
        }
        #search-bottom-text{
        	position: absolute;
        	top:250px;
        	color: white;
        	font-size: 1.2em;
        	font-weight: bold;
        	right: 20px;

        }
        #search-middle{
        	min-height: 200px;
        }
       .search-middle-button{
       		width:180px;
			height: 40px;
			color: white;
			font-size: 1.1em;
			border-width: 0px;
			background: #689d9b;
			border-radius: 3px;
			box-shadow: 1.5px 1.5px 1.5px 1.5px #81b7b5;
       }
       .search-middle-text{
       		font-size: 1.6em;
       		padding: 10px;
       }
       #search-middle .row{
       		padding: 10px;
       }

       #search-search-form{
			font-size: 1.2em;
			margin-top:20px;
			text-align: center;
			margin-bottom: 60px;
		}

		#search-search-form-textField{
				border-radius: 5px;
				color: grey;
				height:50px;
				padding-left:10px;
				width:65%;
		}

		#search-search-form-button{
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
	</style>

</head>
<body>
<?php
			$queryString=$_GET['q'];
			$queryString=str_replace(" ","|",$queryString);

			$result=$conn->query("select * from users where user_id regexp '".$queryString."' or user_name regexp '".$queryString."' or user_org regexp '".$queryString."'");
			

?>
		<!-- top left corner part -->
	<div class="container" id="search-topLeft">
		<div class="row">
			<div class="col-md-12">
				<div id="search-triangle1-topLeft"></div>
				<div id="search-triangle2-topLeft"></div>
				<a href="index.php"><div id="search-topLeft-text">FIRO-B | Search</div></a>
			</div>
		</div>
	</div>
	<div class="container" id="search-middle">
		<div class="row">
			<div class="col-md-12">
				<form action="search.php" mwthod="get" id="search-search-form">
						<input type="search" name="q" placeholder="Search by Name, Roll, etc." id="search-search-form-textField">
						<button id="search-search-form-button">Go</button>
				</form>
			</div>
		</div>
<?php

			if($result->num_rows>0)
			{	
				while($row=$result->fetch_assoc())
				{
?>

					<div class="row" style="box-shadow: 1.5px 1.5px 1.5px 1.5px lightgrey;margin-top:20px;">
						<div class="col-md-10 search-middle-text">
							<?php echo 'Id: '.$row['user_id'].' | Name: '.$row['user_name'].'<br>Org: '.$row['user_org'].' | Date: '.$row['entryDate']; ?>
						</div>
						<div class="col-md-2">
							<?php echo '<a href="results.php?id='.$row['user_id'].'"><button class="search-middle-button" >SEE RESULT</button></a>';?>
						</div>
					</div>
		
<?php
				}

			}
			else{

?>
					<div class="row" style="box-shadow: 1.5px 1.5px 1.5px 1.5px lightgrey;margin-top:20px;">
						<div class="col-md-12 search-middle-text" style="text-align:center;">
							Oops! No relevant result found. Please try again.
						</div>
					</div>

<?php
				}
?>
	</div>
	<!--bottom -->
		<div class="container" id="search-bottom">
			<div class="row">
				<div class="col-md-12">
					<div id="search-triangle1-bottomRight"></div>
					<div id="search-triangle2-bottomRight"></div>
					<div id="search-bottom-text">Designed and developed by Ravi Prakash</div>
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