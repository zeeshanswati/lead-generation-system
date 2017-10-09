<?php
require_once('includes/QueryBuilder.php');
$dbObj = new QueryBuilder();
$leads = $dbObj->table('leads')->orderBy('created_at', 'DESC')->get();

// echo "<pre>";
// print_r($leads);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bold Leads</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
<body>
    <div class="container">
    	 <div class="col-md-12 title-top">
            <h1 class="title-top">Dashboard</h1>
        </div>

    	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>First Name</th>
	                <th>Last Name</th>
	                <th>Email</th>
	                <th>Created date</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php
	        	if ($leads) {
	        		foreach ($leads as $lead) {
	        	?>
	        			<tr>
			                <td><?php echo ucfirst(strtolower($lead['first_name']));?></td>
			                <td><?php echo ucfirst(strtolower($lead['last_name']));?></td>
			                <td><?php echo $lead['email'];?></td>
			                <td><?php echo date("m/d/Y h:i a", strtotime($lead['created_at']));?></td>
			                <td><a href="detail.php?id=<?php echo $lead['id'];?>" class="btn btn-primary pull-right">Detail</a></td>
			                
			            </tr>
	        	<?php
	        		}
	        	}
	        	?>
	        </tbody>
    	</table>
            
    </div>
</body>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#example').DataTable({
    		"order": [[ 3, "desc" ]]
	    });
	} );
</script>
</html>



