<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Site;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Site::class, function (Faker $faker) {
    $user_name = Str::slug($faker->name);
    $company_name = $faker->company;
    $company_name_slug = Str::slug($company_name);

    return [
        'name'                      => $company_name,
        'git_url'                   => 'https://github.com/' . $user_name . '/' . $company_name_slug ,
        'ssh_key_path'              => '/home/' . $user_name . '/.ssh/' . $company_name_slug . '/id_rsa',
        'site_directory'            => '/home/' . $user_name . '/sites/' . $company_name_slug,
        'current_release_directory' => 'current',
        'releases_directory'        => 'releases',
        'persistent_directory'      => 'shared',
        'persistent_files'          => [
            [
                'from' => $faker->word(),
                'to' => $faker-> word()
            ],
            [
                'from' => $faker->word(),
                'to' => $faker-> word()
            ],
            [
                'from' => $faker->word(),
                'to' => $faker-> word()
            ]
        ],
        'pre_activation_script'     => [
            [
                'active' => $faker->boolean(),
                'command' => $faker->word(),
            ],
            [
                'active' => $faker->boolean(),
                'command' => $faker->word(),
            ],
            [
                'active' => $faker->boolean(),
                'command' => $faker->word(),
            ]
        ],
        'post_activation_script'    => [
            [
                'active' => $faker->boolean(),
                'command' => $faker->word(),
            ],
            [
                'active' => $faker->boolean(),
                'command' => $faker->word(),
            ],
            [
                'active' => $faker->boolean(),
                'command' => $faker->word(),
            ]
        ],
    ];
});
