@extends('layouts.app')

@section('title','Patient Lists')

@section('content')
    <plnav-component :auth_id={{$auth_id}}></plnav-component>

    <outpatient-component :auth_id={{$auth_id}}></outpatient-component>
@endsection
