<?php
	if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['org']) && isset($_POST['date']) && isset($_POST['q']))
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
	<title>Confirmation | FIRO-B</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
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
        #segment-1 .col-md-12{
            padding: 10px;
       	    text-align: center;
        }
        #segment-1 #text{
            color: grey;
            font-size: 2.5em;
            margin-top: 30px;
        }
        #segment-1 {
       		padding: 30px;
        }
        #segment-1 #submit-button-group{
            text-align: center;
            padding: 10px;
        }
        #segment-1 #submit-button-group button{
            margin: 10px;
            width:220px;
			height: 45px;
			color: white;
			font-size: 1.2em;
			border-width: 0px;
			background: #689d9b;
			border-radius: 3px;
			box-shadow: 1.5px 1.5px 1.5px 1.5px #81b7b5;
       }
	</style>
    <script>
        function adjustHeight() {
            var h = document.getElementsByTagName('body')[0].clientHeight;
            var h1= document.getElementById("segment-1").clientHeight;
            if(h>h1)
            {
                document.getElementById('adjust').style.height=h-h1-100+"px";
            }
        }
    </script>
</head>
<body onresize="adjustHeight()" onload="adjustHeight()">
<?php
	$user_id=$_POST['id'];
	$user_name=$_POST['name'];
	$user_org=$_POST['org'];
	$entryDate=$_POST['date'];
	$user_answer="";
	foreach ($_POST['q'] as $x => $x_value) {

		$user_answer=$user_answer.$x_value.",";
	}
	$user_answer=substr($user_answer,0,strlen($user_answer)-1);
	try{
			$flag=true;
			$conn->autocommit(FALSE);
			//$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
			$check_result=$conn->query("Insert into users(id,name,organisation,entryDate) values('$user_id','$user_name','$user_org','$entryDate')");
			if(!$check_result)
			{
				$flag=false;
			}
			$check_result=$conn->query("Insert into userAnswer(user_id,user_organisation,user_answer) values('$user_id','$user_org','$user_answer')");
			if(!$check_result)
			{
				$flag=false;
			}
	/*if($conn->error!="")
	{
		$validity=false;
	}
	$conn->commit();*/
?>
	<!-- top left corner part -->
	<div class="container-fluid" id="heading">
		<div class="row">
			<div class="col-md-12">
				<div id="text">FIRO-B | Confirmation</div>
			</div>
		</div>
	</div>
	<!--middle -->
	<div class="container-fluid" id="segment-1">	
		<div class="row">
			<div class="col-md-12">

				<?php
					//echo $validity;
						$E_I=0;
						$W_C=0;
						$E_A=0;
						$W_I=0;
						$W_A=0;
						$E_C=0;

						$user_answerArray=explode(",", $user_answer);

						/*$conn->autocommit(FALSE);
						$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);*/
						//for E-I category

						$result=$conn->query("select * from answers where category='E-I'");
						if(!$result){

							$flag=false;
						}
						else{

							while($row=$result->fetch_assoc())
							{
								$correctAnswer=explode(",",$row['answer']);
								if(in_array($user_answerArray[$row['question_no']-1], $correctAnswer))
								{
									$E_I+=1;
								}
							}
						}
						

						//for W-C category

						$result=$conn->query("select * from answers where category='W-C'");
						if(!$result){

							$flag=false;
						}
						else{

							while($row=$result->fetch_assoc())
							{
								$correctAnswer=explode(",",$row['answer']);
								if(in_array($user_answerArray[$row['question_no']-1], $correctAnswer))
								{
									$W_C+=1;
								}
							}
						}

						//for E-A category

						$result=$conn->query("select * from answers where category='E-A'");
						if(!$result){

							$flag=false;
						}
						else{

							while($row=$result->fetch_assoc())
							{
								$correctAnswer=explode(",",$row['answer']);
								if(in_array($user_answerArray[$row['question_no']-1], $correctAnswer))
								{
									$E_A+=1;
								}
							}
						}

						//for W-I category

						$result=$conn->query("select * from answers where category='W-I'");
						if(!$result){

							$flag=false;
						}
						else{

							while($row=$result->fetch_assoc())
							{
								$correctAnswer=explode(",",$row['answer']);
								if(in_array($user_answerArray[$row['question_no']-1], $correctAnswer))
								{
									$W_I+=1;
								}
							}
						}

						//for W-A category

						$result=$conn->query("select * from answers where category='W-A'");
						if(!$result){

							$flag=false;
						}
						else{

							while($row=$result->fetch_assoc())
							{
								$correctAnswer=explode(",",$row['answer']);
								if(in_array($user_answerArray[$row['question_no']-1], $correctAnswer))
								{
									$W_A+=1;
								}
							}
						}

						//for E-C category

						$result=$conn->query("select * from answers where category='E-C'");
						if(!$result){

							$flag=false;
						}
						else{

							while($row=$result->fetch_assoc())
							{
								$correctAnswer=explode(",",$row['answer']);
								if(in_array($user_answerArray[$row['question_no']-1], $correctAnswer))
								{
									$E_C+=1;
								}
							}
						}

						$check_result=$conn->query("Insert into results(user_id,user_organisation,E_I,W_C,E_A,W_I,W_A,E_C) values('$user_id','$user_org',$E_I,$W_C,$E_A,$W_I,$W_A,$E_C)");
						if(!$check_result)
						{
							$flag=false;
						}

						if($flag)
						{
							$conn->commit();
							$conn->autocommit(TRUE);
				?>
				
							<img src="img/tick.png" width="80" id="segment-1-image">
							<br>
							<div id="text">Well done! You've successfully submitted the data.</div>
				
				<?php
						}
						else{
							echo $conn->error;
							$conn->autocommit(TRUE);
							$conn->rollback();
							$validity=false;		
				?>

							<img src="img/sad.png" width="80" id="segment-1-image">
							<br>
							<div id="text">Oh no! Unfortunately your attempt was unsuccessful.</div>
				
				<?php
						}
	}
	catch(Exception $e){
			echo $conn->error;
            $conn->rollback();
            $conn->autocommit(TRUE);
            $validity=false;
    }
						
				?>
			</div>
		</div>
        <br>
		<div class="row" id="submit-button-group">
			<?php
				if($validity){
			?>
					<a href="index.php"><button>HOME</button></a>

					<a href="dataEntry.php"><button>NEXT ENTRY</button></a>
				
					<?php
						echo "<a href='results.php?id=".$user_id."&org=".$user_org."'><button>SEE RESULT</button></a>";
					?>

			<?php
				}
				else{
			?>
					<a href="index.php"><button>HOME</button></a>
            
					<a href="dataEntry.php"><button>RETRY</button></a>

			<?php
				}
			?>
		</div>
	</div>
    
    <div id="adjust"></div>
	<!--bottom -->
		<div class="container-fluid" id="bottom">
				<div id="bottom-text">Designed and developed by Ravi Prakash</div>
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