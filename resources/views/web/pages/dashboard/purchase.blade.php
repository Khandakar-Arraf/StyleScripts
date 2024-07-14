@extends('web.pages.dashboard.app.app')
@section('user-body')
<div class="container">
    <!-- Dashboard Info Start -->
    <div class="dashboard-info">
        <div class="container">
            <div class="dashboard-user">
                <div class="dashboard__content">
                    <div class="row y-gap-30 relative" style="">
                        <div class="col-xl-12 col-lg-12">


                            <div data-anim="slide-up delay-1" class="is-in-view">
                                <h1 class="text-30 lh-14 pr-60 lg:pr-0">Purchase Lists</h1>
                            </div>

                            <div class="d-flex items-center pt-20">
                                <div class="bg-image size-30 rounded-full js-lazy loaded" data-ll-status="loaded"
                                  style="background-image: url(&quot;img/avatars/small-1.png&quot;);"></div>
                                <div class="text-14 lh-1 ml-10"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="py-md">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Sl no.</th>
                        <th>Item type</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Order time</th>
                        <th>Print Invoice</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $count = 1; @endphp
                      @foreach ($purchasedData as $item)
                      <tr>
                        <td>{{ $count }}</td>
                        <td>
                          @if ($item['type'] == 'Course')
                          <span class="badge bg-dark text-white">{{ $item['type'] }}</span>
                          @else
                          <span class="badge bg-danger text-white">{{ $item['type'] }}</span>
                          @endif
                        </td>
                        <td>{{ $item['item_title'] }}</td>
                        <td>${{ $item['amount'] }}</td>
                        <td>{{ $item['created_at'] }}</td>
                        <td>
                          <a href="{{ route('generate.invoice',$item['order_no']) }}" class="btn btn-info btn-sm text-white">Print</a>
                          <a href="{{ route('generate.view',$item['order_no']) }}" class="btn btn-success btn-sm text-white">View</a>
                        </td>
                      </tr>
                      @php $count++; @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>

    </div>

</div>
</div>
@endsection
