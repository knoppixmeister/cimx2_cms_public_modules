<h2><?php e(ucfirst($action))?> URL</h2>

<hr>

<?php e(form_open($action_url, array('class' => "form-horizontal", )))?>

	<fieldset>

		<div class="control-group">
            <label for="long_url" class="control-label"><font color="red">*</font> Long URL:</label>
			<div class="controls">
				<input type="text" name="long_url" id="long_url" value="<?php e(set_value('long_url', $item['long_url']))?>" class="input-xlarge span8"/>
			</div>
		</div>

		<div class="control-group">
            <label for="slug" class="control-label"><font color="red">*</font> Slug:</label>
			<div class="controls">
				<input type="text" name="slug" id="slug" value="<?php e(set_value('slug', $item['slug']))?>" class="input-xlarge span8"/>
			</div>
		</div>

		<div class="control-group">
            <label for="full_url" class="control-label">Full URL:</label>
			<div class="controls">
				<input type="text" disabled="disabled" value="sadasdasd asdas das dasd" onclick="this.selectAll()">
				<?php e(site_url("l/"))?><span id="slug_in_url">asdajksdhajshd jashdj</span>
			</div>
		</div>

		<div class="form-actions">
			<input class="btn btn-primary" type="submit" name="save" value="Save"> 
			<input class="btn" type="submit" name="save_exit" value="Save & Exit"> 
			<span style="padding-left: 30px;">
				<input class="btn" type="submit" name="cancel" value="Cancel">
			</span>
			<?php
				if($action == 'edit') {
			?>
			<a href="<?php _admin_url('l/delete/'.$item['id'])?>" class="pull-right btn btn-danger">Delete</a>
			<?php
				}
			?>
		</div>

	</fieldset>

<?php e(form_close())?>
