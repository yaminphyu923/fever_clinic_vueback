@extends('layouts.app')

@section('title','Lab')

@section('content')
    <editlab-component :auth_id={{$auth_id}}></editlab-component>
@endsection
