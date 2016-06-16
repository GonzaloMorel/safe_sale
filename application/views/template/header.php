<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de Gestion de Venta">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Jquery UI CSS -->
<!--        <link rel="stylesheet" href="<?php// echo base_url(); ?>assets/_jqueryUi/css/smoothness/jquery-ui-1.10.3.custom.css" />-->

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/_bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/_css/bootstrap-glyphicons.css" />

        <!-- TimePicker CSS -->
        <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/_timepicker/css/bootstrap-timepicker.min.css" />
        
        <!-- DatePicker CSS-->
        <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/_datepicker/css/datepicker3.css" />
        
<!--         CSS Estilo less 
        <link rel="stylesheet" href="<?php // echo base_url(); ?>assets/_css/estilos.less" />-->
        
        <!-- CSS Estilo -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/_css/styles.css" />

        <!--Modernizer -->
        <script src="<?php echo base_url(); ?>assets/_js/modernizr-2.6.2.min.js" type="text/javascript"></script>
        
        
        <?php // echo print_r($css_files); ?>
        <?php // foreach($css_files as $file): ?>
                <!--<link type="text/css" rel="stylesheet" href="<?php // echo $file; ?>" />-->
        <?php // endforeach; ?>

        <!-- JQuery -->
        <!-- First try for the online version of jQuery-->
        <script src="http://code.jquery.com/jquery.js"></script>

        <!-- If no online access, fallback to our hardcoded version of jQuery -->
        <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/_jqueryUi/js/jquery-1.9.1.js"><\/script>')</script>

        <title>Ventas</title>
    </head>
    <body>
        <div class="container" id="contenedor">

            <!--menu-->
            <nav class="navbar navbar-fixed-top" id="header" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>assets/_images/logo.jpg" alt="Your Logo" id="logo"></a>
                    </div>
                

                    