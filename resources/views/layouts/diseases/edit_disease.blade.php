@extends('layouts.app')

@section('title','Edit Disease')

@section('content')
    <editdisease-component :auth_id={{$auth_id}}></editdisease-component>
@endsection
