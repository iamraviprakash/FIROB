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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        #heading .col-md-3 button{
            font-size: 1.1em;
            margin: 5px;
            margin-top: 20px;
            background: none;
            border:0px;
            color: white;
        }
        #heading .col-md-3{
            text-align: center;
        }
        
        #segment-1 form{
			text-align: center;
            font-size: 1.1em;
            padding: 30px 10px 30px 10px;
		}
        #segment-1 form input[type=search]{
            border-radius: 5px;
            border-width: 0px;
            background: #81b7b5;
            color: white;
			height:50px;
            padding: 10px;
			width:70%;
            margin: 10px;
            min-width: 250px;
            
        }
        #segment-1 form input[type=search]::placeholder{
            color: white;
        }
        #segment-1 form button{
            background: #81b7b5;
            border-radius: 25px;
			border-width: 0px;
			color: white;
			font-weight: bold;
			height:50px;
			margin: 10px;
			width:50px;
        }
        #result-heading{
            box-shadow: 1.5px 1.5px 1.5px 1.5px lightgrey;
            background: #F8F8F8;
        }
        #result-heading div{
            text-align: center;
            font-size: 1.1em;
            font-weight: bold;
            padding: 5px;
            color: gray;
        }
        .result-row{
            box-shadow: 1.5px 1.5px 1.5px 1.5px lightgrey;
            margin-top:10px;
        }
        .result-row div{
            text-align: center;
            font-size: 1.2em;
            padding: 10px;
        }
        .result-row .material-icons{
            font-size:25px;
            margin-left: 10px;
        }
        .no-result div{
            text-align: center;
            font-size: 1.4em;
            padding: 10px;
            box-shadow: 1.5px 1.5px 1.5px 1.5px lightgrey;
        }
        .material-icons{
             color: grey;
        }
	</style>
    <script>
        function adjustHeight() {
            var h = document.getElementsByTagName('body')[0].clientHeight;
            var h1= document.getElementById("segment-1").clientHeight+document.getElementById("segment-2").clientHeight;
            if(h>h1)
            {
                document.getElementById('adjust').style.height=h-h1-165+"px";
            }
        }
        function selectAll(thisVar)
        {
            if(thisVar.checked){

                var obj= document.getElementsByClassName('selectOne');
                for(i=0 ; i< obj.length; i++)
                    obj[i].checked=true;
            }
            else{
                
                var obj= document.getElementsByClassName('selectOne');
                for(i=0 ; i< obj.length; i++)
                    obj[i].checked=false;
                
            }
           
        }
    </script>
</head>
<body onresize="adjustHeight()" onload="adjustHeight()">
<?php
			$queryString=$_GET['q'];
			$queryString=str_replace(" ","|",$queryString);

			$result=$conn->query("select * from users where id regexp '".$queryString."' or name regexp '".$queryString."' or organisation regexp '".$queryString."'");
?>
<!-- heading -->
	<div class="container-fluid" id="heading">
		<div class="row">
			<div class="col-md-9">
				<!--<div id="search-triangle1-topLeft"></div>
				<div id="search-triangle2-topLeft"></div>-->
				<div id="text">FIRO-B | Search</div>
			</div>
            <div class="col-md-3">
                <a href="index.php"><button>Home</button> 
                </a>
                <button>Delete</button>
                <button>Print All</button>
            </div>
		</div>
	</div>
    
<!-- search bar -->
	<div class="container-fluid" id="segment-1">
		<div class="row">
			<div class="col-md-12">
				<form action="search.php" method="get">
						<input type="search" name="q" placeholder="Search by Name, Roll, etc.">
						<button>Go</button>
				</form>
			</div>
		</div>
<?php

			if($result->num_rows>0)
			{	
                
?>
                <div class="row" id="result-heading">
                    <div class="col-md-1">
                        <input type="checkbox" name="selectAll" id="selectAll" onchange="selectAll(this)">
                    </div>
                    <div class="col-md-2">Id</div>
                    <div class="col-md-2">Name</div>
                    <div class="col-md-2">Organisation</div>
                    <div class="col-md-2">Date</div>
                    <div class="col-md-3">Options</div>
                </div>
    </div>
    <div class="container-fluid" id="segment-2">
<?php
				while($row=$result->fetch_assoc())
				{
?>
					<div class="row result-row" >
                        <div class="col-md-1"><input type="checkbox" class="selectOne"></div>
						<div class="col-md-2">
							<?php echo $row['id']; ?>
						</div>
                        <div class="col-md-2">
							<?php echo $row['name']; ?>
						</div>
                        <div class="col-md-2">
							<?php echo $row['organisation']; ?>
						</div>
                        <div class="col-md-2">
							<?php echo $row['entryDate']; ?>
						</div>
                        <div class="col-md-3">
							<?php echo '<a href="results.php?id='.$row['id'].'&org='.$row['organisation'].'"><i class="material-icons">remove_red_eye</i></a>';?> 
                            
                            <?php echo '<a href="results.php?id='.$row['user_id'].'"><i class="material-icons">mode_edit</i></a>';?>
                            
                            <?php echo '<a href="results.php?id='.$row['user_id'].'"><i class="material-icons">delete</i></a>';?>
                            <i class="material-icons">picture_as_pdf</i>
						</div>
					</div>
		
<?php
				}

			}
			else{

?>
					<div class="row no-result">
						<div class="col-md-12">
							Oops! No relevant result found. Please try again with other keywords.
						</div>
					</div>

<?php
				}
?>
	</div>
    <div id="adjust"></div>
	<!--bottom -->
		<div id="bottom">
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