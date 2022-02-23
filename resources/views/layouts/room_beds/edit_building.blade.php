@extends('layouts.app')

@section('title','Building')

@section('content')
    <editbuilding-component :auth_id={{$auth_id}}></editbuilding-component>
@endsection
