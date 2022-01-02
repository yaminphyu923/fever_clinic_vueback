@extends('layouts.app')

@section('title','Medical List')

@section('content')
    <detailmedicallist-component :auth_id={{$auth_id}}></detailmedicallist-component>
@endsection
