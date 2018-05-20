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
    'group_food_id' => $faker->numberBetween(1,6),
    'type_ingredient_id' => $faker->numberBetween(1,4),
    'name' => $faker->name,
    'description' => $faker->sentence(6, true),
    'protein_per_gram' => $faker->randomFloat(2,0,2),
    'color' => $faker->safeHexColor,
    'type' => '*'
];