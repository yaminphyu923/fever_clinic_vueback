@extends('layouts.app')

@section('title','Medical Category')

@section('content')
    <medicalcategory-component :auth_id="{{$auth_id}}"></medicalcategory-component>
@endsection
