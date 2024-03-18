
<h1>Ingredients</h1>

<?php
    $result = query("SELECT * FROM ingredients ORDER BY name ASC"); # same as below
    #$result = mysqli_query($con, "SELECT * FROM ingredients ORDER BY name ASC");

    echo '<table style="table-layout:fixed">';
    echo '<col width="150px" /><col width="150px" /><col width="150px" /><col width="150px" /><col width="70px" /><col width="70px" />';
    echo "<thread>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>kcal</th>";
    echo "<th>Amount</th>";
    echo "<th>Unit</th>";
    echo "<th>Modify</th>";
    echo "<th>Remove</th>";
    echo "</tr>";
    echo "</thread>";
    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>{$row["name"]}</td>";
        echo "<td>{$row["kcal"]}</td>";
        echo "<td>{$row["amount"]}</td>";
        echo "<td>{$row["unit"]}</td>";
        echo '<td><a class="center_me"  href="?site=ingredients_edit&id=' . $row["id"] . '"><img src="static/img/pencil.svg"></a></td>';
        echo '<td><a class="center_me"  href="?site=ingredients_remove&id=' . $row["id"] . '"><img src="static/img/trash.svg"></a></td>';
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>

<button class="btn btn-success" style="margin-top: 50px;"><a href="?site=ingredient_new">Add ingredient</a></button>
