<?php
if(isset($_POST['action']) && !empty($_POST['action'])) {

$host = "localhost";
$username = "estoque";
$password = "estoque";
$dbname = "estoque";
$tableName = "cliente";
$action = $_POST['action'];

$con = mysql_connect($host,$username,$password);
$dbs = mysql_select_db($dbname, $con);
switch($action) {

	case 'select' : 

		$rows = array();
		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$id= $_POST['id'];
			$result = mysql_query("SELECT * FROM $tableName where id=$id ");          
			while($r = mysql_fetch_assoc($result)) {
				$rows[] = $r;
			}
			echo json_encode($rows);
		} else {
			$result = mysql_query("SELECT * FROM $tableName");          
			while($r = mysql_fetch_assoc($result)) {
				$rows[] = $r;
			}
			echo json_encode($rows);
		}
		break;
	case 'insert' :
	    $nome = $_POST['nome'];
	    $email = $_POST['email'];
	    $telefone = $_POST['telefone'];
		$sql = "INSERT INTO $tableName (nome, email , telefone) VALUES ('$nome', '$email', '$telefone')";
        $result = mysql_query( $sql, $con );
   	    if(! $result ) {
           die('Could not enter data: ' . mysql_error());
        }
        echo json_encode('success');
		break;
	case 'delete' :
		$id = $_POST['id'];	
		$sql = "DELETE FROM $tableName WHERE id = $id";
	    $result = mysql_query( $sql, $con );
   	    if(! $result ) {
           echo json_encode('');	
           break;
        }
        echo json_encode('success');
	    break;			
	default:
	    $nome = $_POST['nome'];
	    $email = $_POST['email'];
	    $telefone = $_POST['telefone'];
	    $sql = "UPDATE $tableName SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id = $action";
	    $result = mysql_query( $sql, $con );
   	    if(! $result ) {
           die('Could not enter data: ' . mysql_error());
        }
        echo json_encode('success');
	    break;

}

mysql_close($con);
}

?>