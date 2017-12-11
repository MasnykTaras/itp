<?php

	$servername = "127.0.0.1";
	$username = "pirpo";
	$password = "pirpo";
	$dbname = "itpyii";



	date_default_timezone_set('UTC');

	$data = date('Y-m-d H:i:s');

	$db = new mysqli($servername, $username, $password, $dbname);

	if (mysqli_connect_errno()) {
	    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
	    exit();
	}

	$result = $db->prepare('INSERT INTO time_cron (time_croncol_date) VALUES (?)');
	
	var_dump($data);

	$result->bind_param('s', $data);

	if($result->execute() == true){
		printf("New record was add ");
	}

	$result->close();

	// */3 * * * * /Users/tarasmasnyk/Documents/different/Learn/itp.yii/backend/config/crondate.php

?>