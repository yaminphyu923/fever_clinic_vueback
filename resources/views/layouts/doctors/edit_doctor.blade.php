@extends('layouts.app')

@section('title','Doctor')

@section('content')
    <editdoctor-component :auth_id={{$auth_id}}></editdoctor-component>
@endsection
