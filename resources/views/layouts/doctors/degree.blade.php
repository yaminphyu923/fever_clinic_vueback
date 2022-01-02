@extends('layouts.app')

@section('title','Degree')

@section('content')
    <degree-component :auth_id={{$auth_id}}></degree-component>
@endsection
