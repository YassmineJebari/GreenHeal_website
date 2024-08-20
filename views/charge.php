<?php
  require_once('../vendor/autoload.php');
  require_once('../config/db.php');
  require_once('../lib/pdo_db.php');
  require_once('../controllers/panierC.php');
  include_once('../controllers/userC.php');

  \Stripe\Stripe::setApiKey('sk_test_51MDRBrAbvsmkfRj0v3T3xaJ9Judj5PrOyANxs21CGCWjsc4e0kWkFlei92wcQWbPLmaXrN7MT2IR7lYZfBKGr1fC00eQiyuVlJ');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 //$prix = $POST['prix'];
 $user_id = $POST['user_id'];
 $prix = $POST['total'];
 $email = $POST['email'];
 $token = $POST['stripeToken'];

//echo $token;
$total = $prix * 100;

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $total,
  "currency" => "usd",
  "description" => "Intro To React Course",
  "customer" => $customer->id
));

// Customer Data
$customerData = [
  'id' => $charge->customer,
 
  'email' => $email
];

// Instantiate Customer
//$customer = new Customer();

// Add Customer To DB
//$customer->addCustomer($customerData);

/*
// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);*/

// Redirect to success
header('Location:panier/checkout_panier.php?user_id='.$user_id);