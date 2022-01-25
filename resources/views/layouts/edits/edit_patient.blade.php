@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <editpatient-component :auth_id={{$auth_id}}></editpatient-component>
    <editpatientnav-component></editpatientnav-component>
@endsection
