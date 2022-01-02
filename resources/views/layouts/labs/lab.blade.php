@extends('layouts.app')

@section('title','Medical List')

@section('content')
    <lab-component :auth_id={{$auth_id}}></lab-component>
@endsection
