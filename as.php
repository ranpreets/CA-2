<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Electricity Bill Calculator</title>
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
<?php
$result_str = $result = '';
if (isset($_POST['unit-submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $result_str = 'Total amount of bill for ' . $units .'units  - ' . $result . 'Rs';
    }
}
/**
 * To calculate electricity bill as per unit cost
 */
function calculate_bill($units) {
    $unit_cost_first = 9.00;
    $unit_cost_second = 12.00;
    $unit_cost_third = 15.00;
   

    if($units <= 50) {
        $bill = $units * $unit_cost_first;
    }
    else if($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    }
    else 
    {
      $temp = (50 * 9.00) + (50 * $unit_cost_second);
        $remaining_units = $units - 100;
        $bill = $temp + ($remaining_units * $unit_cost_third);  
    }
    return number_format((float)$bill, 2, '.', '');
}

?>

<body>
	


<div class="container">


 
	<div id="page-wrap">     
    
		
		<form action="" method="post" id="quiz-form">            
            	<!-- <input type="number" name="units" id="units" placeholder="Please enter no. of Units" />             -->
                <div class="container">
		      <h1>Electricity Bill Calculator</h1>
		               <form action="" method="POST" role="form">
		                    <div class="row">
			                 <div class="col-lg-6">
				             <div class="form-group">
					         <label for="">Total Unit / Kwh</label>
					    <input type="text" class="form-control" name="units" placeholder="Input total Unit">
				</div>
			</div>



            
			<div class="col-lg-6">
				<div class="form-group">
					<label for="">Connection Type</label>
					<select class="form-control" name="meter">
						<option value="0">Commerical</option>
						<option value="0">Household</option>
					</select>
				</div>
			</div>

            <div class="col-lg-6">
			<input type="submit" class="btn btn-primary" name="unit-submit" id="unit-submit" value="Submit" />	
			</div>
            	

            <div class="col-lg-6">
			<input type="button" onclick="window.location.href = 'https://razorpay.com/payment-gateway/?utm_adgroup=pg_topkw_paytm_general_phrase&utm_gclid=Cj0KCQjwmpb0BRCBARIsAG7y4zbnse3VHmX0s-mHPuXAbBnwUO2IkSLrGqdPgcwHTNkOk6ekl0geeDcaAqT6EALw_wcB&utm_source=google&utm_medium=cpc&utm_campaign=pg_topkw&utm_term=paytm%20payment%20gateway&hsa_kw=paytm%20payment%20gateway&hsa_net=adwords&hsa_grp=104634988268&hsa_cam=9469151217&hsa_acc=9786800965&hsa_tgt=aud-487244514233:kwd-58576858430&hsa_ver=3&hsa_ad=420326402788&hsa_mt=p&hsa_src=g&gclid=Cj0KCQjwmpb0BRCBARIsAG7y4zbnse3VHmX0s-mHPuXAbBnwUO2IkSLrGqdPgcwHTNkOk6ekl0geeDcaAqT6EALw_wcB';" class="btn btn-primary"  name="unit-submit" id="submit" value="Pay" />	
			</div>
            	
            <!-- <?php

            echo "<h3> $result_str </h3>";
            ?> -->

		</form>




		<div>
        
     
      

            <div>
            <?php
			echo "<table class=\"table table-hover\">
			<thead>
				<tr>
					<th>Range</th>
					<th>Price/Unit</th>
				
					
				</tr>
			</thead>
			<tbody>
				
            <tr>
          <td>0-50</td>
          <td>9Rs/unit</td>
          
        
            </tr>
            <tr>
            <td>50-100</td>
            <td>12Rs/unit</td>
            
              </tr>
             
              <tr>
              <td>100 and above</td>
              <td>15Rs/unit</td>
               </tr>

			      <tr>
				
					<th> $result_str </th>
					<td> </td>
				</tr>
				
				</tbody>

            
            ";
        
			?>
		</div>	
	</div>
</body>
</html>