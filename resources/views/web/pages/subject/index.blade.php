@extends('web.app.app')


@section('main-body')
<div class="page-banner" style="margin-top: 150.639px;">
    <div class="page-banner__wrapper" style="margin-top: 150.639px;">
        <div class="container">

            <!-- Page Breadcrumb Start -->
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item active">All Subjects</li>
                </ul>
            </div>
            <!-- Page Breadcrumb End -->

        </div>
    </div>
</div>

    <section class="layout-pt-md layout-pb-md">
        <div data-anim-wrap class="container">

            <div class="pt-60 lg:pt-40">

                <div class="row">

                    @foreach ($subjects as $item)
                    <div class="col-md-3">
                        <div class="bg-dark-2 text-center my-5">
                            <a href="{{ route('subject.details',$item->id) }}">
                                <img class="w-1/1" src="{{ asset('uploads/subjects/' . $item->image) }}" alt="book">
                                <h5 class="text-dark fw-500 py-5 text-11 ">{{ $item->title }}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>



</div>

@endsection
