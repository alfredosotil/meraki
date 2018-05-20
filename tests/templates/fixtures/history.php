<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$faker = Faker\Factory::create();

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
    'uuid' => $faker->uuid,
    'is_alergic' => $faker->numberBetween(0, 1),
    'description' => $faker->sentence(6, true),
    'indications' => $faker->sentence(6, true),
    'type_nutrition' => $faker->randomElement(['DIET', 'FITNESS', 'MUSCLE', 'VEGAN']),
    'created_at' => time(),
    'updated_at' => time(),
    'is_active' => 1
];
