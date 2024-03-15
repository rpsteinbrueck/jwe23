
<h1>Ingredients</h1>

<?php
    $result = mysqli_query($con, "SELECT * FROM ingredients ORDER BY name ASC");
    #print_r($result);

    echo "<table>";
    echo "<thread>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>ckal/100g</th>";
    echo "<th>Amount</th>";
    echo "<th>Unit</th>";
    echo "</tr>";
    echo "</thread>";
    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>{$row["name"]}</td>";
        echo "<td>{$row["kcal"]}</td>";
        echo "<td>{$row["amount"]}</td>";
        echo "<td>{$row["unit"]}</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>

<button class="btn btn-success" style="margin-top: 50px;"><a href="?site=ingredient_new">Add ingredient</a></button>
