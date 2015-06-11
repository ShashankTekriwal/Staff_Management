<html>
<head>

	<title>Welcome Manager</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css">
    <!-- Morris Charts CSS -->
    <link rel="stylesheet" type="text/css" href="required/morris.css">
    
</head>

<body>
	<?php
    require 'required/fn.php';
    require 'required/connectivity.php';
    session_set_cookie_params(0);
    session_start();
    if(!isset($_SESSION['manager'])){
        redirect('login.php');
    }
    require 'required/manager_dashboard.php';
    date_default_timezone_set('Asia/Kolkata');
    $endDate = date('Y-m-d');
    $startDate = date('Y-m-d',strtotime($endDate.'-7days'));
    
    
    
    $text = donut_data($startDate,$endDate);
    ?>
    <?php include 'header.html'; ?>    

    <div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
    	<div id="container" class="container-fluid">
            <div id="wrapper" class="row">
                <?php include 'sidebar.php'; ?>  
                <div id="main-wrapper" class="col-xs-10 pull-right">
                  <div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
                    <h1> Welcome Manager </h1>
                    <hr>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Today's Statistics
                        </li>
                    </ol>
                    <div class="row">
                        <div class="col-lg-4 col-md-4" >
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $arr[0] ;?></div>
                                            <div>New Requests!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="newRequests.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="panel panel-red" >
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-clock-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $arr[1];?></div>
                                            <div>Pending Requests</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="queuedRequests.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4" >
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-check-circle fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $arr[2];?></div>
                                            <div>Completed Requests</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="completedRequests.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                           <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Weekly Stats</h3>
                            </div>
                            <div align="center" class="panel-body">
                                <div id="morris" align="center" style="height:150px;width:150px;"></div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>                   
                

            </div>
        </div>
    </div>
</div>
</div>

<?php include 'footer.html'; ?>     

<script type="text/javascript">
  function alertFunc(){
   alert("Logged out!");
}
</script>

<script src="required/jquery.js"></script>
<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
<script src="scripts.js"></script>

<script src="required/raphael-min.js"></script>
<script src="required/morris.min.js"></script>
<script type="text/javascript">
    Morris.Donut({
        element:'morris',
        data:<?php echo $text; ?>
    });
</script>


</body>

</html>