<?php
require_once('includes\header.inc');

echo "<div id=\"content\"><div id=\"main-menu\">";
echo "<h1>Edit Link</h1>";


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
$query = "SELECT * FROM imagelinks where id=".$_GET['id'];
$result = aQuery($query);
if($result->num_rows > 0 ){
        while($row = $result->fetch_array()){
?>
            <form action="generateImageMap.php" method="POST" id="imageLinkForm"><br/>
            Link: <input type="url" name="url" value="<?php echo $row['link_url']?>"><br/>
            Title: <input type="text" name="name" value="<?php echo $row['link_name']?>"><br/>
            Target: <select name="target">
		    <option value="---">---</option>
		    <option value="_blank">_blank</option>
		    <option value="_parent">_parent</option>
		    <option value="_parent">_parent</option>
		    <option value="_top">_top</option>
	    </select>

		<input type="hidden" id="imageName" name="imageName" value="<?php echo $_SESSION['image']; ?>"><br/>
		Coordinates: <input type="text" id="coords" name="coords" value="<?php echo $row['link_coords']; ?>"><br/>
		<input type="submit" value="Submit"><input type="reset" value="Reset"></form>
<?php
        }
        // Free result set
        $result->free();

} else{
    echo "<p><em>No records were found.</em></p>";
}
echo "</div></div>";
?>

<script>
var coords = "";

function Point(x, y){
	this.x = x;
	this.y = y;
}

function countClicks(x, y){
	if(typeof countClicks.num == 'undefined' ) {
			countClicks.num = 0;
  }

	countClicks.num++;
	
	if(countClicks.num == 1){
		coords += x + ", " + y;

	}else if(countClicks.num == 2){
		coords += ", " + x + ", " + y;
		
		console.log(coords);

		countClicks.num = 0;
		document.getElementById("coords").value = coords;
		
		coords = "";
	}
}

$(document).ready(function() {
	$("img").on("click", function(event) {
  	var x = event.pageX - this.offsetLeft;
    var y = event.pageY - this.offsetTop;

		countClicks(x, y);
    });
});
</script>

<?php
require_once('includes\footer.inc');
?>
