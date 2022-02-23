@extends('layouts.app')

@section('title','Donation')

@section('content')
    <donation-component :auth_id={{$auth_id}}></donation-component>
@endsection
