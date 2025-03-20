@extends('admin.layouts.master')
@section('title','ویرایش دسته بندی')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title">ویرایش دسته بندی</h6>
                <form action="{{ route('category.update',$category->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $category->name }}" dir="rtl" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">دسته بندی</label>
                        <div class="col-sm-10">
                            <select name="parent_id" class="form-control">
                                <option value="">دسته اصلی</option>
                                @foreach($categories as $singleCategory)
                                    <option value="{{ $singleCategory->id }}" @if($singleCategory->id == $category->parent_id) selected @endif>{{ $singleCategory->name }}</option>
                                @endforeach
                            </select>
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
