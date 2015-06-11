<html>
<head>

    <title>Welcome Manager</title>

    <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="required/font-awesome.css" rel="stylesheet">
    <link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 
    
    <link rel="stylesheet" type="text/css" media="screen" href="required/default.css" />
    
    
</head>

<body>
    
    <?php
    require 'required/connectivity.php';
    require 'required/fn.php';
    session_start();
    if(!isset($_SESSION['manager'])&&!isset($_SESSION['admin'])){
        redirect('login.php');
    }
    include 'header.html'; 
    ?>    

    <div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
        <div id="container" class="container-fluid">
            <div id="wrapper" class="row">
                <?php if(isset($_SESSION['manager'])){
                   include 'sidebar.php';
               }else if(isset($_SESSION['admin'])){
                  include 'asidebar.php';
              } ?>  
              <div id="main-wrapper" class="col-xs-10 pull-right">
                <div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
                    <h1> Export data</h1>
                    <hr><br><br>
                    
                    <form action="required/excel.php" method="post" class="form-horizontal" onsubmit="return valid()">
                       
                       <table >
                           
                           <tr>

                               <td><p>Select employee: </p></td>
                               <td style="padding-left:5px; padding-bottom:7px"> <select name ='emp_code' class="form-control">
                                 <?php
                                 $query = "SELECT emp_code , name FROM login";
                                 if($result=mysql_query($query)){
                                    while($row=mysql_fetch_assoc($result)){
                                        $emp_code = $row['emp_code'];
                                        $name = $row['name'];
                                        echo "<option value = $emp_code>$name ($emp_code)</option>";
                                    }
                                }
                                ?>
                                <option value='-1' selected="selected"> All.. </option></select> </td>
                            </tr>
                            <tr>
                               <td><br></td>
                           </tr>
                           <tr>
                               <td> <p style="padding-top:5px"> Time period: </p></td>
                               <td> <input name='all' type="radio"  id="all" onclick="change(2)" checked> Full</td>
                               <td> <input name='choose' type="radio"  onClick="change(1)" id="choose"> Choose.. </td>
                           </tr>
                           <tr>
                               <td><br></td>
                           </tr>

                           <tr>
                               <td></td>
                               <td> 
                                <div class='date'>
                                    <input name='from' type='text' class="form-control" id="frm" placeholder="From.." />
                                    
                                </div><br>
                                
                                <div class='date'>
                                    <input type='text' name='to' class="form-control" id="to" placeholder="To.."  />
                                    
                                </div>
                                
                                
                            </td>
                            
                        </tr>
                        <tr>
                           <td><br> <button name='submit' type="submit" class="btn btn-primary" > Download Excel </button></td>
                       </tr>
                       
                   </table>
                   <p class="text-danger" id="date_span" ></p>
                   
               </form>
               <p class='text-danger' >
                   <?php
                   if(isset($_GET['err'])){
                    if($_GET['err']==101){
                        echo "Enter Dates Correctly and try again!";
                    }else if($_GET['err']==202){
                        echo "Enter all details!";
                    }
                }
                ?>
            </p>
            
            <script type="text/javascript" src="required/jquery.js"></script>
            <script type="text/javascript" src="required/zebra_datepicker.js"></script>
            <script type="text/javascript">

                $('#frm').Zebra_DatePicker({
                    pair:$('#to')
                });
                $('#to').Zebra_DatePicker({
                    direction:1
                });
                function valid () {
                    if(($('#to').val()==''||$('#frm').val()=='')&& $('#choose').is(':checked')) {
                      $('#date_span').html('Enter the required dates!');
                      return false;
                  }
                  return true;
              }
          </script>
      </div>

      <script type="text/javascript">
        $('.date').hide();
        function change(x) {
            if (x==1) {
                document.getElementById("frm").disabled = false;
                document.getElementById("to").disabled = false;
                $('.date').show();
                $('#all').prop('checked', false);
            }
            else {
                document.getElementById("frm").disabled = true;
                document.getElementById("to").disabled = true;
                $('.date').hide();
                $('#choose').prop('checked',false);
            }
            $('#frm').prop('value','');
            $('#to').prop('value','');

        }

    </script>


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


<script src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
<script src="scripts.js"></script>
<script type="text/javascript" src="required/moment.js"></script>



</body>

</html>