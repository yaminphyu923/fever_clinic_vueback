@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <newpatient-component :auth_id={{$auth_id}}></newpatient-component>
    <newpatientnav-component :auth_id={{$auth_id}}></newpatientnav-component>
    <newdead-component :auth_id={{$auth_id}}></newdead-component>
@endsection
