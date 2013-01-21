<?php e(form_open($action_url))?>

	<table width="100%">
	<tr>
		<th>Name</th>
		<td><input type="text" name="name" value="<?php e(set_value('name', $item['name']))?>"></td>
	</tr>
	<tr>
		<th>Value</th>
		<td><input type="text" name="value" value="<?php e(set_value('value', $item['value']))?>"></td>
	</tr>
	<tr>
		<th></th>
		<td><input type="submit" value="Save" name="save"/></td>
	</tr>
	</table>

<?php e(form_close())?>
