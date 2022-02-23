@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <home-component :auth_id={{$auth_id}}></home-component>
@endsection
