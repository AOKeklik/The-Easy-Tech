<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>@yield("title", "Admin Dashboard")</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Css -->
        
        <link rel="shortcut icon" href="{{ asset("uploads/setting") }}/{{ setting("site_favicon") }}">
        <link href="{{ asset("assets-admin/libs/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("assets-admin/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("assets-admin/css/iziToast.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets-admin/css/bootstrap-switch-button.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets-admin/css/datatables.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assets-admin/libs/summernote-0.9.0-dist/summernote-bs5.css") }}">
        <link rel="stylesheet" href="{{ asset("assets-admin/libs/summernote-0.9.0-dist/summernote-lite.css") }}">
        <link href="{{ asset("assets-admin/css/app.css") }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset("assets-admin/css/style.css") }}" rel="stylesheet" type="text/css" id="app-style" />
        
        
        @stack("styles")
    </head>
        <body data-menu-color="light" data-sidebar="default">