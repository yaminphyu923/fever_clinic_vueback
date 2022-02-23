@extends('layouts.app')

@section('title','Floor')

@section('content')
    <editfloor-component :auth_id={{$auth_id}}></editfloor-component>
@endsection
