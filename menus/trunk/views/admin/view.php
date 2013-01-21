<a href="<?php e(admin_url('menus'))?>">Menus list</a> | 
<a href="<?php e(admin_url('menus/'.$menu['id'].'/items/add'))?>">Add menu item</a>

<table style="width: 100%;" border="1">
<thead>
<tr>
	<th>Title</th>
	<th>Type</th>
	<th>Link</th>
	<th style="width: 1%;" colspan="2"></th>
</tr>
</thead>
<?php
	if(count($items) > 0) {
?>
<tbody><?php show_row($menu, $items, 0)?></tbody>
<?php
	}
	else {
?>
<tr>
	<td colspan="6" style="text-align: center; height: 200px;">No menu items</td>
</tr>
<?php
	}
?>
</table>
<?php
	function show_row($menu, $rows=array(), $padding=0) {
		foreach($rows as $i) {
?>
	<tr>
		<td style="padding-left: <?php e($padding)?>px;"><?php e(empty($i['title']) ? '&mdash; (no title)' : $i['title'])?></td>
		<td><?php e($i['type'])?></td>
		<td><?php e($i['value'])?></td>
		<td><a href="<?php e(admin_url('menus/'.$menu['id'].'/items/edit/'.$i['id']))?>">Edit</a></td>
		<td><a href="<?php e(admin_url('menus/'.$menu['id'].'/items/delete/'.$i['id']))?>">Delete</a></td>
	</tr>
<?php
			if(!empty($i['child_items'])) show_row($menu, $i['child_items'], $padding+10);
		}
	}
