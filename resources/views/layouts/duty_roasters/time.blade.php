@extends('layouts.app')

@section('title','Duty Roaster')

@section('content')
    <time-component :auth_id={{$auth_id}}></time-component>
@endsection
