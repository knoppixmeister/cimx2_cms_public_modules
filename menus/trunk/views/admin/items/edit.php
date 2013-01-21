<?php e(form_open($action_url))?>

	<table style="width: 100%;">
	<tr>
		<th style="width: 100px;">Parent menu item</th>
		<td><?php e(form_dropdown('parent', $parents, set_value('parent', $item['parent_id'])))?></td>
	</tr>
	<tr>
		<th>Title</th>
		<td><?php e(form_dropdown('title_type', config_item('menus_title_types'), set_value('title_type', $item['title_type']))." ".form_input('title', set_value('title', $item['title'])))?></td>
	</tr>
	<tr>
		<th>Type</th>
		<td><?php e(form_dropdown('type', config_item('menus_types'), set_value('type', $item['type'])))?></td>
	</tr>
	<tr>
		<th>Value</th>
		<td><?php e(form_input('value', set_value('value', $item['value'])))?></td>
	</tr>
	<tr>
		<th>Class</th>
		<td><input type="text" name="class" value="<?php e(set_value('class', $item['class']))?>"></td>
	</tr>
	<tr>
		<th>Target</th>
		<td><?php e(form_dropdown('target', config_item('menus_targets'), set_value('target', $item['target'])))?></td>
	</tr>
	</table>

	<div>
		<input type="submit" value="Save" name="save"/> 
		<input type="submit" value="Save & Exit" name="save_exit"/> 
		<input type="submit" value="Cancel" name="cancel"/>
	</div>

<?php e(form_close())?>
