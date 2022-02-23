@extends('layouts.app')

@section('title','Duty Roaster')

@section('content')
    <duty-component :auth_id={{$auth_id}}></duty-component>
@endsection
