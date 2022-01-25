@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <user-component :auth_id={{$auth_id}}></user-component>
@endsection
