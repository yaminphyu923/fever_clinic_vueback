@extends('layouts.app')

@section('title','Degree')

@section('content')
    <editdegree-component :auth_id="{{$auth_id}}"></editdegree-component>
@endsection
