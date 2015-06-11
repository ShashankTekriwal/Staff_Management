<html>
<head>

	<title>Welcome Manager</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css">     
    <!-- Morris Charts CSS -->
    <link href="morris.css" rel="stylesheet">
    
</head>

<body>
	
    <?php include 'header.html'; ?>    

    <div class="row row-offcanvas row-offcanvas-left">
    	<div class="container-fluid">
      		<div class="row">
        		<?php include 'sidebar.php'; ?>  

			<div id="main" style=" padding-top:5px; width:75%; height:100%; z-index:100; margin-bottom:30px" class=" column col-xs-10">
				<h1> Rider <small> Status </small></h1>
            	<hr>
                 
                <form action="#" method="post">
                <table width="70%">
                	<tr style="width:70%">
                    	<td style="width:10%"><h4>Select Rider: </h4></td>
                        <td style="width:40%"><select class="form-control">
        				<option>Rider 1</option>
            			<option>Rider 2</option>
            			<option>Rider 3</option>
        				<option>Rider 4</option></select></td>
                        
                         <td style="width:10%; padding-top:8px; padding-left:5px"><p><button type="submit" class="btn btn-primary" onClick="replaceContentInContainer('place', 'hidden')">Submit</button></p></td>
                   </tr>
               </table> 
               </form>   
               <hr>
               
               <div id="place">
      				<p class="text-muted">Please select a rider to view his status..</p>
   				 </div>
    
    			<div id="hidden" style="display:none"> <!-- Echo the table in this div --> 
                Table will appear
                </div>
   
			</div>
         </div>
    </div>
    </div>

   	<?php include 'footer.html'; ?>     

	<script type="text/javascript">
	
	      function replaceContentInContainer(target,source) {
        document.getElementById(target).innerHTML  = document.getElementById(source).innerHTML;
      }
		function alertFunc(){
			alert("Logged out!");
		}
		
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    
	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
    <script src="scripts.js"></script>
    <script src="raphael.min.js"></script>
    <script src="morris.min.js"></script>
    <script src="morris-data.js"></script>
       

</body>

</html>