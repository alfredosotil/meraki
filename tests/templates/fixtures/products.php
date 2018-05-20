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
    'name' => $faker->name,
    'price' => $faker->numberBetween(12, 20),
    'short_description' => $faker->sentence(5, true),
    'description' => $faker->sentence(10, true),
    'thumbnail' => $faker->imageUrl(300, 300),
    'image' => $faker->imageUrl(300, 300),
    'type_nutrition' => $faker->randomElement(['DIET', 'FITNESS', 'MUSCLE', 'VEGAN']),
    'stock' => 1000,
    'created_at' => time(),
    'updated_at' => time(),
];