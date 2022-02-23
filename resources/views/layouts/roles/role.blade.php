@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <rolemanagement-component :auth_id={{$auth_id}}></rolemanagement-component>
@endsection
