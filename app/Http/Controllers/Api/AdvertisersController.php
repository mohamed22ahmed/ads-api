<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateAdvertiserRequest;
use App\Http\Resources\Api\Advertiser\AdvertiserResource;
use App\Http\Resources\Api\Advertiser\StoreResource;
use App\Http\Resources\Api\Advertiser\UpdateResource;
use App\Http\Resources\Api\DeleteResource;
use App\Http\Resources\Api\NotFoundResource;
use App\Models\Advertiser;
use Illuminate\Http\Request;

class AdvertisersController extends Controller
{
    public function index()
    {
        return AdvertiserResource::collection(Advertiser::paginate(10));
    }

    public function show($id){
        $ad = Advertiser::find($id);
        if($ad)
            return new AdvertiserResource($ad);

        return new NotFoundResource($id);
    }

    public function store(StoreUpdateAdvertiserRequest $request){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        $advertiser = Advertiser::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $is_active
        ]);

        return new StoreResource($advertiser);
    }

    public function update(StoreUpdateAdvertiserRequest $request, $id){
        $is_active = ($request->is_active == null || $request->is_active) ? 1 : 0;
        Advertiser::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $is_active
        ]);

        return new UpdateResource(Advertiser::find($id));
    }
    public function destroy($id){
        $ad = Advertiser::find($id);
        if($ad){
            $ad->delete();
            return new DeleteResource($id);
        }

        return new NotFoundResource($id);
    }
}
