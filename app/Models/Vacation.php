<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model {

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $appends = [
        "created_format",
        "updated_format",
        "date_request",
        "days",
    ];

    protected $casts = ['vacation_start' => 'datetime', 'vacation_end' => 'datetime'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    /**
     * Make format for human
     * @param null $date
     * @return mixed
     */
    public function getCreatedFormatAttribute($date = null)
    {
        return $this->created_at->format("d-m-Y");
    }

    /**
     * Make format for human
     * @param null $date
     * @return mixed
     */
    public function getUpdatedFormatAttribute($date = null): mixed
    {
        return $this->updated_at->format("d-m-Y");
    }

    /**
     * Get days of vacation
     * @return string
     */
    public function getDateRequestAttribute(): string
    {
        return "Start: " . $this->vacation_start->format("d-m-Y") . " End: " . $this->vacation_end->format("d-m-Y");
    }

    /**
     * Make format for human
     * @return mixed
     */
    public function getDaysAttribute(): mixed
    {
        return $this->vacation_start->diffInDays($this->vacation_end);
    }

}