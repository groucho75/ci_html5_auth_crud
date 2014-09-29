<?php
	$this->set_css($this->default_theme_path.'/flexigrid-bootstrap3/css/flexigrid.css');
	$this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
    $this->set_js_lib($this->default_theme_path.'/flexigrid-bootstrap3/js/jquery-migrate.js');

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
	$this->set_js_lib($this->default_javascript_path.'/common/lazyload-min.js');

	if (!$this->is_IE7()) {
		$this->set_js_lib($this->default_javascript_path.'/common/list.js');
	}

	$this->set_js($this->default_theme_path.'/flexigrid-bootstrap3/js/cookies.js');
	$this->set_js($this->default_theme_path.'/flexigrid-bootstrap3/js/flexigrid.js');
	$this->set_js($this->default_theme_path.'/flexigrid-bootstrap3/js/jquery.form.js');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.numeric.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid-bootstrap3/js/jquery.printElement.min.js');
    $this->set_js($this->default_theme_path.'/flexigrid-bootstrap3/js/custom.js');
    
	/** Fancybox */
	$this->set_css($this->default_css_path.'/jquery_plugins/fancybox/jquery.fancybox.css');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.fancybox-1.3.4.js');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.easing-1.3.pack.js');

	/** Jquery UI */
	$this->load_js_jqueryui();

?>
<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';

	var subject = '<?php echo $subject?>';
	var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
	var unique_hash = '<?php echo $unique_hash; ?>';

	var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

</script>

<div class="container">
    <div id='list-report-error' class='alert alert-danger report-div error'></div>
    <div id='list-report-success' role="alert" class='alert alert-success alert-dismissible report-div success report-list' <?php if($success_message !== null){?>style="display:block"<?php }?>><?php
    if($success_message !== null){?>
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    	<p><span class="glyphicon glyphicon-ok"></span> <?php echo $success_message; ?></p>
    <?php }
    ?></div>
</div>

<div class="flexigrid container" data-unique-hash="<?php echo $unique_hash; ?>">
	<div id="hidden-operations" class="hidden-operations"></div>
	
	<div id='main-table-box' class="main-table-box row">

	<?php if(!$unset_add || !$unset_export || !$unset_print){?>
	<div class="tDiv col-md-12">
		<?php if(!$unset_add){?>
		<div class="tDiv2">
        	<a href='<?php echo $add_url?>' title='<?php echo $this->l('list_add'); ?> <?php echo $subject?>' class='btn btn-primary btn-large add-anchor add_button'>
        	    <span class="glyphicon glyphicon-plus"></span>
        	    <?php echo $this->l('list_add'); ?> <?php echo $subject?>
            </a>
		</div>
		<?php }?>
		<div class="tDiv3">
			<?php if(!$unset_export) { ?>
            <a data-url='<?php echo $export_url?>' title='<?php echo $this->l('list_export'); ?> <?php echo $subject?>' class='btn btn-default export-anchor' target="_blank">
                <span class="glyphicon glyphicon-list-alt"></span>
                <?php echo $this->l('list_export'); ?> <?php echo $subject?>
            </a>
			<?php } ?>
			<?php if(!$unset_print) { ?>
            <a data-url='<?php echo $print_url?>' title='<?php echo $this->l('list_export'); ?> <?php echo $subject?>' class='btn btn-default print-anchor'>
                <span class="glyphicon glyphicon-print"></span>
                <?php echo $this->l('list_print'); ?> <?php echo $subject?>
            </a>            
			<?php }?>
		</div>
		<div class='clear'></div>
	</div>
	<?php }?>

	<div id='ajax_list' class="ajax_list col-md-12">
		<?php echo $list_view?>
	</div>
	<?php echo form_open( $ajax_list_url, 'method="post" id="filtering_form" class="col-md-12 filtering_form" autocomplete = "off" data-ajax-list-info-url="'.$ajax_list_info_url.'"'); ?>
	<div class="sDiv quickSearchBox" id='quickSearchBox'>
		<div class="sDiv2">
			<?php echo $this->l('list_search');?>: <input type="text" class="qsbsearch_fieldox search_text" name="search_text" size="30" id='search_text'>
			<select name="search_field" id="search_field">
				<option value=""><?php echo $this->l('list_search_all');?></option>
				<?php foreach($columns as $column){?>
				<option value="<?php echo $column->field_name?>"><?php echo $column->display_as?>&nbsp;&nbsp;</option>
				<?php }?>
			</select>
            <input type="button" value="<?php echo $this->l('list_search');?>" class="crud_search" id='crud_search'>
		</div>
        <div class='search-div-clear-button'>
        	<input type="button" value="<?php echo $this->l('list_clear_filtering');?>" id='search_clear' class="search_clear">
        </div>
	</div>
	<div class="pDiv">
		<div class="pDiv2">
			<div class="pGroup">
				<div class="pSearch pButton quickSearchButton" id='quickSearchButton' title="<?php echo $this->l('list_search');?>">
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<select name="per_page" id='per_page' class="per_page">
					<?php foreach($paging_options as $option){?>
						<option value="<?php echo $option; ?>" <?php if($option == $default_per_page){?>selected="selected"<?php }?>><?php echo $option; ?>&nbsp;&nbsp;</option>
					<?php }?>
				</select>
				<input type='hidden' name='order_by[0]' id='hidden-sorting' class='hidden-sorting' value='<?php if(!empty($order_by[0])){?><?php echo $order_by[0]?><?php }?>' />
				<input type='hidden' name='order_by[1]' id='hidden-ordering' class='hidden-ordering'  value='<?php if(!empty($order_by[1])){?><?php echo $order_by[1]?><?php }?>'/>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pFirst pButton first-button">
					<span></span>
				</div>
				<div class="pPrev pButton prev-button">
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<span class="pcontrol"><?php echo $this->l('list_page'); ?> <input name='page' type="text" value="1" size="4" id='crud_page' class="crud_page">
				<?php echo $this->l('list_paging_of'); ?>
				<span id='last-page-number' class="last-page-number"><?php echo ceil($total_results / $default_per_page)?></span></span>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pNext pButton next-button" >
					<span></span>
				</div>
				<div class="pLast pButton last-button">
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pReload pButton ajax_refresh_and_loading" id='ajax_refresh_and_loading'>
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<span class="pPageStat">
					<?php $paging_starts_from = "<span id='page-starts-from' class='page-starts-from'>1</span>"; ?>
					<?php $paging_ends_to = "<span id='page-ends-to' class='page-ends-to'>". ($total_results < $default_per_page ? $total_results : $default_per_page) ."</span>"; ?>
					<?php $paging_total_results = "<span id='total_items' class='total_items'>$total_results</span>"?>
					<?php echo str_replace( array('{start}','{end}','{results}'),
											array($paging_starts_from, $paging_ends_to, $paging_total_results),
											$this->l('list_displaying')
										   ); ?>
				</span>
			</div>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php echo form_close(); ?>
	</div>
</div>
