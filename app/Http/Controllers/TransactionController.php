<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function view($transactionId)
    {
        // Fetch the sale data based on the $transactionId (you may use the existing logic or adjust it as needed)
        $transaction = Transaction::findOrFail($transactionId);

        $sale = [
            'order_no' => $transaction->order_id,
            'type' => $transaction->order->type == 1 ? 'Course' : 'Product',
            'item_title' => $transaction->order->type == 1 ? $transaction->order->course->title : $transaction->order->product->name,
            'invoice' => $transaction->invoice,
            'seller' => $transaction->order->type == 1 ? $transaction->creator->name : 'In House',
            'amount' => $transaction->amount,
            'created_at' => $transaction->created_at->format('d-m-y'),
        ];
        $salesData[] = $sale;

        // Create a view with the sale data (you can create a blade view or use a raw HTML string)
        $view = view('admin.pages.transaction.sale_invoice', compact('sale'));

        // Generate the PDF using dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view->render());
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        return $view;
        // Download the PDF with a unique filename (you can customize the filename as needed)
        // return $dompdf->stream("sale_invoice_{$transaction->order_id}.pdf");
    }
    public function invoice($transactionId)
    {
        // Fetch the sale data based on the $transactionId (you may use the existing logic or adjust it as needed)
        $transaction = Transaction::findOrFail($transactionId);

        $sale = [
            'order_no' => $transaction->order_id,
            'type' => $transaction->order->type == 1 ? 'Course' : 'Product',
            'item_title' => $transaction->order->type == 1 ? $transaction->order->course->title : $transaction->order->product->name,
            'invoice' => $transaction->invoice,
            'seller' => $transaction->order->type == 1 ? $transaction->creator->name : 'In House',
            'amount' => $transaction->amount,
            'created_at' => $transaction->created_at->format('d-m-y'),
        ];
        $salesData[] = $sale;

        // Create a view with the sale data (you can create a blade view or use a raw HTML string)
        $view = view('admin.pages.transaction.sale_invoice', compact('sale'));

        // Generate the PDF using dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view->render());
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // return $view;
        // Download the PDF with a unique filename (you can customize the filename as needed)
        return $dompdf->stream("sale_invoice_{$transaction->order_id}.pdf");
    }
    public function sale()
    {
        $transactions = Transaction::all();

        $salesData = [];

        foreach ($transactions as $item) {

            // Determine the item type based on 'type' field


            $sale = [
                'order_no' => $item->order_id,
                'type' => $item->order->type == 1 ? 'Course' : 'Product',
                'item_title' => $item->order->type == 1 ? $item->order->course->title : $item->order->product->name,
                'invoice' => $item->invoice,
                'seller' => $item->order->type == 1 ? $item->creator->name : 'In House',
                'amount' => $item->amount,
                'created_at' => $item->created_at->format('d-m-y h:i:a'),
            ];
            $salesData[] = $sale;
        }
        // dd($salesData);
        // Pass the salesData to the view
        return view('admin.pages.transaction.sales', compact('salesData'));
    }

    public function course(Request $request)
    {
        if ($request->input('instructorId')) {
            $instructorId = $request->input('instructorId');
            $transactions = $this->coursefilter($instructorId);
        } else {
            $transactions = Transaction::where('instructor_id', '!=', 0)->paginate(10);

        }

        // dd($transactions);
        $orders = Order::where('status', 1)->where('type', 1)->get();
        $customerIds = $orders->pluck('user_id')->unique();
        $customers = User::whereIn('id', $customerIds)->get();
        $instructorIds =Transaction::pluck('instructor_id')->unique();
        $instructors = User::whereIn('id', $instructorIds)->get();



        return view('admin.pages.transaction.course', compact('transactions', 'instructors'));
    }
    public function coursefilter($instructorId)
    {
        // $query = Transaction::query();

        if ($instructorId == 0) {
            $transactions = Transaction::where('instructor_id', '!=', 0)->paginate(10);
        } else {

            $transactions = Transaction::where('instructor_id', '=', $instructorId)->where('instructor_id', $instructorId)->paginate(10);
        }

        // dd($transactions);


        return $transactions;
    }
    public function shopfilter(Request $request)
    {
        $customerId = $request->input('customerId');
        if ($customerId == 0) {
            $transactions = Transaction::where('instructor_id', 0)->get();
        } else {
            $transactions = Transaction::where('instructor_id', 0)->where('customer_id', $customerId)->get();
        }





        // $transactions = $query->get();
        // dd($transactions);
        $response = [];

        foreach ($transactions as $item) {
            $response[] = [
                'coursetitle' => $item->order->product->name,
                'invoice' => $item->invoice,
                'customer_name' => $item->customer->name,
                'amount' => $item->amount,
                'ratio' => $item->ratio,
                'owner' => $item->owner,
                'created_at' => $item->created_at->format('d-m-y h:i:a'),
            ];
        }

        return response()->json($response);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function shop()
    {
        $transactions = Transaction::where('instructor_id', 0)->get();
        // dd($transactions);
        $orders = Order::where('status', 1)->where('type', 2)->get();
        $customerIds = $orders->pluck('user_id')->unique();
        $customers = User::whereIn('id', $customerIds)->get();
        return view('admin.pages.transaction.shop', compact('transactions', 'customers'));
    }

    public function fetchCourseData()
    {
        $transactions = Transaction::where('instructor_id', '!=', 0);
        $response = [];

        foreach ($transactions as $item) {
            $response[] = [
                'coursetitle' => $item->order->course->title,
                'invoice' => $item->invoice,
                'creator_name' => $item->creator->name,
                'amount' => $item->amount,
                'ratio' => $item->ratio,
                'instructor' => $item->instructor,
                'owner' => $item->owner,
                'created_at' => $item->created_at->format('d-m-y h:i:a'),
            ];
        }

        return response()->json($response);
    }

    public function destroy(Transaction $transaction)
    {
        $order = Order::find($transaction->order_id);
        $orderdelete = $order->delete();
        $transactiondelete = $transaction->delete();


        if ($orderdelete && $transactiondelete) {
            return redirect()->back()->with('success', 'transaction Deleted successfully.');
        } else {
            return back()->with('error', 'transaction Delete Unsuccessfull');
        }
    }
}
