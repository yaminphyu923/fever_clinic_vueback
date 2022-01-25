@extends('layouts.app')

@section('title','Patient Lists')

@section('content')
    <plnav-component :auth_id={{$auth_id}}></plnav-component>

    <inpatient-component :auth_id={{$auth_id}}></inpatient-component>
@endsection
