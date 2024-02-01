<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\UserResource;
use App\Models\BbnRating;
use App\Http\Resources\API\BbnRatingResource;
class BbnResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $booking_id = request()->booking_id;
        $rating = null;
        if($booking_id != null){
            $rating = BbnRating::where('booking_id',$booking_id)->where('bbn_id',$this->bbn->id)->first();
            if($rating != null)
            {
                $rating = new BbnRatingResource($rating);
            }
        }
        $temp = new UserResource($this->bbn);
        
        $collection = collect($temp)->put('bbn_review', $rating);

        return $collection;
    }
}
