@extends('layouts.app')

@section('title','Duty Roaster')

@section('content')
    <editduty-component :auth_id={{$auth_id}}></editduty-component>
@endsection
