<?php
class UserPolicy
{
    public function view()
    {
        return Auth::hasPermission('user.view');
    }

    public function create()
    {
        return Auth::hasPermission('user.create');
    }
}