<?php

namespace App\Model;

class User
{
    public function createUser($user)
    {
        return $this->execute(
            "INSERT INTO users (username, gender, birthday) VALUES ........."
        );
    }
}
