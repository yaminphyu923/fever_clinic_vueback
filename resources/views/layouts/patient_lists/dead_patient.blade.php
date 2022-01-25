@extends('layouts.app')

@section('title','Patient Lists')

@section('content')
    <plnav-component :auth_id={{$auth_id}}></plnav-component>

    <deadpatient-component :auth_id={{$auth_id}}></deadpatient-component>
@endsection
