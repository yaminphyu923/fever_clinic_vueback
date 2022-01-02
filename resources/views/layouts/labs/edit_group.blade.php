@extends('layouts.app')

@section('title','Group')

@section('content')
    <editgroup-component :auth_id={{$auth_id}}></editgroup-component>
@endsection
