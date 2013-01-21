<a href="<?php e(base_url());?>admin/<?php e($module)?>/upload">Upload package</a>

<table width="100%" border="1">
<thead>
<tr>
	<th>Title</th>
	<th>Version</th>
	<th>Created</th>
	<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
	if(count($items) > 0) show_row($items, 2);
	else {
?>
<tr>
	<td colspan="6" style="text-align: center; height: 100px;">No pages</td>
</tr>
<?php
	}
?>
</tbody>
</table>
<?php
	if(!isset($_REQUEST['tree'])) {
		e($this->parser->parse_string('{tag:pager:show base_url="'.base_url().'admin/pages" page="'.$page.'" items_count="'.$items_count.'" per_page="'.$per_page.'"}', array(), TRUE));
	}

	function show_row($rows=array(), $padding=0) {
		foreach($rows as $i) {
?>
	<tr>
		<td style="padding-left: <?php e($padding)?>px;"><?php e($i['title'])?></td>
		<td><?php e($i['slug'])?></td>
		<td><?php e($i['status']);?></td>
		<td><?php e(form_checkbox('is_def', NULL, (($i['is_default']) ? TRUE : FALSE)), 'disabled="disabled"')?></td>
		<td><?php e(date('d-m-Y', $i['created_time']))?></td>
		<td>
			<a href="<?php e(base_url())?>admin/pages/edit/<?php e($i['id'])?>">Edit</a> | 
			<a href="<?php e(base_url())?>admin/pages/delete/<?php e($i['id'])?>">Delete</a>
		</td>
	</tr>
<?php
			if(!empty($i['child_pages'])) show_row($i['child_pages'], $padding+10);
		}
	}
