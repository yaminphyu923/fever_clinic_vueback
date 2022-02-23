@extends('layouts.app')

@section('title','Room')

@section('content')
    <roombednav-component></roombednav-component>
    <room-component :auth_id={{$auth_id}}></room-component>
@endsection
