<a href="<?php e(admin_url('menus/groups/create'))?>">Create menu group</a>

<table style="width: 100%;" border="1">
<thead>
<tr>
	<th>Group title</th>
	<th style="width: 150px;">tag code</th>
	<th colspan="3" style="width: 1%;"></th>
</tr>
</thead>
<tbody>
<?php
	if(count($groups) > 0) {
		foreach($groups as $g) {
?>
<tr>
	<td><?php e($g['title'])?></td>
	<td>{tag:menus:group id="<?php e($g['id'])?>"}</td>
	<td><a href="<?php e(admin_url('menus/create/group/'.$g['id']))?>">Add menu</a></td>
	<td><a href="<?php e(admin_url('menus/groups/edit/'.$g['id']))?>">Edit</a></td>
	<td><a href="<?php e(admin_url('menus/groups/delete/'.$g['id']))?>">Delete</a></td>
</tr>
<tr>
	<td colspan="5">
		<?php
			if(count($g['menus']) > 0) {
		?>
		<table style="width: 100%;" border="1">
		<thead>
		<tr>
			<th style="width: 1%;">#</th>
			<th>Title</th>
			<th style="width: 150px;">Tag code</th>
			<th style="width: 1%;" colspan="3"></th>
		</tr>
		</thead>
		<tbody>
		<?php
			foreach($g['menus'] as $m) {
		?>
		<tr>
			<td><?php e($m['id'])?></td>
			<td><?php e($m['title'])?></td>
			<td>{tag:menus:show id="<?php e($m['id'])?>"}</td>
			<td><a href="<?php e(admin_url('menus/edit/'.$m['id']))?>">Edit</a></td>
			<td><a href="<?php e(admin_url('menus/view/'.$m['id']))?>">View</a></td>
			<td><a href="<?php e(admin_url('menus/delete/'.$m['id']))?>">Delete</a></td>
		</tr>
		<?php
			}
		?>
		</tbody>
		</table>
		<?php
			}
		?>
	</td>
</tr>
<?php
		}
	}
	else {
?>
<tr>
	<td style="text-align: center; height: 100px;" colspan="5">No menus</td>
</tr>
<?php
	}
?>
</tbody>
</table>
