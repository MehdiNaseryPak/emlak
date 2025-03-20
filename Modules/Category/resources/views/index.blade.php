@extends('admin.layouts.master')
@section('title','لیست دسته بندی ها')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{\Illuminate\Support\Facades\Session::get('message')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <livewire:category::category-list />
        </div>
    </div>
@endsection
