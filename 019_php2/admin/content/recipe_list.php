
<h1>Recipes</h1>

<?php
    $result = query("SELECT * FROM recipes ORDER BY title ASC"); # same as below
    #$result = mysqli_query($con, "SELECT * FROM ingredients ORDER BY name ASC");

    echo '<table style="table-layout:fixed">';
    echo '<col width="150px" /><col width="250px" /><col width="150px" />';
    echo "<thread>";
    echo "<tr>";
    echo "<th>title</th>";
    echo "<th>description</th>";
    echo "<th>userid</th>";
    echo "</tr>";
    echo "</thread>";
    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>{$row["title"]}</td>";
        echo "<td>{$row["description"]}</td>";
        echo "<td>{$row["user_id"]}</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>

<button class="btn btn-success" style="margin-top: 50px;"><a href="?site=recipe_new">Add recipe</a></button>
