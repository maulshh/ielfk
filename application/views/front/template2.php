<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="product" content="CodeMastery Framework">
    <meta name="description" content="simple framework - using adminLte and metro-UI">
    <meta name="author" content="M Maulana, Malang Indonesia">
    <meta name="keywords" content="js, css, metro, framework, windows 8, metro ui, admin-lte, cms, codemastery">

    <link href="<?php echo base_url('assets/metro-ui/docs')?>/css/metro-bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/metro-ui/docs')?>/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/metro-ui/docs')?>/css/iconFont.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/metro-ui/docs')?>/css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/metro-ui/docs')?>/js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="<?php echo base_url('assets/metro-ui/docs')?>/js/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/metro-ui/docs')?>/js/jquery/jquery.widget.min.js"></script>
    <script src="<?php echo base_url('assets/metro-ui/docs')?>/js/jquery/jquery.mousewheel.js"></script>
    <script src="<?php echo base_url('assets/metro-ui/docs')?>/js/prettify/prettify.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="<?php echo base_url('assets/metro-ui/docs')?>/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="<?php echo base_url('assets/metro-ui/docs')?>/js/docs.js"></script>
    <script src="<?php echo base_url('assets/metro-ui/docs')?>/js/github.info.js"></script>

    <title>Metro UI CSS : Metro Bootstrap CSS Library</title>

    <style>
    </style>
    <script src="<?php echo base_url('assets/metro-ui/docs')?>/js/metro.min.js"></script>
</head>
<body class="metro" style="background-color: #efeae3">
<header class="bg-dark"><?=$header?></header>
<div class="container">
    <div>
        <?=$content?>
    </div>
    <?=$footer?>
</div>
<script src="<?php echo base_url('assets/metro-ui/docs')?>/js/hitua.js"></script>
</body>
</html>