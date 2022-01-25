@extends('layouts.app')

@section('title','Patient Lists')

@section('content')
    <plnav-component :auth_id={{$auth_id}}></plnav-component>

    <totalpatient-component :auth_id={{$auth_id}}></totalpatient-component>
@endsection
