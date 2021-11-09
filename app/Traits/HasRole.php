<?php

namespace App\Traits;
trait HasRole {

    protected function getRolesAttribute()
    {
        return $this->role;
    }

    protected function scopeGetAdmin()
    {
        return "admin";
    }

    protected function scopeGetEmployee()
    {
        return "employee";
    }

}