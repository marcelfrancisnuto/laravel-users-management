<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Secret;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * create 2 usable dummy accounts to initially test login
         * creates an admin and a standard user
         */
        $this->call(UserSeeder::class);

        //create dummy accounts to populate the list in vue
        User::factory(15)->create();

        //create dummy secrets
        Secret::factory(10)->create();
    }
}
