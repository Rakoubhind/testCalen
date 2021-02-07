<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\History;

class Appointment extends Model
{
    use HasFactory;
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
