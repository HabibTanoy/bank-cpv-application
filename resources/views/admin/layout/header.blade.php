<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Barikoi - @yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{\Illuminate\Support\Facades\URL::to('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{\Illuminate\Support\Facades\URL::to('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

{{--    Track Section--}}
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" />
</head>
<style>
     .table td {
    vertical-align: inherit;
  }
  .table thead th {
    vertical-align: inherit;
  }
  .table td, .table th {
    padding: 0.1rem;
  }
  .font_modify {
    font-size:14px;
  }
  .demo {
    /* margin-left:-4px; */
    margin-right: 10px;
  }
  .for-ul {
    margin-bottom:0.1rem;
    margin-left: -34px;
  }
  li {
    list-style-type: none;
  }
  .table-modify td, .table-modify th {
    padding: 0.3rem;
  }
  .table-modify td {
    padding:10px;
  }
  .table-edit td {
    font-size:14px;
  }
  .table-edit .table-edit th {
    width:-webkit-fill-available;
    font-size:10px;
  }
  .table-edit {
    width:0%;
  }
  .table-modify {
    width:-webkit-fill-available;
  }
</style>
<body id="page-top">


