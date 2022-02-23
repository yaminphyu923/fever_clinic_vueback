@extends('layouts.app')

@section('title','Expense')

@section('content')
    <expense-component :auth_id={{$auth_id}}></expense-component>
@endsection
