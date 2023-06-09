<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;

    public static function defaultPermissions()
    {
        return [
            'view_posts',
            'add_posts',
            'edit_posts',
            'delete_posts',

            'view_categories',
            'add_categories',
            'edit_categories',
            'delete_categories',

            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
			'add_roles',
			'edit_roles',
			'delete_roles',
        ];
    }
}
