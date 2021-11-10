<?php

namespace App\Traits;
trait HasRole {

    /**
     * @return mixed
     */
    protected function getRolesAttribute(): mixed
    {
        return $this->role;
    }

    /**
     * Check if user is admin
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE["admin"];
    }

    /**
     * Check if user is employee
     * @return bool
     */
    public function isEmployee(): bool
    {
        return $this->role === self::ROLE["employee"];
    }

}