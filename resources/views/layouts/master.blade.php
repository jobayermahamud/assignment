<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @include('layouts.common-css')
</head>
<body>
   @include('layouts.nav') 
   @yield('container')
   @include('layouts.common-script')
   
</body>

</html>