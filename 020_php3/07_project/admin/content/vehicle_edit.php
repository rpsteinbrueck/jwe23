
<?php
use rpsteinbrueck\jwe23\classes\validate;
use rpsteinbrueck\jwe23\classes\model\row\vehicle;
use rpsteinbrueck\jwe23\classes\mysql;
use rpsteinbrueck\jwe23\classes\model\brands;

$success = false;

if (!empty($_POST)) {
    $validate = new validate();
    if ($validate->check_if_set($_POST["license_plate"], "licence plate")) {
        $validate->is_license_plate($_POST["license_plate"], "licence plate");
    }
    $validate->check_if_set($_POST["brand"], "brand");
    $validate->check_if_set($_POST["model"], "model");
    if ($validate->check_if_set($_POST["year_model"], "year model")) {
        $validate->is_a_year($_POST["year_model"], "year model");
    }
    $validate->check_if_set($_POST["color"], "color");

    if ($validate->no_errors()) {
        # save
        $vehicle = new vehicle(array(
            "id" => $_GET["id"] ?? null,
            "license_plate" => $_POST["license_plate"],
            "brand_id" => 1,
            "model" => $_POST["model"],
            "year_model" => $_POST["year_model"],
            "color" => $_POST["color"]
        ));
        $vehicle->save();
        $success = true;
    }
}

?>
<div class="page_center">
<h1> Edit Vehicle </h1>
<?php
    if ($success) {
        $output = "";
        $output .= '<div class="alert alert-success" role="alert">';
        $output .= "Vehicle was added!";
        $output .= "</div>";

        unset ($_POST);
        echo $output;
    }

    if (!empty($validate)) {
        echo $validate->html_errors();
    }

    if(!empty($_GET["id"])){
        $vehicle = new vehicle($_GET["id"]);
    }
?>
<form action="?site=vehicle_edit<?php if (!empty($vehicle)) {
    echo "?id=" . $vehicle->id;
}?>" method="post">
    <div>
        <label for="license_plate">License plate</label>
        <input type="text" name="license_plate" id="license_plate" class="form-control"
        <?php
			if (!empty($_POST['license_plate'])) {
        		echo "value=" . htmlspecialchars($_POST['license_plate']);
        	} elseif (!empty($_GET['id'])) {
                echo htmlspecialchars($vehicle->license_plate);
            }
		?>>
    </div>
    <br>
    <div>
        <label for="brand">Brand</label>
        <select name="brand" id="brand" class="form-select"
        <?php
			if (!empty($_POST['brand'])) {
        		echo "value=" . htmlspecialchars($_POST['brand']);
        	} elseif (!empty($_GET['id'])) {
                echo htmlspecialchars($vehicle->brand);
            }
		?>>
                <?php
                $brands = new brands();
                $all_brands = $brands->all_brands();
                foreach($all_brands as $brand){
                    echo "<option value='{$brand->id}'";
                    if (!empty($_POST["brand_id"]) && $_POST["brand_id"] == $brand->id) {
                        echo "selected";
                    } elseif (!empty($vehicle) && $vehicle->brand_id == $brand->id) {
                        echo "selected";
                    }
                    echo ">". $brand->brandname . "</option>";
                }
                ?> 
        </select>
    </div>
    <br>
    <div>
        <label for="model">Model</label>
        <input type="text" name="model" id="model" class="form-control"
        <?php
			if (!empty($_POST['model'])) {
        		echo "value=" . htmlspecialchars($_POST['model']);
        	} elseif (!empty($_GET['id'])) {
                echo htmlspecialchars($vehicle->model);
            }
		?>>
    </div>
    <br>
    <div>
        <label for="year_model">year model</label>
        <input type="number" name="year_model" id="year_model" class="form-control"
        <?php
			if (!empty($_POST['year_model'])) {
        		echo "value=" . htmlspecialchars($_POST['year_model']);
        	} elseif (!empty($_GET['id'])) {
                echo htmlspecialchars($vehicle->year_model);
            } else {
                echo date("Y");
            }
		?>>
    </div>
    <br>
    <div>
        <label for="color">Color</label>
        <input type="text" name="color" id="color" class="form-control"
        <?php
			if (!empty($_POST['color'])) {
        		echo "value=" . htmlspecialchars($_POST['color']);
        	} elseif (!empty($_GET['id'])) {
                echo htmlspecialchars($vehicle->color);
            }
		?>>
    </div>
    <br>
    <div class="button_section" style= "display: flex; justify-content: space-between;">
        <div>
            <button class="btn btn-success login-button" type="submit">Save</button>
        </div>
        <div>
            <a href="?site=vehicle_list" class="btn btn-success login-button">back</a>
        </div>
    </div>
</form>
</div>