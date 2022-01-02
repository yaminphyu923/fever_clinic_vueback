@extends('layouts.app')

@section('title','Speciality')

@section('content')
    <speciality-component :auth_id={{$auth_id}}></speciality-component>
@endsection
