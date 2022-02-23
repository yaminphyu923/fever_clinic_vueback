@extends('layouts.app')

@section('title','Floor')

@section('content')
    <roombednav-component></roombednav-component>
    <floor-component :auth_id={{$auth_id}}></floor-component>
@endsection
