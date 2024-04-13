<?php
use rpsteinbrueck\jwe23\classes\model\vehicles;

?>
<div class="page_normal">
<h1 class="center_me">All vehicles</h1>
    <div class='row font-weight-bold border-bottom text-center'>
      <div class='col-1'>license plate</div>
      <div class='col-2'>brand</div>
      <div class='col-2'>model</div>
      <div class='col-2'>model year</div>
      <div class='col-2'>color</div>
      <div class='col-1'>edit</div>
      <div class='col-1'>remove</div>
    </div>

<?php 
    $vehicles =  new vehicles();
    $all_vehicles = $vehicles->all_vehicles();
    #print_r($all_vehicles);

    foreach ($all_vehicles as $vehicle){
        echo "<div class='row text-center'>";
        echo "<div class='col-1'>" . $vehicle->license_plate . "</div>";
        echo "<div class='col-2'>" . $vehicle->brand_id  . "</div>";
        #echo "<div class='col-2'>" . $vehicle->get_brand()->brandname  . "</div>";
        echo "<div class='col-2'>" . $vehicle->model  . "</div>";
        echo "<div class='col-2'>" . $vehicle->year_model  . "</div>";
        echo "<div class='col-2'>" . $vehicle->color  . "</div>";
        echo '<div class="col-1"><a  href="?site=vehicle_edit&id=' . $vehicle->id . '"><img src="static/img/pencil.svg"></a></div>';
        echo '<div class="col-1"><a  href="?site=vehicle_remove&id=' . $vehicle->id . '"><img src="static/img/trash.svg"></a></div>';
        echo "</div>";
    }
?>
<a class="btn btn-success center_button" style="margin-top: 50px;"href="?site=vehicle_edit">Add Vehicle</a>

</div>