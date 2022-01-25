@extends('layouts.app')

@section('title','Dead')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <dead-create-component :auth_id={{$auth_id}}></dead-create-component>
@endsection
