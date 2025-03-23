@extends('admin.layouts.master')
@section('title','ویرایش آگهی')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title">ویرایش آگهی</h6>
                <form action="{{ route('ads.update',$ad->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عنوان</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $ad->title }}" dir="rtl" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">آدرس</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $ad->address }}" dir="rtl" name="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">قیمت</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $ad->amount }}" dir="rtl" name="amount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عکس</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control text-left"  dir="rtl" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عکس</label>
                        <div class="col-sm-10">
                            <img src="{{ asset('images/ads/small/'.$ad->image) }}" width="100" height="100" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پس زمینه</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control text-left"  dir="rtl" name="background">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پس زمینه</label>
                        <div class="col-sm-10">
                            <img src="{{ asset('images/ads/small/'.$ad->background) }}" width="100" height="100" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">طبقه</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $ad->floor }}" dir="rtl" name="floor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">سال ساخت</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $ad->year }}" dir="rtl" name="year">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">مساحت</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" value="{{ $ad->area }}" dir="rtl" name="area">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">سرویس بهداشتی</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="toilet">
                                <option value="irani" @if($ad->toilet == 'irani') selected @endif>ایرانی</option>
                                <option value="farangi" @if($ad->toilet == 'farangi') selected @endif>فرهنگی</option>
                                <option value="iranifarangi" @if($ad->toilet == 'iranifarangi') selected @endif>ایرانی و فرهنگی</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">انبار</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="storeroom">
                                <option value="0" @if($ad->storeroom == '0') selected @endif>ندارد</option>
                                <option value="1" @if($ad->storeroom == '1') selected @endif>دارد</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">بالکن</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="balcony">
                                <option value="0" @if($ad->balcony == '0') selected @endif>ندارد</option>
                                <option value="1" @if($ad->balcony == '1') selected @endif>دارد</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">پارکینگ</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="parking">
                                <option value="0" @if($ad->parking == '0') selected @endif>ندارد</option>
                                <option value="1" @if($ad->parking == '1') selected @endif>دارد</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع آگهی</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="sell_status">
                                <option value="0" @if($ad->sell_status == '0') selected @endif>اجاره</option>
                                <option value="1" @if($ad->sell_status == '1') selected @endif>فروش</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">نوع</label>
                        <div class="col-sm-10">
                            <select class="form-control text-left" dir="rtl" name="type">
                                <option value="villa" @if($ad->type == 'villa') selected @endif>ویلایی</option>
                                <option value="apartment" @if($ad->type == 'apartment') selected @endif>اپارتمان</option>
                                <option value="zone" @if($ad->type == 'zone') selected @endif>زمین</option>
                                <option value="shed" @if($ad->type == 'shed') selected @endif>سوله</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">دسته بندی</label>
                        <div class="col-sm-10">
                            <select name="cat_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($ad->cat_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">خلاصه</label>
                        <div class="col-sm-10">
                            <textarea name="summary" class="form-control" rows="4">{{ $ad->summary }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">توضیحات</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" rows="8">{{ $ad->description }}</textarea>
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

