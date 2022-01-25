@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <detailpatient-component :auth_id={{$auth_id}}></detailpatient-component>
@endsection
