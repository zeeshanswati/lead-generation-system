<?php session_start(); $_SESSION['lastInsertId'] = null;?>
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
        <div class="col-md-12 title-top">
            <h1 class="title-top text-center">Do you want to sell your House?</h1>
            <h3 class="title-top text-center">Find Out What Your House is Worth</h3>
        </div>

        <div class="col-md-8 form-adj">
            <div class="form-main">
                <div class="form-header">
                    <h4>There is No Harm in Talking with us</h4>
                </div>
                <div class="form-inner">
                    <form class="form-horizontal" action="#_" method="post" id="leadForm">
                        <input type="hidden" name="formUniqueString" value="<?php echo crypt('leadForm', 'boldLeads'); ?>">
                        <div class="form-group">
                            <label for="first_name" class="col-lg-3">First Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-lg-3">Last Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-lg-3">Phone</label>
                            <div class="col-lg-9">
                                <input type="phone" class="form-control" name="phone" placeholder="Phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-3">Email</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-lg-3">Address</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="address" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="home_square_footage" class="col-lg-3">Home sqft</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="home_square_footage" placeholder="Home square footage">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-9"></div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/lead.js"></script>
</body>
</html>                             