<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;


class BbnRatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    { 
        return [
            'id'            => $this->id,
            'customer_id'   => $this->customer_id,
            'rating'        => $this->rating,
            'review'        => $this->review,
            'service_id'    => $this->service_id,
            'service_name'    =>optional($this->service)->name,
            'booking_id'    => $this->booking_id,
            'bbn_id'   => $this->bbn_id,
            'bbn_name' => optional($this->bbn)->display_name,
            'bbn_profile_image' => optional($this->bbn)->login_type != null ? optional($this->bbn)->social_image : getSingleMedia($this->bbn, 'profile_image',null),
            'customer_name' => optional($this->customer)->display_name,
            'customer_profile_image' => optional($this->customer)->login_type != null ?  optional($this->customer)->social_image : getSingleMedia($this->customer, 'profile_image',null),
            'created_at'    => date('Y-m-d', strtotime($this->created_at)),
        ];
    }
}
