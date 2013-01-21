<style type="text/css">
	.ui-dialog-content {
		padding: 0;
	}
</style>

<div id="dialog" title="Current server phpinfo output">
	<iframe src="<?php e(admin_url('phpinfo/info'))?>" width="100%;" height="100%;" style="border: 0; margin: 0;"></iframe>
</div>

<button id="opener">Show info</button>

<script type="text/javascript">
	$(function() {
		$("#dialog").dialog({
			width: 	($(document).width()/5*4), 
			height: ($(document).height()/5*4), 
			modal: 	true 
		});
		$("#opener").click(function() {
			$("#dialog").dialog("open");
			return false;
		});
	});
</script>