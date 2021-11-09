<?php

namespace App\Traits;
trait HasRole {

    protected function getRolesAttribute()
    {
        return $this->role;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE["admin"];
    }

    public function isEmployee()
    {
        return $this->role === self::ROLE["employee"];
    }

}