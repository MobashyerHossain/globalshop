<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

use App\Models\MultiAuth\ShowRoomStaff;

class ShowRoom extends Model
{
    public function getEmployees(){
        return ShowRoomStaff::where('showroom_id', $this->id)->get();
    }
}
