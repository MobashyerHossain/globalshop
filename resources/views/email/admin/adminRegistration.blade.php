<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online Car and Car Parts shop">
    <meta name="author" content="Global Car Shop">
    <link rel="icon" type="image/png" href="{{ asset('storage/images/devil.ico') }}">
    <title>{{ config('app.name', 'Laravel') }} Admin Registration</title>
  </head>
  <body style="color:#979799;">
    <h2 style="text-align:center;margin-bottom:0px;color:#808082;">{{ config('app.name', 'Laravel') }}</h2>
    <h4 style="margin-bottom:30px;">Welcome, {{$admin->getFullName()}}</h4>
    <h5 style="margin-bottom:30px;">Your current password is: <span class="font-weight-bold">{{$pass}}</span></h5>
    <p>Thanks for your purchase,<br>
      {{ config('app.name', 'Laravel') }}
    </p>
  </body>
</html>
