<?php $this->load->view('header'); ?>

</head> <!-- Close HEAD -->

<body> <!-- Open Body -->

		<?php $this->load->view('top_navbar'); ?>

		<div class="container" id="main-container">
			<div class="page-header">
				<h1><span class="glyphicon glyphicon-asterisk"></span> <?php xecho ( $page_title ) ?></h1>
			</div>
			<p class="lead"><?php xecho ( $message ) ?></p>
		</div>
		
		

<?php $this->load->view('footer'); ?>
