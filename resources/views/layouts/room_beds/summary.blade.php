@extends('layouts.app')

@section('title','Summary')

@section('content')
    <summary-component :auth_id={{$auth_id}}></summary-component>
@endsection
