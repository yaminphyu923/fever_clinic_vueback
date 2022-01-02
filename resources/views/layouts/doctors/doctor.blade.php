@extends('layouts.app')

@section('title','Doctor')

@section('content')
    <doctor-component :auth_id={{$auth_id}}></doctor-component>
@endsection
