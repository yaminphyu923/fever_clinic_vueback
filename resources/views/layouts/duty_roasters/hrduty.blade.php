@extends('layouts.app')

@section('title','HR Duty Roaster')

@section('content')
    <hrduty-component :auth_id={{$auth_id}}></hrduty-component>
@endsection
