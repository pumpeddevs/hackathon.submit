<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/meyers-reset.css'); ?>" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/bootstrap/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/animate.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/codemirror/codemirror.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/codemirror/monokai.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/vendor/codemirror/lint.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/commons.css'); ?>" />

  <script type="text/javascript" src="<?php echo base_url('js/vendor/jquery-1.11.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/vendor/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/vendor/codemirror/codemirror.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/vendor/codemirror/addon/comment/continuecomment.js'); ?>"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url('js/vendor/codemirror/addon/comment/comment.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/vendor/codemirror/addon/matchbrackets.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/vendor/codemirror/addon/active-line.js'); ?>"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jshint/r07/jshint.js"></script>
	<script src="https://rawgithub.com/zaach/jsonlint/79b553fb65c192add9066da64043458981b3972b/lib/jsonlint.js"></script>
	<script src="https://rawgithub.com/stubbornella/csslint/master/release/csslint.js"></script>
	<script type="text/javascript" src="<?php echo base_url('js/vendor/codemirror/addon/lint/lint.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/vendor/codemirror/addon/lint/coffeescript-lint.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/vendor/codemirror/addon/lint/javascript-lint.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/vendor/codemirror/javascript.js'); ?>"></script>
	<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script> -->
	<script src="<?php echo base_url('js/vendor/typed.js'); ?>"></script>
	<script>var baseUrl = "<?php echo base_url() ?>";</script>

</head>
<body>
	<?php echo $this->load->view($view, $param); ?>
</body>
</html>