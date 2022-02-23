@extends('layouts.app')

@section('title','Building')

@section('content')
    <roombednav-component></roombednav-component>
    <building-component :auth_id={{$auth_id}}></building-component>
@endsection
