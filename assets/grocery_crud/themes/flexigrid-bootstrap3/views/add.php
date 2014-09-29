<?php
    //$this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
    $this->set_js_lib($this->default_theme_path.'/flexigrid-bootstrap3/js/jquery-migrate.js');

	$this->set_css($this->default_theme_path.'/flexigrid-bootstrap3/css/flexigrid.css');
	$this->set_js_lib($this->default_theme_path.'/flexigrid-bootstrap3/js/jquery.form.js');
	$this->set_js_config($this->default_theme_path.'/flexigrid-bootstrap3/js/flexigrid-add.js');
    
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<div class="flexigrid crud-form" style='width: 100%;' data-unique-hash="<?php echo $unique_hash; ?>">
	<div class="mDiv">
		<div class="ftitle">
			<div class='ftitle-left'>
				<?php echo $this->l('form_add'); ?> <?php echo $subject?>
			</div>
			<div class='clear'></div>
		</div>
	</div>
<div id='main-table-box'>
	<?php echo form_open( $insert_url, 'method="post" id="crudForm" autocomplete="off" enctype="multipart/form-data"'); ?>
		<div class='form-div'>
			<?php
			$counter = 0;
				foreach($fields as $field)
				{
					$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
					$counter++;
			?>
            <div class='form-group <?php echo $even_odd?>' id="<?php echo $field->field_name; ?>_field_box">
                <label for="<?php echo $field->field_name; ?>" class="col-sm-2 control-label" id="<?php echo $field->field_name; ?>_display_as_box">
                    <?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?> :
                </label>
                <div class="col-sm-10" id="<?php echo $field->field_name; ?>_input_box">
                    <?php echo $input_fields[$field->field_name]->input?>
                </div>
                <div class='clear'></div>
            </div>
			<?php }?>
			<!-- Start of hidden inputs -->
				<?php
					foreach($hidden_fields as $hidden_field){
						echo $hidden_field->input;
					}
				?>
			<!-- End of hidden inputs -->
			<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>

			<div id='report-error' class='alert alert-danger report-div error'></div>
			<div id='report-success' class='alert alert-success report-div success'></div>
		</div>
		<div class="pDiv">
			<div class='form-button-box'>
				<input id="form-button-save" type='submit' value='<?php echo $this->l('form_save'); ?>' class="btn btn-primary btn-large"/>
			</div>
<?php 	if(!$this->unset_back_to_list) { ?>
			<div class='form-button-box'>
				<input type='button' value='<?php echo $this->l('form_save_and_go_back'); ?>' id="save-and-go-back-button"  class="btn btn-large"/>
			</div>
			<div class='form-button-box'>
				<input type='button' value='<?php echo $this->l('form_cancel'); ?>' class="btn btn-large" id="cancel-button" />
			</div>
<?php 	} ?>
			<div class='form-button-box'>
				<div class='small-loading' id='FormLoading'><?php echo $this->l('form_insert_loading'); ?></div>
			</div>
			<div class='clear'></div>
		</div>
	<?php echo form_close(); ?>
</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_add_form = "<?php echo $this->l('alert_add_form')?>";
	var message_insert_error = "<?php echo $this->l('insert_error')?>";
</script>