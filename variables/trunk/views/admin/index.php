<a href="<?php e(base_url());?>admin/<?php e($module)?>/create">Create variable</a>

<table width="100%" border="1">
<thead>
<tr>
	<th>Name</th>
	<th>Value</th>
	<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
	if(count($items) > 0) {
		foreach($items as $i) {
?>
<tr>
	<td><?php echo $i['name'];?></td>
	<td><?php echo $i['value'];?></td>
	<td>
		<a href="<?php echo base_url()?>admin/<?php e($module)?>/edit/<?php echo $i['id'];?>">Edit</a>
		<a href="<?php echo base_url()?>admin/<?php e($module)?>/delete/<?php echo $i['id'];?>">Delete</a>
	</td>
</tr>
<?php
		}
	}
	else {
?>
<tr>
	<td colspan="3" style="text-align: center; height: 100px;">No variables</td>
</tr>
<?php
	}
?>
</tbody>
</table>
