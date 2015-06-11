<html>
<head>

	<title>Welcome Employee</title>

	<link href="../bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<link href="../bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css">     
	<!-- Morris Charts CSS -->

    <!--
    <link href="font-awesome.min.css" rel="stylesheet" type="text/css"> -->
</head>

<body>
	
	<?php 
	require '../required/fn.php';
	require '../required/connectivity.php';
	session_start();
	if(!isset($_SESSION['employee'])){
		redirect('../login.php');
	}
	$emp_code=$_SESSION['employee'];
	include 'eheader.php'; ?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'esidebar.php'; ?>  

				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Completed Requests</h1>
						<hr>
						<?php




						$query="SELECT * from JOB_FORM WHERE status='2' AND emp_code='$emp_code' ORDER BY submission_time DESC";
						$json = json_encode(mysql_fetch_all($query));

						if(mysql_num_rows(mysql_query($query))==0){
							echo "<p class='muted-text'> No completed Requests!</p>";
						}else{
							echo "<div id='me' class='table-responsive'></div>";


							?>   

							<button id="button1" class='btn btn-default' onclick="prev()" >Previous</button>
							<button id='button2' class='btn btn-default' onclick="newer()">Newer</button>
							<button class='btn btn-default' onclick="reset()">Show Recent</button>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include '../footer.html'; ?>     

		<script type="text/javascript">
			function alertFunc(){
				alert("Logged out!");
			}
		</script>

		<script src="../required/jquery.js"></script>    
		<script src="../bootstrap-3.2.0-dist/js/bootstrap.js"></script>

		<script type="text/javascript">
			document.getElementById("button2").disabled = true;
			var num = 8;
			var start = 0;
			var limit = num;
			var json = <?php echo $json; ?> ;
			var length = json.length;
			showData();
			function prev(){
				if(length-start>num){
					start+=num;
					limit+=num;
					document.getElementById("button2").disabled = false;
				} else {
					document.getElementById("button1").disabled = true;
				}
				showData();
			}
			function newer () {
				if(start>0){
					start-=num;
					limit-=num;
					document.getElementById("button1").disabled = false;
				}else{
					start=0;
					limit=num;
					document.getElementById("button2").disabled = true;
				}
				showData();
			}
			function reset(){
				start = 0;
				limit = num;
				document.getElementById("button1").disabled = false;
				document.getElementById("button2").disabled = true;
				showData();
			}
			function showData(){
				if(length<limit){
					min=length;
				}else{
					min=limit;
				}
				if(json!=0){
					var fields = ['job_title','job_type','address','deadline','details','submission_time'];
					var tiles = ['Task Name','Type','Address','Deadline','Additional Details','Time of Request'];
					var text="<table class='table table-hover table-bordered' ><tr>";
					for (var i = 0; i<=5; i++) {
						text+="<th>"+tiles[i]+"</th>";
					};
					text+="</tr>";
					if(start<length){
						for (var i = start; i < min; i++) {
							text+="<tr>";
							for (var j = 0; j < 6; j++) {
								if(j<=1){
									text+="<td>"+json[i][fields[j]]+"</td>";
								}else if(j==2){
									text+="<td style='width:220px'><p style='word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:200px'>"+json[i][fields[j]]+ "</p></td>";
								}else if(j==3){
									text+="<td style='width:115px'>" + json[i][fields[j]] + "</td>";
								}else if(j==4){
									text+="<td style='width:310px;'><p align='left' style='float:right;word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:300px'><small>" +json[i][fields[j]]+ "</small></p></td>";
								}else{
									text+="<td style='width:180px'>" +json[i][fields[j]]+ "</td>";
								}
							};

							text+="</tr>"
						}

					} else {
						text = "No more requests!";
					}
					document.getElementById('me').innerHTML=text;
				}
			}
		</script>
		<script src="scripts.js"></script>



	</body>

	</html>