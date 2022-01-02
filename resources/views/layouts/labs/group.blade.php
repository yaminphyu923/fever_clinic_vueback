@extends('layouts.app')

@section('title','Group')

@section('content')
    <group-component :auth_id={{$auth_id}}></group-component>
@endsection
