@extends('layouts.app')

@section('title','Discharge')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <discharge-create-component :auth_id={{$auth_id}}></discharge-create-component>
@endsection
