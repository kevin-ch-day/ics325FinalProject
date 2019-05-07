<?php
require_once('includes\header.inc');
/*
 * #1 - Admin can specify an image and create links (rectangular areas)
 * #2 - Admin can delete, update the previously created links
 * #3 - Admin can submit / persist the data into the database
 * #4 - Admin is able to retrieve the existing links
 */
?>

<style>
td, th{
    padding: 5px;
}
</style>
<h1>Admin Page</h1>

<?php
mysqli_select_db($conn, "mainimage");
$query = "SELECT * FROM mainimage";
$result = aQuery($query);

if($result->num_rows > 0 ){
    $row = $result->fetch_array();
    $image = $row['image_name'];
    $result->free();
}

if(isset($image)){
    echo "<img src=\"images\\$image\" alt=\"Image\" usemap=\"#imageMap\">";

    echo "<map name=\"imageMap\">";
    mysqli_select_db($conn, "imageframework");
    $query = "SELECT * FROM imagelinks";
    $result = aQuery($query);
    if($result->num_rows > 0 ){
        while($row = $result->fetch_array()){
            echo "<area shape=\"rect\" coords=\"".$row['link_coords']."\" href=\"".$row['link_url']."\" target=\"".$row['link_target']."\">";
        }
        $result->free();
    }
    echo "</map>";
}

mysqli_select_db($conn, "imageframework");
$query = "SELECT * FROM imagelinks";
$result = aQuery($query);

if($result->num_rows > 0 ){
    echo "<br/><table><thead><tr>";
        echo "<th>URL</th>";
        echo "<th>Name</th>";
        echo "<th>Target</th>";
        echo "<th>Coordinates</th>";
        echo "<th>Edit</th><th>Delete</th><th>Add</th></tr>";
        echo "</thead><tbody>";

        while($row = $result->fetch_array()){
            echo "<tr>";
            echo "<td><a href=\"" . $row['link_url'] ."\" target=\"_blank\">Link</a></td>";
            echo "<td>" . $row['link_name'] . "</td>";
            echo "<td>" . $row['link_target'] . "</td>";
            echo "<td>(" . $row['link_coords'] . ")</td>";
            echo "<td><a href=\"editLink.php?id=".$row['id']."\">Edit</a></td>";
            echo "<td><a href=\"deleteLink.php?id=".$row['id']."\">Delete</a></td>";
            echo "<td><a href=\"imageFramework_single.php\">Add</a></td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
        // Free result set
        $result->free();
} else{
    echo "<p><em>No records were found.</em></p>";
    echo "<p><a href=\"imageFramework_single.php\">Add a record</a></p>";
}
require_once('includes\footer.inc');
?>
