@extends('layouts.app')

@section('title','HR Management')

@section('content')
    <hrmanagement-component :auth_id={{$auth_id}}></hrmanagement-component>
@endsection
