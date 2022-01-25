@extends('layouts.app')

@section('title','Patient Lists')

@section('content')
    <plnav-component :auth_id={{$auth_id}}></plnav-component>

    <comopatient-component :auth_id={{$auth_id}}></comopatient-component>
@endsection
