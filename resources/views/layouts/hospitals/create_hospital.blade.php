@extends('layouts.app')

@section('title','Hospital')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <hospital-create-component :auth_id={{$auth_id}}></hospital-create-component>
@endsection
