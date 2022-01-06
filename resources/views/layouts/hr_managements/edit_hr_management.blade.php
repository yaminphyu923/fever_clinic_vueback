@extends('layouts.app')

@section('title','HR Management')

@section('content')
    <edithrmanagement-component :auth_id={{$auth_id}}></edithrmanagement-component>
@endsection
