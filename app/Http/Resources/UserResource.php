<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        DB::connection()->enableQueryLog();
        Log::debug(DB::getQueryLog());

        return [
            'id' => $this->id,
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'username' => $this->username
        ];
    }
}
