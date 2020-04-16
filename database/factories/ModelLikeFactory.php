<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Like::class, function (Faker $faker) {
    return [
        'reply_id' => function(){
        return \App\Model\Reply::all()->random();
        },
        'user_id' => function(){
            return \App\User::all()->random();
        }
    ];
});
