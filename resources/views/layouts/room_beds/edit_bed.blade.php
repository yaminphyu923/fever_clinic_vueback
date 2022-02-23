@extends('layouts.app')

@section('title','Bed')

@section('content')
    <editbed-component :auth_id={{$auth_id}}></editbed-component>
@endsection
