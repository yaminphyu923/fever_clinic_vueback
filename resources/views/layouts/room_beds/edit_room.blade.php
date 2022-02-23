@extends('layouts.app')

@section('title','Room')

@section('content')
    <editroom-component :auth_id={{$auth_id}}></editroom-component>
@endsection
