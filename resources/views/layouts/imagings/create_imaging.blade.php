@extends('layouts.app')

@section('title','Imaging')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <imaging-create-component :auth_id={{$auth_id}}></imaging-create-component>
@endsection
