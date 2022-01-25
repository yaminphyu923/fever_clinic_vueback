@extends('layouts.app')

@section('title','Physical Examination')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <phyexamination-create-component :auth_id={{$auth_id}}></phyexamination-create-component>
@endsection
