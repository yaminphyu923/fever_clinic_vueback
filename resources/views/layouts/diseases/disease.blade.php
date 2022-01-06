@extends('layouts.app')

@section('title','Disease')

@section('content')
    <disease-component :auth_id={{$auth_id}}></disease-component>
@endsection
