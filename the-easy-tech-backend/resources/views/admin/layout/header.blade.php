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
        <link rel="shortcut icon" href="{{ asset("assets-admin/images/favicon.ico") }}">
        <link href="{{ asset("assets-admin/css/app.min.css") }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset("assets-admin/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("assets-admin/css/iziToast.min.css") }}">
        <link href="{{ asset("assets-admin/css/style.css") }}" rel="stylesheet" type="text/css" />

        @stack("styles")
    </head>
        <body data-menu-color="light" data-sidebar="default">