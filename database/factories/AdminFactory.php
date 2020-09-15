<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Admin::class, function (Faker $faker) {
    return [
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => \Illuminate\Support\Facades\Hash::make('admin123')
    ];
});
