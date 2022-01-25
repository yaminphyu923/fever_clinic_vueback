@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <newpatient-component :auth_id={{$auth_id}}></newpatient-component>
    <newpatientnav-component :auth_id={{$auth_id}}></newpatientnav-component>
    <newinvestigation-component :auth_id={{$auth_id}}></newinvestigation-component>
@endsection
