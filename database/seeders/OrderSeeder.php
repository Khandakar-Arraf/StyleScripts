<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Get all product and course IDs from the database
        $productIds = Product::pluck('id')->toArray();
        $courseIds = Course::pluck('id')->toArray();

        // Get all user IDs for customers from the database
        $customerUserIds = User::where('role', '1')->pluck('id')->toArray();

        // Create a total of 500 orders
        for ($i = 1; $i <= 100; $i++) {
            $productId = $productIds[array_rand($productIds)]; // Random product ID
            $courseId = $courseIds[array_rand($courseIds)]; // Random course ID
            $customerUserId = $customerUserIds[array_rand($customerUserIds)]; // Random customer user ID

            $type = rand(1, 2); // Random type (1 for product, 2 for course)

            if ($type === 1) {
                // If type is 1 (product), get item_id and price from course
                $item = Course::find($courseId);
            } else {
                // If type is 2 (course), get item_id and price from product
                $item = Product::find($productId);
            }

            $user = User::find($customerUserId);
            Order::create([
                'user_id' => $customerUserId,
                'item_id' => $item->id,
                'type' => $type,
                'status' => 1,
                'phone' => $user->phone, // User phone
                'price' => $item->price,
                'payment_type' => $this->getRandomPaymentType(), // Custom method to get random payment type
                'transaction_id' => $this->generateRandomTransactionId(), // Custom method to generate random transaction ID
            ]);
        }
    }

    // Custom method to get random payment type
    private function getRandomPaymentType()
    {
        $paymentTypes = ['Bkash', 'Nagad', 'Rocket', 'Cash'];
        return $paymentTypes[array_rand($paymentTypes)];
    }

    // Custom method to generate random transaction ID
    private function generateRandomTransactionId()
    {
        return substr(md5(uniqid()), 0, 10);
    }
}
