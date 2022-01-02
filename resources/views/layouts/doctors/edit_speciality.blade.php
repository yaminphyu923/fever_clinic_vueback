@extends('layouts.app')

@section('title','Speciality')

@section('content')
    <editspeciality-component :auth_id={{$auth_id}}></editspeciality-component>
@endsection
