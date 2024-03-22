
<h1>Recipes</h1>
<?php
    $result = query("SELECT * FROM recipes ORDER BY title ASC"); # same as below
    #$result = mysqli_query($con, "SELECT * FROM ingredients ORDER BY name ASC");

    echo '<table style="table-layout:fixed">';
    echo '<col width="150px" /><col width="250px" /><col width="150px" /><col width="70px" /><col width="70px" />';
    echo "<thread>";
    echo "<tr>";
    echo "<th>title</th>";
    echo "<th>description</th>";
    echo "<th>user</th>";
    echo "<th>modify</th>";
    echo "<th>remove</th>";
    echo "</tr>";
    echo "</thread>";
    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)){
        $user_id_result  = query("SELECT username FROM users WHERE id = " . $row["user_id"] . ";");

        echo "<tr>";
        echo "<td>{$row["title"]}</td>";
        echo "<td>{$row["description"]}</td>";
        echo "<td>" . mysqli_fetch_assoc($user_id_result)["username"] . "</td>";
        echo '<td><a class="center_me" href="?site=recipe_edit&id=' . $row["id"] . '"><img src="static/img/pencil.svg"></a></td>';
        echo '<td><a class="center_me" href="?site=recipe_remove&id=' . $row["id"] . '"><img src="static/img/trash.svg"></a></td>';
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>

<a  class="btn btn-success" style="margin-top: 50px;" href="?site=recipe_new">Add recipe</a>
