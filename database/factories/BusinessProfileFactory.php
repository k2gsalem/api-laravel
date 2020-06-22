<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Business\BusinessProfile;
use App\Entities\Business\ConfigBusinessCategory;
use App\Entities\User;
use Faker\Generator as Faker;

$factory->define(BusinessProfile::class, function (Faker $faker) {
    return [
        'user_id'=>User::all()->random()->id,
        'business_cateogy_id'=>ConfigBusinessCategory::all()->random()->id,
        'business_name'=>$faker->name(),
        'business_image'=>$faker->imageUrl(),
        'business_hours'=>$faker->time(),
        'business_location'=>$faker->city,
        'business_address'=>$faker->address,
        'business_contact'=>$faker->numerify(),
        'business_email'=>$faker->email,
        'business_website'=>$faker->domainName,
        'business_description'=>$faker->paragraph(),
        'view_count'=>random_int(10,2000),
        'status'=>$faker->boolean(),
        'created_by'=>1,
        'updated_by'=>1
        //
    ];
});
