<?php e(form_open_multipart(base_url(TRUE)."admin/".$module."/upload"))?>

	<?php if(!empty($error)) e($error)?>

	<input type="file" name="package"/><br/>
	<input type="submit" value="Submit"/>
	<input type="submit" value="Cancel" name="cancel"/>

<?php e(form_close())?>
