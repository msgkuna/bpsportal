<?php

namespace App\Widgets\Users;

use Arrilot\Widgets\AbstractWidget;
use App\Models\User;

class UserRegistration extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $userCount = User::get();
        return view('widgets.users.user_registration', [
            'config' => $this->config,
            'userCount' => $userCount
        ]);
    }
}
