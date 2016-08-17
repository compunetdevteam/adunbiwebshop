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

/**$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});**/

$factory->define(App\Product::class, function(Faker\Generator $faker){
    return [
        'supplier_id' => function(){
            return factory(App\Supplier::class)->create()->id;
        },
        'stock_id' => function(){
            return factory(App\Stock::class)->create()->id;
        },
        'sale_id' => function(){
            return factory(App\Sale::class)->create()->id;
        },
        'productname' => $faker->word,
        'dateofpurchase'=> $faker->dateTimeThisDecade,
        'batchnumber' => $faker->macAddress,
        'serialnumber' => $faker->macAddress,
        'costprice' => $faker->randomFloat(5,5,9),
        'sellingprice' => $faker->randomFloat(5,5,9),
        'description' => $faker->sentence,
        'weight' => $faker->randomFloat()
    ];
});

$factory->define(App\Stock::class, function(Faker\Generator $faker){
    return [
        'dateenteredinstock' => $faker->date('d-m-Y'),
        'numberofproductsinstock'=> $faker->numberBetween(5,3000)
    ];
});

$factory->define(App\Supplier::class, function(Faker\Generator $faker){
    return [
        'suppliername' => $faker->name,
        'supplieraddress' => $faker->address
    ];
});

$factory->define(App\Sale::class, function(Faker\Generator $faker){
    return [
        'customername' => $faker->name,
        'customeraddress' => $faker->address,
        'customerphone' => $faker->phoneNumber,
        'emailaddress' => $faker->email,
        'saledate' => $faker->dateTime,
        'discount' => $faker->randomFloat(),
        'subtotal' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
        'user_id' => function(){
            return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\User::class, function(Faker\Generator $faker){
    return [
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'password' => $faker->password(10)
    ];
});

$factory->define(App\Category::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'stock_id' => function(){
            return factory(App\Stock::class)->create()->id;
        }
    ];
});

//$factory->define(App\Image::class, function(Faker\Generator $faker){
//    return [
//        'name' => $faker->name,
//        'imagepath' => $faker->sentence,
//        'product_id' => function(){
//            return factory(App\Product::class)->create()->id;
//        }
//    ];
//});

