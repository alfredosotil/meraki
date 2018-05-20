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

return $index == 0 ?
    [
        'username' => 'alfredosotil',
        'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
        'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('123Amorciego'),
        'email' => 'alfredosotil@gmail.com',
        'phone_number' => $faker->phoneNumber,
        'status' => 1,
        'created_at' => time(),
        'updated_at' => time(),
        'uuid' => $faker->uuid,
        'name' => 'Alfredo',
        'last_name' => 'Sotil',
        'birthday' => strtotime('-' . $index++ . ' year'),
        'history_id' => $index++,
        'total_points' => 0,
    ]
    :
    [
        'username' => $faker->userName,
        'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
        'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('password_' . $index),
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'status' => 1,
        'created_at' => time(),
        'updated_at' => time(),
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'birthday' => strtotime('-' . $index++ . ' year'),
        'history_id' => $index++,
        'total_points' => 0,
    ];