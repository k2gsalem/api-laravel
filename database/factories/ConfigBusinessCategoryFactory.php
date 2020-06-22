<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Business\ConfigBusinessCategory;
use Faker\Generator as Faker;

$factory->define(ConfigBusinessCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description'=>$faker->paragraph(),
        'status'=>$faker->boolean(),
        'created_by'=>1,
        'updated_by'=>1      
    ];
});
