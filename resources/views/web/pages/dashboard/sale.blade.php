@extends('web.pages.dashboard.app.app')
@section('user-body')
<div class="container">
    <!-- Dashboard Info Start -->
    <div class="dashboard-info">
        <div class="container">
            <div class="dashboard-user">
                <div class="dashboard__content">


        <section class="bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-24 lh-1 text-primary mb-4">Sales Report</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Order No.</th>
                                        <th>Course Title</th>
                                        <th>Course Amount</th>
                                        <th>Customer Name</th>
                                        <th>Profit Amount</th>
                                        <th>Order Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($saleData as $index => $item)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $item['order_no'] }}</td>
                                        <td>{{ $item['coursetitle'] }}</td>
                                        <td>${{ $item['course_amount'] }}</td>
                                        <td>{{ $item['customer_name'] }}</td>
                                        <td>${{ $item['profit_amount'] }}</td>
                                        <td>{{ $item['created_at'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="total-profit-amount mt-4">
                            <p><strong>Total Profit Amount:</strong> ${{ $totalProfitAmount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

</div>
</div>
</div>
</div>
@endsection
