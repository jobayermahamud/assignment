@extends('layouts.master')

@section('container')

<div class="container-fluid">
    <div class="row">
       @include('layouts.section1')
       @include('layouts.section2') 
    </div>
  </div>
    
@endsection