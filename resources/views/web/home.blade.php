@extends('adminlte::page')

@section('title', __('page.home.title'))

@section('content_header')
    <h1><i class="fa fa-fw fa-home"></i> {{__("page.home.header")}}</h1>
@stop

@section('content')
    <h1 class="text-center text-success">{{__("page.home.txt")}}</h1>
@stop