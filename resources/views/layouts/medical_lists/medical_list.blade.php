@extends('layouts.app')

@section('title','Medical List')

@section('content')
    <medicallist-component :auth_user={{$auth_user}}></medicallist-component>
@endsection
