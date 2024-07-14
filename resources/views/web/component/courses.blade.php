<div class="col-lg-12">
    <div class="row">

        @foreach ($courses as $item)
        <div class="col-lg-3">
            @include('web.component.course')
        </div>
        @endforeach

    </div>
</div>
