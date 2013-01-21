<?php e(form_open($action_url))?>

	<table style="width: 100%;">
	<tr>
		<th>Title</th>
		<td><input type="text" id="title" name="title" value="<?php e(set_value('title', $item['title']));?>"></td>
	</tr>
	<tr>
		<th>Url</th>
		<td>
			<input type="text" id="slug" name="slug" value="<?php e(set_value('slug', $item['slug']))?>">

			<script type="text/javascript">
				$("#title").keyup(function() {
					$.get('<?php e(site_url('ajax/url_title?title='))?>'+$("#title").val(), function(data) {
						$("#slug").val(data);
					});
				});
			</script>

		</td>
	</tr>
	<tr>
		<th>Class</th>
		<td><input type="text" name="class" value="<?php e(set_value('class', $item['class']))?>"></td>
	</tr>
	</table>

	<div>
		<input type="submit" value="Save" name="save"/>
	</div>

<?php e(form_close())?>
