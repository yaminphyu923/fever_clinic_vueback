@extends('layouts.app')

@section('title','Monitoring')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <monitoring-create-component :auth_id={{$auth_id}}></monitoring-create-component>
@endsection
