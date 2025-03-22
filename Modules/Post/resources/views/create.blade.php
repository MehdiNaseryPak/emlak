@extends('admin.layouts.master')
@section('title','افزودن پست')
@section('head-tag')
    <link type="text/css" rel="stylesheet" href="{{ asset('admin-assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css') }}" />
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title">ایجاد پست</h6>
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عنوان</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="عنوان" dir="rtl" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عکس</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control text-left"  dir="rtl" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">دسته بندی</label>
                        <div class="col-sm-10">
                            <select name="cat_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تاریخ انتشار</label>
                        <div class="col-sm-10">
                            <input type="text" id="published_at" class="form-control text-right" placeholder="1404/01/01" dir="ltr" name="published_at">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">توضیحات</label>
                        <div class="col-sm-10">
                            <textarea name="body" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-uppercase">
                            <i class="ti-check-box m-r-5"></i> ذخیره
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin-assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#published_at').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
                calendarWeeks: true,
                rtl: true,
                clearBtn: true,
                language: 'fa',
                daysOfWeekDisabled: [0,6],
                daysOfWeekHighlighted: "0,6",
                weekStart: 1,
                orientation: "bottom auto",
                container: '#datepicker-container',
                keyboardNavigation: false,
            });
        });
    </script>
@endsection
