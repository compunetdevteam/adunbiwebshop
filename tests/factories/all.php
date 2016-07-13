<?php
/**
 * Created by PhpStorm.
 * User: JOE
 * Date: 07-Jul-16
 * Time: 3:20 AM
 */

$factory('App\Supplier',[
   'suppliername' => $faker->name,
    'supplieraddress' => $faker->address
]);

$factory('App\Stock',[
    'dateenteredinstock' => $faker->date('d-m-Y'),
    'numberofproductsinstock'=> $faker->numberBetween(5,3000)
]);

$factory('App\Sale', [
    'customername' => $faker->name,
    'customeraddress' => $faker->address,
    'customerphone' => $faker->phoneNumber,
    'emailaddress' => $faker->email,
    'discount' => $faker->randomFloat(),
    'subtotal' => $faker->randomFloat(),
    'total' => $faker->randomFloat(),
    'user_id' => 'factory:App\User'
]);

$factory('App\User', [
    'email' => $faker->email,
    'first_name' => $faker->firstName,
    'last_name' => $faker->lastName,
    'password' => $faker->password(10)
]);



$factory('App\Product',[
    'supplier_id' => 'factory:App\Supplier',
    'stock_id' => 'factory:App\Stock',
    'sale_id' => 'factory:App\Sale',
    'productname' => $faker->text,
    'dateofpurchase'=> $faker->date('d-m-Y'),
    'batchnumber' => $faker->macAddress,
    'serialnumber' => $faker->macAddress,
    'costprice' => $faker->randomFloat(),
    'sellingprice' => $faker->randomFloat(),
    'description' => $faker->sentence,
    'weight' => $faker->randomFloat()
]);