@extends('layouts.app')

@section('title','Fever Clinic')

@section('content')
    <editpat-component :auth_id={{$auth_id}}></editpat-component>
@endsection
