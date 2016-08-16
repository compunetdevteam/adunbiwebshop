<?php

use Illuminate\Database\Seeder;

class SentinelDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Users
        DB::table('users')->truncate();

        $admin = Sentinel::getUserRepository()->create(array(
            'email'    => 'admin@admin.com',
            'password' => 'password'
        ));

        $user = Sentinel::getUserRepository()->create(array(
            'email'    => 'user@user.com',
            'password' => 'password'
        ));

        // Create Activations
        DB::table('activations')->truncate();
        $code = Activation::create($admin)->code;
        Activation::complete($admin, $code);
        $code = Activation::create($user)->code;
        Activation::complete($user, $code);

        // Create Roles
        $administratorRole = Sentinel::getRoleRepository()->create(array(
            'name' => 'Administrator',
            'slug' => 'administrator',
            'permissions' => array(
                'users.create' => true,
                'users.update' => true,
                'users.view' => true,
                'users.destroy' => true,
                'roles.create' => true,
                'roles.update' => true,
                'roles.view' => true,
                'roles.delete' => true,
                'products.update' => true,
                'products.view' => true,
                'products.create' => true,
                'products.delete' => true,
                'sales.create' => true,
                'sales.view' => true,
                'sales.update' => true,
                'sales.delete' => true,
                'stocks.view' => true,
                'stocks.create' => true,
                'stocks.update' => true,
                'stocks.delete' => true,
                'suppliers.view' => true,
                'suppliers.create' => true,
                'suppliers.update' => true,
                'suppliers.delete' => true,
                'categories.view' => true,
                'categories.create' => true,
                'categories.update' => true,
                'categories.delete' => true
            )
        ));
        $moderatorRole = Sentinel::getRoleRepository()->create(array(
            'name' => 'Staff',
            'slug' => 'staff',
            'permissions' => array(
                'products.update' => true,
                'products.view' => true,
                'products.create' => true,
                'sales.create' => true,
                'sales.view' => true,
                'stocks.view' => true,
                'suppliers.view' => true,
                'categories.view' => true
            )
        ));
        $subscriberRole = Sentinel::getRoleRepository()->create(array(
            'name' => 'Subscriber',
            'slug' => 'subscriber',
            'permissions' => array()
        ));

        // Assign Roles to Users
        $administratorRole->users()->attach($admin);
        $subscriberRole->users()->attach($user);
        
    }
}
