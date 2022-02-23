@extends('layouts.app')

@section('title','Remain')

@section('content')
    <remain-component :auth_id={{$auth_id}}></remain-component>
@endsection
