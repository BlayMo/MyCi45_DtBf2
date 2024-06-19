<?php

namespace Config;

use Bonfire\Auth\Config\AuthGroups as BonfireAuthGroups;
use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends BonfireAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys
     * are the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group
     * when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://codeigniter4.github.io/shield/quick_start_guide/using_authorization/#change-available-groups for more info
     */
    public array $groups = [
        'superadmin' => [
            'title'       => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'developer' => [
            'title'       => 'Developer',
            'description' => 'Site programmers.',
        ],
        'user' => [
            'title'       => 'User',
            'description' => 'General users of the site. Often customers.',
        ],
        'beta' => [
            'title'       => 'Beta User',
            'description' => 'Has access to beta-level features.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'        => 'Can access the sites admin area',
        'admin.settings'      => 'Can access the main site settings',
        'groups.settings'     => 'Can access the groups settings',
        'groups.edit'         => 'Can edit existing user groups',
        'users.list'          => 'Can view a list of users in the system',
        'users.manage-admins' => 'Can manage other admins',
        'users.view'          => 'Can view user details',
        'users.create'        => 'Can create new non-admin users',
        'users.edit'          => 'Can edit existing non-admin users',
        'users.delete'        => 'Can delete existing non-admin users',
        'users.settings'      => 'Can manage User settings in admin area',
        'beta.access'         => 'Can access beta-level features',
        'site.viewOffline'    => 'Can view the site even when in "offline" mode',
        'widgets.settings'    => 'Can view the settings for site Widgets',
        'consent.settings'    => 'Can view the settings for the Consent module',
        'recycler.view'       => 'Can view the Recycler area',
        'logs.view'           => 'Can view the logs',
        'logs.manage'         => 'Can manage the logs',
        'me.edit'             => "Can edit user's own settings",
        'me.security'         => "Can change user's own password",       
        //Modulo Diario
        'diario.list'          => 'Can view list of pages',
        'diario.view'          => 'Can view pages details',
        'diario.create'        => 'Can create new pages',
        'diario.edit'          => 'Can edit existing pages',
        'diario.delete'        => 'Can delete existing pages',
        //Modulo Tipos
        'tipos.list'          => 'Can view list of pages',
        'tipos.view'          => 'Can view pages details',
        'tipos.create'        => 'Can create new pages',
        'tipos.edit'          => 'Can edit existing pages',
        'tipos.delete'        => 'Can delete existing pages',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     *
     * This defines group-level permissions.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'groups.*',
            'users.*',
            'beta.*',
            'widgets.*',
            'consent.*',
            'recycler.*',
            'site.*',
            'logs.*',
            'me.*',
            'diario.*',
            'tipos.*'
        ],
        'admin' => [
            'admin.access',
            'users.list',
            'users.create',
            'users.edit',
            'users.delete',
            'users.settings',
            'groups.settings',
            'beta.access',
            'widgets.*',
            'consent.*',
            'logs.view',
            'me.*',
            'diario.*',
            'tipos.*'
        ],
        'developer' => [
            'admin.access',
            'admin.settings',
            'users.list',
            'users.create',
            'users.edit',
            'users.settings',
            'groups.settings',
            'beta.*',
            'site.viewOffline',
            'widgets.*',
            'consent.*',
            'recycler.*',
            'logs.*',
            'me.edit',
            'me.security',
            'diario.*',
            'tipos.*'
        ],
        'user' => [
             'diario.list',
             'tipos.list'
        ],
        'beta' => [
            'beta.access',
        ],
    ];
}
