@extends('layouts.app')

@section('title','Consultation')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <consultation-create-component :auth_id={{$auth_id}}></consultation-create-component>
@endsection
