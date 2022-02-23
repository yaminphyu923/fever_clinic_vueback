@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <permission-component :auth_id={{$auth_id}}></permission-component>
@endsection
