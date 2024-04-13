
<?php
use rpsteinbrueck\jwe23\classes\validate;
use rpsteinbrueck\jwe23\classes\model\row\vehicle;

$success = false;

if (!empty($_POST)) {
    $validate = new validate();
    if ($validate->check_if_set($_POST["license_plate"], "licence plate")) {
        $validate->is_license_plate($_POST["license_plate"], "licence plate");
    }
    $validate->check_if_set($_POST["brand"], "brand");
    $validate->check_if_set($_POST["model"], "model");
    if ($validate->check_if_set($_POST["model_year"], "model year")) {
        $validate->is_a_year($_POST["model_year"], "model year");
    }
    $validate->check_if_set($_POST["color"], "color");

    if ($validate->no_errors()) {
        # save
        $vehicle = new vehicle(array(
            "license_plate" => $_POST["license_plate"],
            "brand" => $_POST["brand"],
            "model" => $_POST["model"],
            "model_year" => $_POST["model_year"],
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
?>
<form action="?site=vehicle_edit" method="post">
    <div>
        <label for="license_plate">License plate</label>
        <input type="text" name="license_plate" id="license_plate" class="form-control"
        <?php
			if (!empty($_POST['license_plate'])) {
        		echo "value=" . htmlspecialchars($_POST['license_plate']);
        	}
		?>>
    </div>
    <br>
    <div>
        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" class="form-control"
        <?php
			if (!empty($_POST['brand'])) {
        		echo "value=" . htmlspecialchars($_POST['brand']);
        	}
		?>>
    </div>
    <br>
    <div>
        <label for="model">Model</label>
        <input type="text" name="model" id="model" class="form-control"
        <?php
			if (!empty($_POST['model'])) {
        		echo "value=" . htmlspecialchars($_POST['model']);
        	}
		?>>
    </div>
    <br>
    <div>
        <label for="model_year">Model year</label>
        <input type="number" name="model_year" id="model_year" class="form-control"
        <?php
			if (!empty($_POST['model_year'])) {
        		echo "value=" . htmlspecialchars($_POST['model_year']);
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