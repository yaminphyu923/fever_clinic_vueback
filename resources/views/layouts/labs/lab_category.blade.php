@extends('layouts.app')

@section('title','Lab Category')

@section('content')
    <labcategory-component :auth_id={{$auth_id}}></labcategory-component>
@endsection
