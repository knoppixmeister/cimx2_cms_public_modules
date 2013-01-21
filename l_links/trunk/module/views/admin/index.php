<h2>Links</h2>

<div style="margin-bottom: 10px;">
	<a href="<?php _admin_url('l/add')?>" class="btn btn-mini">Create link</a>
</div>

<table style="width: 100%;" class="table table-bordered">
<thead>
<tr>
	<th>Long URL</th>
	<th>Short URL</th>
	<th colspan="3" style="width: 1%;"></th>
</tr>
</thead>
<tbody>
<?php
	if(count($items) > 0) { 
		foreach($items as $i) {
?>
<tr>
	<td><?php e($i['long_url'])?></td>
	<td><?php e(site_url('l/'.$i['slug']))?></td>
	<td><a href="<?php _admin_url('l/stat/'.$i['id'])?>" class="btn">Stat</a></td>
	<td><a href="<?php _admin_url('l/edit/'.$i['id'])?>" class="btn">Edit</a></td>
	<td><a href="<?php _admin_url('l/delete/'.$i['id'])?>" class="btn btn-danger">Delete</a></td>
</tr>
<?php
		}
	}
	else {
?>
<tr>
	<td colspan="5" style="height: 200px; vertical-align: middle; text-align: center;">No URLs</td>
</tr>
<?php
	}
?>
</tbody>
</table>

<?php
	if(count($items) > 0) {
?>
{tag:pager:show base_url="<?php _admin_url('l')?>" page="<?php e($page)?>" items_count="<?php e($items_count)?>" per_page="<?php e($per_page)?>" type="ul"}
<?php
	}
?>
