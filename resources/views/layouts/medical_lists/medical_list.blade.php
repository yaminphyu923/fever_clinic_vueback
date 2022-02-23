@extends('layouts.app')

@section('title','Medical List')

@section('content')
    <medicallist-component :auth_id={{$auth_id}}></medicallist-component>
@endsection
