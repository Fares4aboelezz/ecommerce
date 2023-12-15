<?php

namespace App\Repositories\User\Eloquent;

use App\Repositories\EloquentRepository;
use App\Repositories\User\UserRepository;

class EloquentUserRepository extends EloquentRepository implements UserRepository {

    public function updateProfile($data,$user){
        return $this->update($user,$data);
    }
}
