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
		.container{
		    padding: 0px;
		    z-index: 0;
		}
		.row{
		    margin: 0px;
		    padding: 0px;
		}
		#confirmation-topLeft{
			width: 100%;
			position: relative;
			height: 200px;
		}
		#confirmation-triangle1-topLeft{
			position: absolute;
			left: 0px;
            width: 0;
            height: 0;
            border-top: 130px solid #537d7c;
            border-right: 90vw solid transparent;
        }
        #confirmation-triangle2-topLeft{
			position: absolute;
			left: 30px;
            width: 0;
            height: 0;
            border-top: 150px solid #81b7b5;
            border-right: 90vw solid transparent;
        }
		#confirmation-topLeft-text{
        	position: absolute;
        	top:50px;
        	color: white;
        	font-size: 1.8em;
        	font-weight: bold;
        	left: 16px;

        }
       
       #confirmation-middle{
       	text-align: center;
       	width: 100%;
       	min-height: 250px;
       }
       #confirmation-middle-text{
       	color: grey;
       	font-size: 2.5em;
       	margin-top: 30px;
       }
       #confirmation-middle-image{

       }
       #confirmation-middle-submit-button-group{
       		padding-bottom: 30px;
       		padding-top: 120px;
       }
       .confirmation-middle-submit-button{
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

</head>
<body>
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
			$check_result=$conn->query("Insert into users(user_id,user_name,user_org,entryDate) values('$user_id','$user_name','$user_org','$entryDate')");
			if(!$check_result)
			{
				$flag=false;
			}
			$check_result=$conn->query("Insert into userAnswer(user_id,user_answer) values('$user_id','$user_answer')");
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
	<div class="container" id="confirmation-topLeft">
		<div class="row">
			<div class="col-md-12">
				<div id="confirmation-triangle1-topLeft"></div>
				<div id="confirmation-triangle2-topLeft"></div>
				<a href="index.php"><div id="confirmation-topLeft-text">FIRO-B | Confirmation</div></a>
			</div>
		</div>
	</div>
	<!--middle -->
	<div class="container" id="confirmation-middle">	
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

						$check_result=$conn->query("Insert into results(user_id,E_I,W_C,E_A,W_I,W_A,E_C) values('$user_id',$E_I,$W_C,$E_A,$W_I,$W_A,$E_C)");
						if(!$check_result)
						{
							$flag=false;
						}

						if($flag)
						{
							$conn->commit();
							$conn->autocommit(TRUE);
				?>
				
							<img src="img/tick.png" width="80" id="confirmation-middle-image">
							<br>
							<div id="confirmation-middle-text">Well done! You've successfully submitted the data.</div>
				
				<?php
						}
						else{
							echo $conn->error;
							$conn->autocommit(TRUE);
							$conn->rollback();
							$validity=false;		
				?>

							<img src="img/sad.png" width="80" id="confirmation-middle-image">
							<br>
							<div id="confirmation-middle-text">Oh no! Unfortunately your attempt was unsuccessful.</div>
				
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
		<div class="row" id="confirmation-middle-submit-button-group">
			<?php
				if($validity){
			?>

				<div class="col-md-4" style="text-align:right;">
					<a href="index.php"><button class="confirmation-middle-submit-button" >HOME</button></a>
				</div>
				<div class="col-md-4">
					<a href="dataEntry.php"><button class="confirmation-middle-submit-button">NEXT ENTRY</button></a>
				</div>
				<div class="col-md-4" style="text-align:left;">
					<?php
						echo "<a href='results.php?id=".$user_id."'><button class='confirmation-middle-submit-button' >SEE RESULT</button></a>";
					?>
				</div>

			<?php
				}
				else{
			?>

				<div class="col-md-6" style="text-align:right;">
					<a href="index.php"><button class="confirmation-middle-submit-button" >HOME</button></a>
				</div>
				<div class="col-md-6" style="text-align:left;">
					<a href="dataEntry.php"><button class="confirmation-middle-submit-button">RETRY</button></a>
				</div>

			<?php
				}
			?>
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
<?php 
			$conn->close();
		}
	}
	else
		header('Location:dataEntry.php');
 ?>