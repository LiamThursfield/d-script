<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Site;
use Faker\Generator as Faker;

$factory->define(Site::class, function (Faker $faker) {
    return [
        'name'                      => $faker->company,
        'git_url'                   => $faker->url,
        'ssh_key_path'              => '.ssh/' . $faker->word(),
        'site_directory'            => '/sites/' . $faker->word(),
        'current_release_directory' => $faker->word(),
        'releases_directory'        => $faker->word(),
        'persistent_directory'      => $faker->word(),
        'linked_files'              => [
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
