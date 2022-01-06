@extends('layouts.app')

@section('title','HR Position')

@section('content')
    <editposition-component :auth_id={{$auth_id}}></editposition-component>
@endsection
