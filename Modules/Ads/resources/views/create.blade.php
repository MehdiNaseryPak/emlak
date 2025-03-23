@extends('admin.layouts.master')
@section('title','افزودن اگهی')
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
                <h6 class="card-title">ایجاد آگهی</h6>
                <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عنوان</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="عنوان" dir="rtl" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">آدرس</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="آدرس" dir="rtl" name="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">قیمت</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="قیمت" dir="rtl" name="amount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عکس</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control text-left"  dir="rtl" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پس زمینه</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control text-left"  dir="rtl" name="background">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">طبقه</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="طبقه" dir="rtl" name="floor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">سال ساخت</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="سال ساخت" dir="rtl" name="year">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">مساحت</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" placeholder="مساحت" dir="rtl" name="area">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">سرویس بهداشتی</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="toilet">
                                <option value="irani">ایرانی</option>
                                <option value="farangi">فرهنگی</option>
                                <option value="iranifarangi">ایرانی و فرهنگی</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">انبار</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="storeroom">
                                <option value="0">ندارد</option>
                                <option value="1">دارد</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">بالکن</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="balcony">
                                <option value="0">ندارد</option>
                                <option value="1">دارد</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پارکینگ</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="parking">
                                <option value="0">ندارد</option>
                                <option value="1">دارد</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع آگهی</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="sell_status">
                                <option value="0">اجاره</option>
                                <option value="1">فروش</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="type">
                                <option value="villa">ویلایی</option>
                                <option value="apartment">اپارتمان</option>
                                <option value="zone">زمین</option>
                                <option value="shed">سوله</option>
                            </select>
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
                        <label class="col-sm-2 col-form-label">خلاصه</label>
                        <div class="col-sm-10">
                            <textarea name="summary" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">توضیحات</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" rows="8"></textarea>
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
