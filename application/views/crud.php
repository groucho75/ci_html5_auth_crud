<?php $this->load->view('header'); ?>

	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

</head> <!-- Close HEAD -->

<body> <!-- Open Body -->

		<?php $this->load->view('top_navbar'); ?>

		<div class="container" id="main-container">
			<div class="page-header">
				<h1><span class="glyphicon glyphicon-asterisk"></span> <?php xecho ( $page_title ) ?></h1>
			</div>
			
			<?php echo $output; ?>
			
		</div>
		
		

<?php $this->load->view('footer'); ?>
