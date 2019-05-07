<?php
require_once('includes\header.inc');
?>

<div id="content">
  <div id="main-menu">
    <h2>Please select an image from your pc</h2>
    <form action="checkUploadedImage.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
  </div>
</div>

<?php
require_once('includes\footer.inc');
?>