@extends('layouts.app')

@section('title','Bed')

@section('content')
    <roombednav-component></roombednav-component>
    <bed-component :auth_id={{$auth_id}}></bed-component>
@endsection
