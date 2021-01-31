<?php

namespace App\Widgets\Users;

use Arrilot\Widgets\AbstractWidget;
use App\Models\User;

class UserLastLogin extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'count' => 5,
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $userLogin = User::whereNotNull('last_login_at')->orderBy('last_login_at', 'desc')->get();
        return view('widgets.users.user_last_login', [
            'config' => $this->config,
            'userLogin' => $userLogin
        ]);
    }
}
