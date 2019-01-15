<?php
	include_once 'includes/dbh.inc.php';

	/*$sql = "SELECT * FROM azubi;";
	$result = mysqli_query($conn, $sql);*/
?>

<!DOCTYPE html>
<html>

<head>
	<!--boostrap-->
    <?php include('bootstrapcss.php'); ?>
    <link rel="stylesheet" href="css/style.css">

    <!--jquery-->
    <script src="js/jquery-3.3.1.js"></script>

    <!--moment-->
    <script src="js/moment.js"></script>
    <script src="js/momentDE.js"></script>


    <!--Datetimepicker-->
    <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.css">
    <script src="js/tempusdominus-bootstrap-4.js"></script>

	<title>Eintrag</title>
</head>

<body>
	<header>
	<?php include('navbar.php'); ?>
	</header>
	<div class="container">
	<div class="card bg-light text-dark">
	  <div class="card-body">

	  	<form name="test" action="includes/speichern.eintrag.inc.php" method="POST">

		  		<div class="input-group mb-3">
			          <div class="input-group-prepend">
			            <label class="input-group-text" for="inputGroupSelectName">Name</label>
			          </div>
			        <select name = "name" class="custom-select" id="inputGroupSelectName">
			         	<option selected>Wähle deinen Namen aus...</option>
			            <option value = "<?php echo("{$_SESSION['userId']}");?>"><?php echo("{$_SESSION['userId']}");?></option>
			        </select>
			    </div>

			        <div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Grund</span>
					 </div>
					 <input type="text" name="Grund" placeholder= "Grund" class="form-control">
					</div>

					<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 </div>
					 <input type="text" name="Grund" disabled="true" placeholder= "Gib für Urlaub= U, Uni= S, Berufschule= B, N= alles andere ein." class="form-control">
					</div>

					<div class="input-group mb-3">
			          <div class="input-group-prepend">
			            <label class="input-group-text" for="inputGroupSelectName">Tageszeit</label>
			          </div>
			         <select name = "name" class="custom-select" id="inputGroupSelectName">
			         	<option selected>Ganzer Tag</option>
				        <option>Teilweise anwesend</option>   
			          </select>
			        </div>

					
				<!--hier kommen die 2 Datumsfelder hin-->
				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Anfang</span>
					 </div>
					 <input type="date" name="DatumVon" id="Anfang" placeholder= "DatumVon" class="form-control">
				</div>


				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Ende</span>
					 </div>
					 <input type="date" name="DatumBis" placeholder= "DatumBis" class="form-control">
				</div>

				<!--test-->			
   					<!--<div class="row">-->
       					<!--<div class="col-sm-6">-->
            				<!--<div class="form-group">-->
                				<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                					<div class="input-group mb-3">
					 					<div class="input-group-prepend">
					 						<span class="input-group-text" id="inputGroupName">Anfang</span>
					 					</div>
                    					<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
										<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        				<div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        				</div>
                    				<!--</div>-->
                				<!--</div>-->
            				<!--</div>-->
       					</div>
        				<script type="text/javascript">
            				$(function () {
                				$('#datetimepicker1').datetimepicker({
                					locale: 'de',
                					autoclose: 'true'
                				});
            				});
        				</script>
    				</div>


    			<!--<div class="row">
       					<div class="col-sm-6">-->
            				<!--<div class="form-group">-->
                				<div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                					<div class="input-group mb-3">
					 					<div class="input-group-prepend">
					 						<span class="input-group-text" id="inputGroupName2">Ende</span>
					 					</div>
                    					<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
										<div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        				<div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        				</div>
                    				<!--</div>
                				</div>-->
            				<!--</div>-->
       					</div>
        				<script type="text/javascript">
            				$(function () {
                				$('#datetimepicker2').datetimepicker({
                					locale: 'de',
                					autoclose: 'true'
                				});
            				});
        				</script>
    				</div>

				<!--hier kommen die 2 UhrzeitenFelder hin-->
				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Von</span>
					 </div>
					 <input type="time" name="UhrzeitVon" id="Von" placeholder= "UhrzeitVon" class="form-control" disabled="true">
				</div>


				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Bis</span>
					 </div>
					 <input type="time" name="UhrzeitBis" placeholder= "UhrzeitBis" class="form-control">
				</div>

				</div>

				<button type="submit" name = "submit" class="btn btn-success btn-lg btn-block">Speichern</button>	

		</form>
		<script type="text/javascript">
			var anfang = document.getElementById("Anfang");
			anfang.onchange = function () {
   				if (this.value != "" || this.value.length > 0) {
      			document.getElementById("Von").disabled = false;
   				}
			}
		</script>

	</div>
	</div>
	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>