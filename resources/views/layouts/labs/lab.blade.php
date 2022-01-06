@extends('layouts.app')

@section('title','Lab')

@section('content')
    <lab-component :auth_id={{$auth_id}}></lab-component>
@endsection
