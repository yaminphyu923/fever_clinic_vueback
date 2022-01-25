@extends('layouts.app')

@section('title','Past Medical History')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <pastmedical-create-component :auth_id={{$auth_id}}></pastmedical-create-component>
@endsection
