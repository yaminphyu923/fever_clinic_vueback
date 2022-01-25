@extends('layouts.app')

@section('title','Pt Overall Performance')

@section('content')
    <patient-create-component :auth_id={{$auth_id}}></patient-create-component>
    <patientnav-component></patientnav-component>

    <ptoverall-create-component :auth_id={{$auth_id}}></ptoverall-create-component>
@endsection
