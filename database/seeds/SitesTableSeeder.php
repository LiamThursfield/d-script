<?php

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create some sites for the test user
        $user = User::findorFail(1);
        $sites = factory(Site::class, 10)->make();
        $user->sites()->saveMany($sites);
    }
}
