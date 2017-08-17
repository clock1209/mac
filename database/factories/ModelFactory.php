<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->userName,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'rolename' => 'test',
        'description'=>'test',
    ];
});

$factory->define(App\Shipment::class, function (Faker\Generator $faker) {
    return [
        'reference_number' => 1,
        'consignee' => 'test',
        'shipper' => 'test',
        'type' => 'FCL',
        'rate' => 'Asia',
        'place_of_receipt' => 'test',
        'pol' => 'test',
        'pod' => 'test',
        'final_destination' => 'test',
        'po_number' => 'test',
        'fcl_container_20' => 'test',
        'fcl_container_40' => 'test',
        'fcl_container_40hc' => 'test',
        'fcl_container_type' => 'Dry cargo',
        'lcl_package' => '123',
        'lcl_weight' => '123',
        'lcl_cbm' => '123',
        'cargo_ready' => \Carbon\Carbon::now(),
        'incoterm' => 'FAS- Free Alongside ship',
    ];
});

$factory->define(App\ScheduleOption::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'shipment_id' => '1',
        'carrier' => 'test',
        'vessel' => 'test',
        'voyage' => 'test',
        'etd' => \Carbon\Carbon::now(),
        'departures' => \Carbon\Carbon::now(),
        'eta' => \Carbon\Carbon::now(),
        'ams_closing' => \Carbon\Carbon::now(),
        'cy_closing' => \Carbon\Carbon::now(),
        'fcl_cont_cost_20' => '123',
        'fcl_cont_cost_40' => '12',
        'fcl_cont_cost_40hc' => '12',
        'fcl_cont_cost_other' => '12',
        'lcl_tm3' => '12',
        'lcl_total' => '12',
        'fcl_inland_cost_20' => '12',
        'fcl_inland_cost_40' => '12',
        'fcl_inland_cost_40hc' => '12',
        'fcl_inland_cost_other' => '12',
    ];
});

$factory->define(App\Shipper::class, function (Faker\Generator $faker) {
    return [
        'tradename' => $faker->word,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'business_name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'street' => $faker->streetAddress,
        'street_number' => $faker->buildingNumber,
        'neighborhood' => $faker->name,
        'city' => $faker->city,
        'country' => $faker->country,
        'zip_code' => $faker->postcode,
        'rfc_taxid' => $faker->regexify('[\w0-9]{10}'),
    ];
});
