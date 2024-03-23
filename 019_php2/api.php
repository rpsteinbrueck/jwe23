<?php

require "admin/functions.php";
header("Content-Type: application/json");

function error($msg) {    
    header("HTTP/1.1 404 Not Found");
    echo json_encode(array(
        "status" => 0, // exit status code should always be given
        "error" => $msg
    ));
    exit;
}

//GET
$requst_uri_without_get = explode("?", $_SERVER["REQUEST_URI"])[0];

$pieces = explode("/api/", $requst_uri_without_get, 2);
$parameter =  explode("/", $pieces[1]);

$api_version =  ltrim(array_shift($parameter), "vV"); # small and big

if (empty($api_version)) {
    error("Please give a api_version as input");
}

foreach ($parameter as $k => $v) {
    if (empty($v)) {
        unset($parameter[$k]);
    } else {
        # convert all parameters to small chars
        $parameter[$k] = mb_strtolower($v);
    }
}

$parameter = array_values($parameter);

if (empty($parameter)) {
    error("No method was given after version");
}

# up until this point it is the basics for every api
# /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
# after this it is specific

if ($parameter[0] == "ingredients") {
    # retrieve list of all ingredients
    $output = array(
        "status" => 1, 
        "result" => array()
    );

    $result = query("SELECT * FROM ingredients ORDER BY id ASC;");
    while ($row = mysqli_fetch_assoc($result)) {
        $output["result"][] = $row;
    }

    echo json_encode($output);
    exit;

} elseif ($parameter[0] == "recipes") {

    if (!empty($parameter[1])){
        # give id with
        $output = array(
            "status" => 1, 
            "result" => array()
        );

        $sql_recipe_id = escape($parameter[1]);
        $result = query("SELECT * FROM recipes WHERE id = '{$sql_recipe_id}';");
        $recipe = mysqli_fetch_assoc($result);
        if(!$recipe) {
            error("recipe does not exist");
        } else {
            $output["result"] = $recipe;

            $result = query("SELECT id,username,email FROM users where id = '{$recipe["user_id"]}'");
            $output["user"] =  mysqli_fetch_assoc($result);

            $result =  query("SELECT ingredients.* FROM ingredients_for_recipes 
                              JOIN ingredients ON ingredients_for_recipes.ingredients_id = ingredients.id
                              WHERE ingredients_for_recipes.recipes_id = '{$sql_recipe_id}'
                              ORDER BY ingredients_for_recipes.id;");
            $output["ingredients"] = array();



            echo json_encode($output);
            exit;
        }
    }


    # retrieve list of all ingredients
    $output = array(
        "status" => 1, 
        "result" => array()
    );

    $result = query("SELECT * FROM recipes ORDER BY id ASC;");
    while ($row = mysqli_fetch_assoc($result)) {
        $output["result"][] = $row;
    }

    echo json_encode($output);
    exit;
} else {
    error("The method '{$paramter[0]}', does not exist");
}

?>