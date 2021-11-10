<?php

namespace App\Models;

use App\Traits\HasRole;
use App\Traits\HasSlug;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

    use HasApiTokens, HasFactory, Notifiable, HasRole, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const  ROLE = [
        'employee' => "employee",
        'admin' => "admin",
    ];

    /**
     * Get full name of a user
     * @return string
     */
    public function getFullnameAttribute(): string
    {
        return $this->firstname . " " . $this->lastname;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vacations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Vacation::class)->orderBy("created_at", "desc");
    }

    /**
     * Get supervisor of admin
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supervisor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function isEmployer(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'created_by');
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
