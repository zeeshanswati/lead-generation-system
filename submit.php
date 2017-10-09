<?php
session_start();
require_once('includes/QueryBuilder.php');

if (isset($_POST['formUniqueString']) && $_POST['formUniqueString'] == crypt('leadForm' , 'boldLeads') ) {
	unset($_POST['formUniqueString']);
	$dbObj = new QueryBuilder();
	if (empty($_SESSION['lastInsertId'])) {
		$_SESSION['lastInsertId'] = $dbObj->table('leads')->insert($_POST);
	} else {
		echo $dbObj->table('leads')->where('id', '=', $_SESSION['lastInsertId'])
			->update($_POST);
	}
}