<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title')</title>
   <!-- ================== GOOGLE FONTS ==================-->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
   <!-- ======================= GLOBAL VENDOR STYLES ========================-->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/vendor/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/css/common/custom.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/metismenu/dist/metisMenu.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/switchery-npm/index.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
   <!-- ======================= LINE AWESOME ICONS ===========================-->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/icons/line-awesome.min.css') }}">
   <!-- ======================= DRIP ICONS ===================================-->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/icons/dripicons.min.css') }}">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- ======================= MATERIAL DESIGN ICONIC FONTS =================-->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/icons/material-design-iconic-font.min.css') }}">
   <!-- ======================= PAGE VENDOR STYLES ===========================-->
   <!-- ======================= GLOBAL COMMON STYLES ============================-->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/common/main.bundle.css') }}">
   <!-- ======================= LAYOUT TYPE ===========================-->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/layouts/vertical/core/main.css') }}">
   <!-- ======================= MENU TYPE ===========================================-->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/layouts/vertical/menu-type/compact.css') }}">
   <!-- ======================= THEME COLOR STYLES ===========================-->
   <link rel="stylesheet" href="{{ asset('backend/assets/css/layouts/vertical/themes/theme-a.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/select2/select2.min.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap-timepicker.min.css') }}">
   <link rel="stylesheet" href="{{ asset('backend/assets/css/tpicker.css') }}">
@stack('style')</head>
