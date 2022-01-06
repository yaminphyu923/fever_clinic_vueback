@extends('layouts.app')

@section('title','HR Position')

@section('content')
    <position-component :auth_id={{$auth_id}}></position-component>
@endsection
