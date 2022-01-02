@extends('layouts.app')

@section('title','Edit Medical Category')

@section('content')
    <editmedicalcategory-component :auth_id="{{$auth_id}}"></editmedicalcategory-component>
@endsection
