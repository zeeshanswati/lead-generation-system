<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    require_once('includes/QueryBuilder.php');
    $dbObj = new QueryBuilder();
    $lead = $dbObj->table('leads')->getById($_GET['id']);
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bold Leads</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <div class="container">
        <div class="col-md-8 form-adj">
            <div class="form-main">
                <div class="form-header">
                    <div class="col-lg-10"><h4>Detail</h4></div>
                    <div class="col-lg-2">
                        <a href="dashboard.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="form-inner">
                     <div class="form-horizontal">
                      
                        <div class="form-group">
                            <label class="col-lg-3">First Name</label>
                            <div class="col-lg-9">
                                 <label class="col-lg-9 detail-text"><?php echo $lead['first_name']; ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3">Last Name</label>
                            <div class="col-lg-9">
                                <label class="col-lg-9 detail-text"><?php echo $lead['last_name']; ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3">Phone</label>
                            <div class="col-lg-9">
                                <label class="col-lg-9 detail-text"><?php echo $lead['phone']; ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="col-lg-3">Email</label>
                            <div class="col-lg-9">
                                <label class="col-lg-9 detail-text"><?php echo $lead['email']; ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3">Address</label>
                            <div class="col-lg-9">
                                <label class="col-lg-9 detail-text"><?php echo $lead['address']; ?></label>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3">Home sqft</label>
                            <div class="col-lg-9">
                                <label class="col-lg-9 detail-text"><?php echo $lead['home_square_footage']; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3">Submitted at</label>
                            <div class="col-lg-9">
                                <label class="col-lg-9 detail-text"><?php echo date("m/d/Y h:i a", strtotime($lead['created_at'])); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>                             