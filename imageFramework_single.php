<?php
require_once('includes\header.inc');
?>
<style>
</style>
<div id="content">
  <div id="main-menu">
    <h2 align="center">Image Map</h2>
<?php
if(isset($_SESSION['image'])){
	$image = $_SESSION['image'];
	$imageName = explode(".", $_SESSION['image']);
?>
	<!-- display image if set with a session !-->
	<img src="images\<?php echo $_SESSION['image']; ?>" id="uploadedImage" alt="uploaded image" border="1" usemap="#<?php echo $imageName[0]; ?>" />
<?php
		}else{

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
		}
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

	
<form action="generateImageMap.php" method="POST" id="imageLinkForm">
<br/>
Link: <input type="url" name="url">
Title: <input type="text" name="name">
Target: <select name="target">
		<option value="---">---</option>
		<option value="_blank">_blank</option>
		<option value="_parent">_parent</option>
		<option value="_parent">_parent</option>
		<option value="_top">_top</option>
	</select><br/>

		<input type="hidden" id="imageName" name="imageName" value="<?php echo $_SESSION['image']; ?>">
		<input type="hidden" id="coords" name="coords" value="">
		<input type="submit" value="Submit"><input type="reset" value="Reset">
</form>
  </div>
</div>

<?php
require_once('includes\footer.inc');
?>
