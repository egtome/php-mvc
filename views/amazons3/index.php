<?php
defined('SITE_LOADED') OR exit('Access denied');
?>
<h1>File Upload to S3</h1>
<div id="errorMsg"><?php echo $this->error; ?></div>
<form method="POST" action="/amazons3/upload" enctype="multipart/form-data">
    <p><input type="file" name="filename" accept="txt|pdf|jpg"/></p>
    <p><input type="submit" value="Upload" /></p>
</form>