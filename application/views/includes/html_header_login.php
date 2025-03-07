<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADHans</title>

    <!-- Fonts and icons -->
    <script src=<?php echo base_url('/assets/js/plugin/webfont/webfont.min.js') ?>></script>
    <script>
      WebFont.load({
        google: {"families":["Lato:300,400,700,900"]},
        custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('/assets/css/fonts.min.css') ?>']},
        active: function() {
          sessionStorage.fonts = true;
        }
      });
    </script>

    <!-- Bootstrap V5.2.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f862649525.js" crossorigin="anonymous"></script>
    
    <!-- Date Picker -->
    <link type="text/css" href=<?php echo base_url('/assets/jsCalendar/jsCalendar.css')?> rel="stylesheet">
    <link type="text/css" href=<?php echo base_url('/assets/jsCalendar/jsCalendar.micro.css')?> rel="stylesheet">
    <script type="text/javascript" src=<?php echo base_url('/assets/jsCalendar/jsCalendar.js')?>></script>
    <script type="text/javascript" src=<?php echo base_url('/assets/jsCalendar/jsCalendar.lang.pt.js')?>></script>
    <script type="text/javascript" src=<?php echo base_url('/assets/jsCalendar/jsCalendar.datepicker.js')?>></script>

    <!-- Custom styles for this template-->
    <link href=<?php echo base_url('/assets/css/bootstrap.min.css') ?> rel="stylesheet">
    <link href=<?php echo base_url('/assets/css/atlantis.min.css') ?> rel="stylesheet">
    <link href=<?php echo base_url('/assets/css/demo.css') ?> rel="stylesheet">

    <!-- Imprimir/Salvar em pdf -->
    <script type="text/javascript" src=<?php echo base_url('/assets/js/html2canvas.js')?>></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

    <link rel="manifest" href="manifest.json">  <!-- Referência ao manifesto -->
    
      