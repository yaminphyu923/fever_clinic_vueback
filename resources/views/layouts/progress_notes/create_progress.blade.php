@extends('layouts.app')

@section('title','Progress Note')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <progress-create-component :auth_id={{$auth_id}}></progress-create-component>
@endsection
