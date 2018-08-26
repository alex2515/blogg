<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'writer']);
        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        $admin = factory(App\User::class)->create([
            'name' => 'Alexander',
            'email' => 'a@espinoza.com',
            'password' => bcrypt('123123')
        ]);
        $admin->assignRole($adminRole);

        $writer = factory(App\User::class)->create([
            'name' => 'Espinoza',
            'email' => 'e@espinoza.com',
            'password' => bcrypt('123123')
        ]);
        $writer->assignRole($writerRole);
    }
}
