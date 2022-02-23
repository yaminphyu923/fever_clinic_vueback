@extends('layouts.app')

@section('title','Duty Roaster')

@section('content')
    <edittime-component :auth_id={{$auth_id}}></edittime-component>
@endsection
