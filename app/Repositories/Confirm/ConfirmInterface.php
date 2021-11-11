<?php

namespace App\Repositories\Confirm;

interface ConfirmInterface {

    /**
     * Create temporary url
     * @return string
     */
    public function createUrl(): string;

}