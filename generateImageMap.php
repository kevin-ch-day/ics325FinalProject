<?php
require_once('includes\header.inc');

// get form data
$url = $_POST["url"];
$name = $_POST["name"];
$target = $_POST["target"];
$coords = $_POST["coords"];
$image = $_POST["imageName"];

// image itself
mysqli_select_db($conn, "mainimage");
$query = "SELECT * FROM mainimage";
$result = aQuery($query);

// if there already is an image
if($result->num_rows > 0 ){
    /*
    $result->free();
    
    // delete old image name
    $sql = "DELETE FROM mainimage";
    aQuery($sql);

    // insert new image name
    $sql = "INSERT INTO mainimage (image_name) VALUES ('$image')";
    aQuery($sql);

    // delete old link data
    mysqli_select_db($conn, "imagelinks");
    $sql = "DELETE FROM imagelinks";
    aQuery($sql);
    */
// no image uploaded yet
}else{

    // insert new image name
    $sql = "INSERT INTO mainimage (image_name) VALUES ('$image')";
    aQuery($sql);
}

echo "<b>Link:<a href=\"$url\">$url</a></b><br/>";
echo "<b>Title: $name</b><br/>";
echo "<b>Target: $target</b><br/>";
echo "<b>Coords: $coords</b><br/>";
echo "<b>Image Name: $image</b><br/>";
echo "<a href=\"admin.php\">Admin Page</a><br/>";

// image framework
mysqli_select_db($conn, "imageframework");
$sql = "INSERT INTO imagelinks (image_name, link_url, link_name, link_target, link_coords)
VALUES ('$image', '$url', '$name', '$target', '$coords')";
aQuery($sql);

require_once('includes\footer.inc');
?>