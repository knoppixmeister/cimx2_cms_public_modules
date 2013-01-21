<?php e(form_open($action_url))?>

	<table class="edit_tbl" style="width: 100%;">
	<tr>
		<th>Group</th>
		<td><?php e(form_dropdown('group', $groups, set_value('group', (empty($item['group_id']) ? $group_id : $item['group_id']) )))?></td>
	</tr>
	<tr>
		<th width="20%">Title</th>
		<td><input type="text" id="title" name="title" style="width: 400px;" value="<?php e(set_value('title', $item['title']))?>"></td>
	</tr>
	<tr>
		<th width="20%">Class</th>
		<td><input type="text" name="class" value="<?php e(set_value('class', $item['class']))?>"></td>
	</tr>
	</table>

	<input type="submit" value="Save">

<?php e(form_close())?>
