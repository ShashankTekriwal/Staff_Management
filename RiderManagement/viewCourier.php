<html>
<head>

	<title>Welcome Manager</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"> 

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 
</head>

<body>

	<?php

	require 'required/connectivity.php';
	require 'required/fn.php';
	include 'header.html';
	session_start();
	if(!isset($_SESSION['manager'])&&!isset($_SESSION['admin'])){
		redirect('../login.php');
	}
	?> 
	<div id='offcanvas' class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php if(isset($_SESSION['manager']))
				include 'sidebar.php';else if(isset($_SESSION['admin'])) include 'asidebar.php' ?> 
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" <div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> All Couriers </h1>
						<hr>


						<?php






						$query="SELECT * from `COURIERS` ORDER BY `Serial` DESC";
						$json = json_encode(mysql_fetch_all($query));
						$result=mysql_query($query);
						echo "<div id='me' class='table-responsive'></div>";



						?>
						<button id="button1" class='btn btn-default' onclick="prev()" >Previous</button>
						<button id='button2' class='btn btn-default' onclick="newer()">Newer</button>
						<button class='btn btn-default' onclick="reset()">Show Recent</button>

					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br><br><br>

	<?php include 'footer.html'; ?> 




	<script type="text/javascript">

		function alertFunc(){
			alert("Logged out!");
		}
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
        //document.getElementById("button1").disabled = false;
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
      //json = <?php echo $json; ?>;
      //length = json.length;
      if(length<limit){
      	min=length;
      }else{
      	min=limit;
      }
      if(json!=0){
      	var fields = ['cdate','cp','company','address','location','mobile','weight','sender','behalf','pod','details'];
      	var tiles = ['Date','Contact Person','Company','Address','Location','Mobile','Weight','Sender','Behalf','POD','Details'];

      	var text="<table class='table table-hover table-bordered' ><tr>";
      	for (var i = 0; i<tiles.length; i++) {
      		text+="<th><small>"+tiles[i]+"</small></th>";
      	};
      	text+="</tr>";
          //var num_rows=json.length;
          if(start<length){
          	for (var i = start; i < min; i++) {
          		text+="<tr>";
          		for (var j = 0; j < fields.length; j++) {

          			text+="<td><small style='word-wrap:break-word'>"+json[i][fields[j]]+"</small></td>";

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

<script src="required/jquery.js">
</script>

<script src="bootstrap-3.2.0-dist/js/bootstrap.js">
</script>
<script src="scripts.js"></script>

</body>

</html>