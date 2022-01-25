@extends('layouts.app')

@section('title','Patient Lists')

@section('content')
    <plnav-component :auth_id={{$auth_id}}></plnav-component>

    <referralpatient-component :auth_id={{$auth_id}}></referralpatient-component>
@endsection
