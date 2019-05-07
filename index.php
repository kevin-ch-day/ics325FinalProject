<?php
require_once('includes\header.inc');

mysqli_select_db($conn, "mainimage");

$query = "SELECT * FROM mainimage";
$result = aQuery($query);

if($result->num_rows > 0 ){
    $row = $result->fetch_array();
    $image = $row['image_name'];
    $result->free();
}

echo "<div id=\"content\"><div id=\"main-menu\">";

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
        

}else{
    echo "<h1>No image uploaded yet</h1>";
    echo "<a href=\"uploadImage.php\">Upload an Image</a><br/>";
}

echo "</div></div>";
require_once('includes\footer.inc');
?>