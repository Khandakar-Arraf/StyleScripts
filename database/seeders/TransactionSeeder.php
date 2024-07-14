<?php

namespace Database\Seeders;
// database/seeders/TransactionSeeder.php

use App\Models\Course;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        // Get all orders from the database
        $orders = Order::all();
        foreach ($orders as $order) {
            $transaction = new Transaction();
            $transaction->order_id = $order->id;


            $transaction->invoice = 'LP-' . str_pad($order->id, 10, '0', STR_PAD_LEFT);

            // Handle course orders
            if ($order->type == 1) {
                $course = Course::find($order->item_id);

                // Calculate instructor and owner amounts (assuming profit is 25%)
                $instructorPercentage = 25;
                $instructorAmount = ($instructorPercentage / 100) * $order->price;
                $ownerAmount = $order->price - $instructorAmount;

                $transaction->instructor_id = $course->creator_id;
                $transaction->customer_id = $order->user_id;
                $transaction->amount = $order->price;
                $transaction->ratio = $instructorPercentage;
                $transaction->instructor = $instructorAmount;
                $transaction->owner = $ownerAmount;
            }
            // Handle product orders
            else if ($order->type == 2) {
                $product = Product::find($order->item_id);

                $transaction->instructor_id = 0;
                $transaction->customer_id = $order->user_id;
                $transaction->amount = $order->price;
                $transaction->ratio = 100;
                $transaction->instructor = 0;
                $transaction->owner = $order->price;
            }

            $transaction->save();
        }
    }
}
