<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'oid'=>$this->Oid,
            'code'=>$this->Code,
            'name'=>$this->Name,
            'date'=>$this->Date,
            'maxnettime'=>$this->MaxNetTime,
            'optimisticlockfield'=>$this->OptimisticLockField,
            //'eventteams'=>EventTeamsResource::collection($this->eventteams) ,
            //'eventteams'=>$this->eventteams ,
        ];
    }
}
