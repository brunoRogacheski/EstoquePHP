<?php
if(isset($_POST['action']) && !empty($_POST['action'])) {

$host = "localhost";
$username = "estoque";
$password = "estoque";
$dbname = "estoque";
$tableName = "pedido";
$action = $_POST['action'];

$con = mysql_connect($host,$username,$password);
$dbs = mysql_select_db($dbname, $con);
switch($action) {

	case 'select' :
		$rows = array();
        $result = mysql_query("SELECT pd.id_produto , pd.id_cliente , p.nome as produto , c.nome as cliente FROM $tableName pd INNER JOIN produto as p ON (pd.id_produto=p.id) INNER JOIN cliente as c ON (pd.id_cliente=c.id)");
		while($r = mysql_fetch_assoc($result)) {
			$rows[] = $r;
		}
		echo json_encode($rows);
		break;
	case 'insert' :
	    $cliente = $_POST['cliente'];
	    $produto = $_POST['produto'];
		$sql = "INSERT INTO $tableName (id_produto, id_cliente) VALUES ('$produto', '$cliente')";
        $result = mysql_query( $sql, $con );
   	    if(! $result ) {
           die('Could not enter data: ' . mysql_error());
        }
        echo json_encode('success');
		break;	
	case 'delete' :
		$cliente = $_POST['cliente'];
		$produto = $_POST['produto'];	
		$sql = "DELETE FROM $tableName WHERE id_produto = $produto AND id_cliente= $cliente";
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