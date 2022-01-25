@extends('layouts.app')

@section('title','Diagnosis')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <diagnosis-create-component :auth_id={{$auth_id}}></diagnosis-create-component>
@endsection
