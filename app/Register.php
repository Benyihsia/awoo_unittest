<?php

namespace App;

use App\Model\User;

class Register
{
    /**
     * @var User
     */
    private $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 註冊使用者
     *
     * @param array $request
     * @return void
     */
    public function register($request)
    {
        if (! isset($request['username']) || empty($request['username'])) {
            return "username is empty.";
        }

        if ("男" === $request['gender']) {
            $gender = "0";
        } elseif ("女" === $request['gender']) {
            $gender = "1";
        }

        $this->user->createUser([
            'username' => $request['username'],
            'birthday' => $request['birthday'],
            'gender' => $gender,
        ]);
    }
}
