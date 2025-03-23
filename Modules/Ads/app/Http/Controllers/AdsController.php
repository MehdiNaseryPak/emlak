<?php

namespace Modules\Ads\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Image\ImageUpload;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Modules\Ads\Http\Requests\AdsRequest;
use Modules\Ads\Models\Ads;
use Modules\Category\Models\Category;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('ads::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->where('status',1)->get();
        return view('ads::create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdsRequest $request)
    {
        $image = ImageUpload::save($request->image,'ads');
        $background = ImageUpload::save($request->background,'ads');
        Ads::query()->create([
            'title' => $request->title,
            'image' => $image,
            'background' => $background,
            'description' => $request->description,
            'summary' => $request->summary,
            'address' => $request->address,
            'amount' => $request->amount,
            'floor' => $request->floor,
            'year' => $request->year,
            'storeroom' => $request->storeroom,
            'balcony' => $request->balcony,
            'area' => $request->area,
            'toilet' => $request->toilet,
            'parking' => $request->parking,
            'tag' => $request->tag,
            'type' => $request->type,
            'sell_status' => $request->sell_status,
            'cat_id' => $request->cat_id,
            'user_id' => 1
        ]);
        return redirect()->route('ads.index')->with('message','آگهی با موفقیت ثبت شد');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ads $ad)
    {
        $categories = Category::query()->where('status',1)->get();
        return view('ads::edit',compact('ad','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdsRequest $request, Ads $ad)
    {
        if($request->hasFile('image'))
            $image = ImageUpload::save($request->image,'ads');
        else
            $image = $ad->image;
        if($request->hasFile('background'))
            $background = ImageUpload::save($request->background,'ads');
        else
            $background = $ad->background;

        $ad->update([
            'title' => $request->title,
            'image' => $image,
            'background' => $background,
            'description' => $request->description,
            'summary' => $request->summary,
            'address' => $request->address,
            'amount' => $request->amount,
            'floor' => $request->floor,
            'year' => $request->year,
            'storeroom' => $request->storeroom,
            'balcony' => $request->balcony,
            'area' => $request->area,
            'toilet' => $request->toilet,
            'parking' => $request->parking,
            'tag' => $request->tag,
            'type' => $request->type,
            'sell_status' => $request->sell_status,
            'cat_id' => $request->cat_id,
            'user_id' => 1
        ]);
        return redirect()->route('ads.index')->with('message','آگهی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
