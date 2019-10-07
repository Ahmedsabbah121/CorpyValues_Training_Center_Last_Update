<?php

use Illuminate\Database\Seeder;

use App\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$admin = new Admin;
    	$admin->admin_name = "admin";
    	$admin->admin_email = "admin@admin.com";
    	$admin->admin_password = bcrypt(123456);
    	$admin->save();
    }
}
