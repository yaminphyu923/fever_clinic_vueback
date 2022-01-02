@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>
@endsection
