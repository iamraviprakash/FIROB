<?php

require('lib/printResult.php');

$user= new UserResult();
$user->userProfile('20XXXXXXX', 'John Doe', 'IIIT Sri City', '2X/XX/2017');
$user->userResultTable(1,2,3,4,1,2);
$user->showResult();

?>