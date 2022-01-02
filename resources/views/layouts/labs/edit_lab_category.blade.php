@extends('layouts.app')

@section('title','Edit Lab Category')

@section('content')
    <editlabcategory-component :auth_id={{$auth_id}}></editlabcategory-component>
@endsection
