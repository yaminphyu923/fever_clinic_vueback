@extends('layouts.app')

@section('title','Investigation')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>
    <investigation-create-component :auth_id={{$auth_id}}></investigation-create-component>
@endsection
