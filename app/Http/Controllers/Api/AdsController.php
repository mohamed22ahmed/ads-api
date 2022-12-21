<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateAdRequest;
use App\Http\Resources\Api\Ad\AdResource;
use App\Http\Resources\Api\DeleteResource;
use App\Http\Resources\Api\Ad\StoreResource;
use App\Http\Resources\Api\Ad\UpdateResource;
use App\Http\Resources\Api\NotFoundResource;
use App\Models\Ad;

class AdsController extends Controller
{
    public function index()
    {
        return AdResource::collection(Ad::with('advertiser')->paginate(10));
    }

    public function show($id){
        $ad = Ad::where('id', $id)->with('advertiser')->get();
        if($ad)
            return AdResource::collection($ad);

        return new NotFoundResource($id);
    }

    public function store(StoreUpdateAdRequest $request){
        $ad = Ad::create([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'advertiser_id' => $request->advertiser_id,
            'start_date' => date('Y-m-d', strtotime($request->start_date))
        ]);

        return new StoreResource(Ad::where('id', $ad->id)->with('advertiser')->get());
    }

    public function update(StoreUpdateAdRequest $request, $id){
        Ad::find($id)->update([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'advertiser_id' => $request->advertiser_id,
            'start_date' => date('Y-m-d', strtotime($request->start_date))
        ]);

        return new UpdateResource(Ad::where('id', $id)->with('advertiser')->get());
    }
    public function destroy($id){
        $ad = Ad::find($id);
        if($ad){
            $ad->delete();
            return new DeleteResource($id);
        }

        return new NotFoundResource($id);
    }

    public function getByCategory($id){
        $ads = Ad::whereHas('category', function($q) use($id){
            $q->where('id',$id);
        })->with('advertiser')->paginate(10);

        return AdResource::collection($ads);
    }

    public function getByTag($id){
        $ads = Ad::whereHas('tags', function($q) use($id){
            $q->where('tags.id',$id);
        })->with('advertiser')->get();

        return AdResource::collection($ads);
    }
}
