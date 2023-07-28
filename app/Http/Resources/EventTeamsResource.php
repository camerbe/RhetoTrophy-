<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventTeamsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'oid'=>$this->Oid,
            'eventoid'=>$this->EventOid,
            'position'=>$this->Position,
            'teamnumber'=>$this->TeamNumber,
            'name'=>$this->Name,
            'zipcode'=>$this->ZipCode,
            'city'=>$this->City,
            'responsible'=>$this->Responsible,
            'status'=>$this->Status,
            'notes'=>$this->Notes,
           'nettime'=>$this->NetTime,
           'totalpenalties'=>$this->TotalPenalties,
            'endtime'=>$this->EndTime,
           'completedtracks'=>$this->CompletedTracks,
            'event'=>$this->event,
            'code'=>$this->Code,
            
        ];
    }
}
