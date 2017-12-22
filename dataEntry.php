<html>
<head>
	<title>Data Entry | FIRO-B</title>
	<meta charset="utf-8">
	<meta tabindex="1" name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<style>
		
       #segment-1 .row{
       	text-align: left;
       	font-size: 1.5em;
       	margin-bottom: 20px;
       }
       #segment-1 input{
       	width:50px;
       	margin: 10px;
       }
       
       
       .answerField{
       	text-align: center;
       	color: grey;
       }
       
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
        #navigation{
            background: #F8F8F8; 
            margin-top: 30px;
        }
        #navigation .col-md-12{
            text-align: center;
            padding: 10px;
        }
        #navigation .material-icons{
            color: gray;
            font-size: 30px;
        }
        #navigation+form{
            margin-top: 30px;
        }
        #segment-1 #userDetails div{
            text-align: center;
        }
        #segment-1 #userDetails input{
       		width: 60%;
       		font-size: .8em;
       		padding: 5px;
       }
       #segment-1 #submit{
       		text-align: center;
       }
       #segment-1 #submit button{
       		width:220px;
			height: 45px;
			color: white;
			font-size: 1.2em;
			border-width: 0px;
			margin-top: 80px;
			margin-bottom: 30px;
			background: #689d9b; 
			border-radius: 3px;
			box-shadow: 1.5px 1.5px 1.5px 1.5px #81b7b5;
       }
	</style>
	<script>
	
	function checkAnswer(evt){
		if(Number(this.value)>0 && Number(this.value<7)){

			this.style.boxShadow="inset 0 0 10px #00b300";
			return 1;
		}
		else{

			this.style.boxShadow="inset 0 0 10px #ff1a1a";
			return 0;
		}

		
	}

	function checkUserDetail(evt){
		if(this.value!=""){

			this.style.boxShadow="inset 0 0 10px #00b300";
			return 1;
		}
		else{

			this.style.boxShadow="inset 0 0 10px #ff1a1a";
			return 0;
		}
		
	}
	// enter instead of tab to go next
	function goNext(evt)
	{
		if(evt.keyCode == 13)
        {
	        next=this.tabIndex+1;
	        document.dataForm.elements[next-1].focus();
        }	
	}

	function init(){
        
        adjustHeight();
        
		answerFieldObjects= document.getElementsByClassName("answerField");
		userDetailFieldObjects= document.getElementsByClassName("userDetailField");
		for(var i=0; i<userDetailFieldObjects.length;i++)
		{	//console.log(i);
			userDetailFieldObjects[i].addEventListener("input",checkUserDetail);
			userDetailFieldObjects[i].addEventListener("keyup",goNext);
			
		}
		for(var i=0; i<answerFieldObjects.length;i++)
		{	//console.log(i);
			answerFieldObjects[i].addEventListener("input",checkAnswer);
			answerFieldObjects[i].addEventListener("keyup",goNext);
		}
		
		$('#myform').submit(function()
		{
			var checkSum=1;
			for(var i=0; i<userDetailFieldObjects.length;i++)
			{	
				if(userDetailFieldObjects[i].value=="")
				{
					//console.log("user detail");
					checkSum = checkSum * 0;
					break;
				}
			}
			

			if(checkSum!=0)
			{
				
				for(var i=0; i<answerFieldObjects.length;i++)
				{	//console.log(answerFieldObjects.length);
					if(!(Number(answerFieldObjects[i].value)>0 && Number(answerFieldObjects[i].value<7)))
					{
						//console.log("answer");
						checkSum = checkSum * 0;
						//break;
					}
					
				}
			}
			
			if(checkSum==1)
			{
				return true;
			}
			else
			{
				return false;
			}

		});
	}
    function adjustHeight() {
        var h = document.getElementsByTagName('body')[0].clientHeight;
        var h1= document.getElementById("myform").clientHeight;
        if(h>h1)
        {
            document.getElementById('adjust').style.height=h-h1-225+"px";
        }
    }
	</script>
</head>
<body onload="init()" onresize="adjustHeight()">
		<!-- top left corner part -->
	<div class="container-fluid" id="heading">
		<div class="row">
			<div class="col-md-12">
				<div id="text">FIRO-B | Data Entry</div>
			</div>
		</div>
	</div>
    <div class="container-fluid" id="navigation">
        <div class="row" >
            <div class="col-md-12">
                <a href="index.php"><i class="material-icons">home</i></a> 
            </div>
        </div>
    </div>
	<!--- Questions -->
	<form id="myform" action="confirmation.php" method="post" name="dataForm">
		<div class="container-fluid" id="segment-1">
            
			<div class="row" id="userDetails">
				<div class="col-md-12">
					<input type="text" class="userDetailField" tabindex="1" name="id" placeholder="Id No. or Roll No.">
					<br>
					<input type="text" class="userDetailField" tabindex="2" name="name" placeholder="name eg. John">
					<br>
					<input type="text" class="userDetailField" tabindex="3" name="org" placeholder="Organistion or Institute name eg. IIIT-Sri City">
					<br>
					<input type="date" class="userDetailField" tabindex="4" name="date">
				</div>
			</div>
            
			<br>
			<div class="row">
				<div class="col-md-2">
					1. <input type="text" class="answerField" tabindex="5" name="q[]">
				</div>
				<div class="col-md-2">
					2. <input type="text" class="answerField" tabindex="6" name="q[]">
				</div>
				<div class="col-md-2">
					3. <input type="text" class="answerField" tabindex="7" name="q[]">
				</div>
				<div class="col-md-2">
					4. <input type="text" class="answerField" tabindex="8" name="q[]">
				</div>
				<div class="col-md-2">
					5. <input type="text" class="answerField" tabindex="9" name="q[]">
				</div>
				<div class="col-md-2">
					6. <input type="text" class="answerField" tabindex="10" name="q[]">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					7. <input type="text" class="answerField" tabindex="11" name="q[]">
				</div>
				<div class="col-md-2">
					8. <input type="text" class="answerField" tabindex="12" name="q[]">
				</div>
				<div class="col-md-2">
					9. <input type="text" class="answerField" tabindex="13" name="q[]">
				</div>
				<div class="col-md-2">
					10. <input type="text" class="answerField" tabindex="14" name="q[]">
				</div>
				<div class="col-md-2">
					11. <input type="text" class="answerField" tabindex="15" name="q[]">
				</div>
				<div class="col-md-2">
					12. <input type="text" class="answerField" tabindex="16" name="q[]">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					13. <input type="text" class="answerField" tabindex="17" name="q[]">
				</div>
				<div class="col-md-2">
					14. <input type="text" class="answerField" tabindex="18" name="q[]">
				</div>
				<div class="col-md-2">
					15. <input type="text" class="answerField" tabindex="19" name="q[]">
				</div>
				<div class="col-md-2">
					16. <input type="text" class="answerField" tabindex="20" name="q[]">
				</div>
				<div class="col-md-2">
					17. <input type="text" class="answerField" tabindex="21" name="q[]">
				</div>
				<div class="col-md-2">
					18. <input type="text" class="answerField" tabindex="22" name="q[]">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					19. <input type="text" class="answerField" tabindex="23" name="q[]">
				</div>
				<div class="col-md-2">
					20. <input type="text" class="answerField" tabindex="24" name="q[]">
				</div>
				<div class="col-md-2">
					21. <input type="text" class="answerField" tabindex="25" name="q[]">
				</div>
				<div class="col-md-2">
					22. <input type="text" class="answerField" tabindex="26" name="q[]">
				</div>
				<div class="col-md-2">
					23. <input type="text" class="answerField" tabindex="27" name="q[]">
				</div>
				<div class="col-md-2">
					24. <input type="text" class="answerField" tabindex="28" name="q[]">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					25. <input type="text" class="answerField" tabindex="29" name="q[]">
				</div>
				<div class="col-md-2">
					26. <input type="text" class="answerField" tabindex="30" name="q[]">
				</div>
				<div class="col-md-2">
					27. <input type="text" class="answerField" tabindex="31" name="q[]">
				</div>
				<div class="col-md-2">
					28. <input type="text" class="answerField" tabindex="32" name="q[]">
				</div>
				<div class="col-md-2">
					29. <input type="text" class="answerField" tabindex="33" name="q[]">
				</div>
				<div class="col-md-2">
					30. <input type="text" class="answerField" tabindex="34" name="q[]">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					31. <input type="text" class="answerField" tabindex="35" name="q[]">
				</div>
				<div class="col-md-2">
					32. <input type="text" class="answerField" tabindex="36" name="q[]">
				</div>
				<div class="col-md-2">
					33. <input type="text" class="answerField" tabindex="37" name="q[]">
				</div>
				<div class="col-md-2">
					34. <input type="text" class="answerField" tabindex="38" name="q[]">
				</div>
				<div class="col-md-2">
					35. <input type="text" class="answerField" tabindex="39" name="q[]">
				</div>
				<div class="col-md-2">
					36. <input type="text" class="answerField" tabindex="40" name="q[]">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					37. <input type="text" class="answerField" tabindex="41" name="q[]">
				</div>
				<div class="col-md-2">
					38. <input type="text" class="answerField" tabindex="42" name="q[]">
				</div>
				<div class="col-md-2">
					39. <input type="text" class="answerField" tabindex="43" name="q[]">
				</div>
				<div class="col-md-2">
					40. <input type="text" class="answerField" tabindex="44" name="q[]">
				</div>
				<div class="col-md-2">
					41. <input type="text" class="answerField" tabindex="45" name="q[]">
				</div>
				<div class="col-md-2">
					42. <input type="text" class="answerField" tabindex="46" name="q[]">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					43. <input type="text" class="answerField" tabindex="47" name="q[]">
				</div>
				<div class="col-md-2">
					44. <input type="text" class="answerField" tabindex="48" name="q[]">
				</div>
				<div class="col-md-2">
					45. <input type="text" class="answerField" tabindex="49" name="q[]">
				</div>
				<div class="col-md-2">
					46. <input type="text" class="answerField" tabindex="50" name="q[]">
				</div>
				<div class="col-md-2">
					47. <input type="text" class="answerField" tabindex="51" name="q[]">
				</div>
				<div class="col-md-2">
					48. <input type="text" class="answerField" tabindex="52" name="q[]">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					49. <input type="text" class="answerField" tabindex="53" name="q[]">
				</div>
				<div class="col-md-2">
					50. <input type="text" class="answerField" tabindex="54" name="q[]">
				</div>
				<div class="col-md-2">
					51. <input type="text" class="answerField" tabindex="55" name="q[]">
				</div>
				<div class="col-md-2">
					52. <input type="text" class="answerField" tabindex="56" name="q[]">
				</div>
				<div class="col-md-2">
					53. <input type="text" class="answerField" tabindex="57" name="q[]">
				</div>
				<div class="col-md-2">
					54. <input type="text" class="answerField" tabindex="58" name="q[]">
				</div>
			</div>
            
			<div class="row" id="submit">
					<button>SUBMIT</button>
			</div>

		</div>
	</form>
    <div id="adjust"></div>
	<!--bottom -->
		<div class="container-fluid" id="bottom">
            <div>Designed and developed by Ravi Prakash</div>
		</div>

	</body>
</html>