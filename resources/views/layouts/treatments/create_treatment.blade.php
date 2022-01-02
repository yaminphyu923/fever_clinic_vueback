@extends('layouts.app')

@section('title','Treatment')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <treatment-create-component :auth_id={{$auth_id}}></treatment-create-component>
@endsection
