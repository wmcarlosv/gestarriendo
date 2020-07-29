<?php
	/*-------------------------
    Autor: Jesús Caballero P.
    Web: integramosweb.pro
    Correo: web@integramosweb.pro
	---------------------------*/
	
	// Requerimos conexion a la DDBB
	require_once('../gt-config/conexion.php');

	// REQUEST METHOD POST
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$id_property = filter_var($_POST['id_property_m'], FILTER_SANITIZE_NUMBER_INT);

		$agent = filter_var($_POST['agent_movement'], FILTER_SANITIZE_STRING);
		//$hour = filter_var($_POST['hour_movement'], FILTER_SANITIZE_STRING);
		$date = filter_var($_POST['date_movement'], FILTER_SANITIZE_STRING);
		$type = filter_var($_POST['type_movement'], FILTER_SANITIZE_STRING);
		$txt = filter_var($_POST['txt_movement'], FILTER_SANITIZE_STRING);

		//echo $id_property .'<br>'. $agent .'<br>'. $hour .'<br>'. $date .'<br>'. $type .'<br>'. $txt;

		$query = $con->prepare("INSERT INTO tbl_movement_property (id_property, agent_movement, date_movement, type_movement, txt_movement)
         VALUES (:id_property,:agent_movement,:date_movement,:type_movement,:txt_movement)");
         
        // bindParam('valor_input', $variable_input);
		$query->bindParam('id_property', $id_property);
		$query->bindParam('agent_movement', $agent);
		$query->bindParam('date_movement', $date);
		$query->bindParam('type_movement', $type);
		$query->bindParam('txt_movement', $txt);

		if ($query->execute()) {
				echo 'ok';
			}else{
                echo 'error';
                die($query);
			}
	}