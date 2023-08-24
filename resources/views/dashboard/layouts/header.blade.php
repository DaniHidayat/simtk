<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>ADMINISTRATOR BUKU TAMU | SKM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- JQVMap -->

  <link rel="stylesheet href="{{asset("assets/adminlte/plugins/jqvmap/jqvmap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/adminlte/dist/css/adminlte.min.css")}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/daterangepicker/daterangepicker.css")}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/summernote/summernote-bs4.min.css")}}}">
<!-- DataTables -->
    <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
      <!-- Select2 -->
      <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/select2/css/select2.min.css")}}">
      <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
{{-- buuton switch --}}
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<!-- Include Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
