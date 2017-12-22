<html>
<head>
	<title>FIRO-B</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<style>
        /* updated */
        
        #heading-text div{
            font-size: 0.5em;
        }
        
        #heading{
			background:#689d9b;
			width:100%;
		}

		#heading-text{
            padding: 50px 0 50px 0;
			color: white;
			font-size: 5em;
			text-align: center;
		}
        #segment-1{
            font-family: 'Open Sans', sans-serif;
			background:#81b7b5;
            text-align: center;
			width:100%;
		}
        #segment-1 .col-md-12{
            padding: 20px;
        }
        #segment-1 form{
            font-size: 1.4em;
		}
        #segment-1 form input[type=search]{
            border-radius: 5px;
            border-width: 0px;
            background: #689d9b;
            color: white;
			height:50px;
			width:65%;
            min-width: 250px;
            margin: 10px;
            padding: 5px;
        }
        #segment-1 form input[type=search]::placeholder{
            color: white;
        }
        #segment-1 form button{
            background: #689d9b;
            border-radius: 25px;
			border-width: 0px;
			box-shadow: 1.5px 1.5px 1.5px #77a6a5;
			color: white;
			font-weight: bold;
			height:50px;
            margin: 10px;
			width:50px;
        }
        
        #segment-2{
            width: 100%;
        }
        #segment-2 .col-md-12{
             padding:26px 0 26px 0;
             font-size: 2em;
			 text-align: center;
        }
        #segment-2 .col-md-12 div{
            color: grey;
			margin-top: 30px;
        }
        #segment-2 button{
            width:200px;
			height: 45px;
			color: white;
			border-width: 0px;
			margin-top: 30px;
			margin-bottom: 30px;
			background: #689d9b;
			border-radius: 3px;
			box-shadow: 1.5px 1.5px 1.5px 1.5px #81b7b5;

        }
	</style>
    <script>
        function adjustHeight() {
            var h = document.getElementsByTagName('body')[0].clientHeight;
            var h1= document.getElementById("segment-1").clientHeight + document.getElementById("segment-2").clientHeight + document.getElementById("heading").clientHeight;
            
            if(h>h1)
            {
                document.getElementById('adjust').style.height=h-h1-50+"px";
            }
        }
    </script>
</head>
<body onresize="adjustHeight()" onload="adjustHeight()">
		<!-- Welcome part -->

		<div class="container-fluid" id="heading">
			<div class="row">
				<div class="col-md-12" id="heading-text">
					FIRO-B
					<br>
					<div>Fundamental Interpersonal Relations Orientation Behaviour</div>
				</div>
			</div>
		</div>


		<!-- Search part -->

		<div class="container-fluid" id="segment-1">
			<div class="row">
				<div class="col-md-12" >
					<form action="search.php" method="get">
						<input type="search" name="q" placeholder="Search by Name, Roll, etc.">
						<button>Go</button>
					</form>
				</div>
			</div>
		</div>


		<!-- Data entry part -->

		<div class="container-fluid" id="segment-2">
			<div class="row">
				<div class="col-md-12">
					<div> Have more data to add?</div>
					<a href="dataEntry.php"><button> Yeah, I do!</button></a>
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