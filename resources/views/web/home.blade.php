@extends('adminlte::page')

@section('title', __('page.home.title'))

@section('content_header')
    <h1>{{__("page.home.header").app()->getLocale()}}</h1>
@stop

@section('content')
    <p>You are logged in!</p>
@stop