<?php
require_once('includes\header.inc');
$image = $_SESSION['image'];
static $numClickes = 0;
?>
<style>
</style>
<div id="content">
  <div id="main-menu">
    <h2 align="center">Image Map</h2>
	
	
	<?php 
		$imageName = explode(".", $_SESSION['image']);
	?>

	<!-- display image here -->
	<img src="uploads\<?php echo $_SESSION['image']; ?>" id="uploadedImage" alt="uploaded image" border="1" usemap="#<?php echo $imageName[0]; ?>" />

	
<form action="generateImageMap.php" method="POST" id="imageLinkForm"></form>
<table id="imageLinkTable">
<tr><th>Active</th><th>Link</th><th>Title</th><th>Target</th></tr>
<tr id="">
	<td align="center"><input type="radio" name="active" value="active" form="imageLinkForm" checked></td>
	<td><input type="text" name="link"></td><td><input type="text" name="title" form="imageLinkForm"></td>
	<td><select name="" form="imageLinkForm">
		<option value="---">---</option>
		<option value="_blank">_blank</option>
		<option value="_parent">_parent</option>
		<option value="_parent">_parent</option>
		<option value="_top">_top</option>
		</select>
	</td>
</tr>
<tr><td><button onclick="addNewArea()">Add New Area</button></td><td></td><td></td><td><input type="submit" value="Submit" form="imageLinkForm"></td></tr>
</table>


<script>

function showCoords(event) {
  var x = event.clientX;
  var y = event.clientY;
  return new Array(x,y);
}

function addNewArea(){
	var table = document.getElementById("imageLinkTable");
	var newRow = table.insertRow(1);
	newRow.setAttribute("id", "myIdNameforThisRow");
	var activeCell = newRow.insertCell(0);
	var linkCell = newRow.insertCell(1);
	var titleCell = newRow.insertCell(2);
	var targetCell = newRow.insertCell(3);

	//activeCell.stlye.cssText="align='center'";
	activeCell.innerHTML="<input type='radio' name='active' value='active' form='imageLinkForm'>";
	activeCell.style.align="center";
	linkCell.innerHTML="<input type='text' name='link' form='imageLinkForm'>";
	titleCell.innerHTML="<input type='text' name='title' form='imageLinkForm'>";
	targetCell.innerHTML=`<select name="" form="imageLinkForm">
			<option value='---'>---</option>
			<option value='_blank'>_blank</option>
			<option value='_parent'>_parent</option>
			<option value='_parent'>_parent</option>
			<option value='_top'>_top</option>
		</select>`;
}
</script>
  </div>
</div>

<?php
require_once('includes\footer.inc');
?>
