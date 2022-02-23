@extends('layouts.app')

@section('title','HR Duty Roaster')

@section('content')
    <edithrduty-component :auth_id={{$auth_id}}></edithrduty-component>
@endsection
