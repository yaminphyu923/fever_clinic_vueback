@extends('layouts.app')

@section('title','Prescriptive Medicine List')

@section('content')
    <prescriptivemedicine-component :auth_id={{$auth_id}}></prescriptivemedicine-component>
@endsection
