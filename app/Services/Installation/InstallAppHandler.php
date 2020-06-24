<?php

namespace App\Services\Installation;

use App\Entities\Permission;
use App\Entities\Role;
use App\Entities\User;
use App\Services\Installation\Events\ApplicationWasInstalled;
use Closure;
use Illuminate\Validation\ValidationException;

/**
 * Class InstallAppHandler.
 */
class InstallAppHandler
{
    /**
     * @var array|\Illuminate\Support\Collection
     */
    public $roles = [
        ['name' => 'Administrator'],
    ];

    /**
     * @var array|\Illuminate\Support\Collection
     */
    public $permissions = [
        'users' => [
            ['name' => 'List users'],
            ['name' => 'Create users'],
            ['name' => 'Delete users'],
            ['name' => 'Update users'],
        ],
        'roles' => [
            ['name' => 'List roles'],
            ['name' => 'Create roles'],
            ['name' => 'Delete roles'],
            ['name' => 'Update roles'],
        ],
        'permissions' => [
            ['name' => 'List permissions'],
        ],
        'albums' => [
            ['name' => 'List albums'],
            ['name' => 'Create albums'],
            ['name' => 'Delete albums'],
            ['name' => 'Update albums'],
        ],
        'testimonials' => [
            ['name' => 'List testimonials'],
            ['name' => 'Create testimonials'],
            ['name' => 'Delete testimonials'],
            ['name' => 'Update testimonials'],
        ],
        'photos' => [
            ['name' => 'List photos'],
            ['name' => 'Create photos'],
            ['name' => 'Delete photos'],
            ['name' => 'Update photos'],
        ],
        'business' => [
            ['name' => 'List business'],
            ['name' => 'Create business'],
            ['name' => 'Delete business'],
            ['name' => 'Update business'],
        ],
        'business category' => [
            ['name' => 'List business category'],
            ['name' => 'Create business category'],
            ['name' => 'Delete business category'],
            ['name' => 'Update business category'],
        ],

    ];

    /**
     * @var
     */
    public $adminUser;

    /**
     * InstallAppHandler constructor.
     */
    public function __construct()
    {
        $this->roles = collect($this->roles);
        $this->permissions = collect($this->permissions);
    }

    /**
     * @param $installationData
     * @param \Closure $next
     * @return mixed
     */
    public function handle($installationData, Closure $next)
    {
        $this->createRoles()->createPermissions()->createAdminUser((array) $installationData)->assignAdminRoleToAdminUser()->assignAllPermissionsToAdminRole();
        event(new ApplicationWasInstalled($this->adminUser, $this->roles, $this->permissions));

        return $next($installationData);
    }

    /**
     * @return $this
     */
    public function createRoles()
    {
        $this->roles = $this->roles->map(function ($role) {
            return Role::create($role);
        });

        return $this;
    }

    /**
     * @return $this
     */
    public function createPermissions()
    {
        $this->permissions = $this->permissions->map(function ($group) {
            return collect($group)->map(function ($permission) {
                return Permission::create($permission);
            });
        });

        return $this;
    }

    /**
     * @param array $attributes
     * @return $this
     * @throws ValidationException
     */
    public function createAdminUser(array $attributes = [])
    {
        $validator = validator($attributes, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $this->adminUser = User::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => $attributes['password'],
        ]);

        return $this;
    }

    /**
     * @return $this
     */
    public function assignAdminRoleToAdminUser()
    {
        $this->adminUser->assignRole('Administrator');

        return $this;
    }

    /**
     * @return $this
     */
    public function assignAllPermissionsToAdminRole()
    {
        $role = Role::where('name', 'Administrator')->firstOrFail();
        $this->permissions->flatten()->each(function ($permission) use ($role) {
            $role->givePermissionTo($permission);
        });

        return $this;
    }
}
