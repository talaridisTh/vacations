<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model {

    protected $guarded = [];

    protected $appends = [
        "created_format",
        "updated_format",
        "date_request",
        "days",
    ];

    protected $casts = ['vacation_start' => 'datetime', 'vacation_end' => 'datetime'];

    public function employee()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getCreatedFormatAttribute($date = null)
    {
        return $this->created_at->format("d-m-Y");
    }

    public function getUpdatedFormatAttribute($date = null)
    {
        return $this->updated_at->format("d-m-Y");
    }

    public function getDateRequestAttribute()
    {
        return "Start: " . $this->vacation_start->format("d-m-Y") . " End: " . $this->vacation_end->format("d-m-Y");
    }

    public function getDaysAttribute()
    {
        return $this->vacation_start->diffInDays($this->vacation_end);
    }

}