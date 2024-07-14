<!-- Vendors JS -->
<script src="{{ asset('') }}assets/web/js/vendor/modernizr-3.11.7.min.js"></script>
<script src="{{ asset('') }}assets/web/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{ asset('') }}assets/web/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="{{ asset('') }}assets/web/js/vendor/bootstrap.bundle.min.js"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('') }}assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Plugins JS -->
<script src="{{ asset('') }}assets/web/js/plugins/aos.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/parallax.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/swiper-bundle.min.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/jquery.powertip.min.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/nice-select.min.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/glightbox.min.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/jquery.sticky-kit.min.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/masonry.pkgd.min.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/flatpickr.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/range-slider.js"></script>
<script src="{{ asset('') }}assets/web/js/plugins/select2.min.js"></script>
{{-- dropify.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"
  integrity="sha512-hJsxoiLoVRkwHNvA5alz/GVA+eWtVxdQ48iy4sFRQLpDrBPn6BFZeUcW4R4kU+Rj2ljM9wHwekwVtsb0RY/46Q=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Activation JS -->
<script src="{{ asset('') }}assets/web/js/main.js"></script>

@stack('script')

@if ($massage = Session::get('success'))
<script>
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "{{ $massage }}",
    showConfirmButton: !1,
    timer: 3000
    })
    Swal();
</script>
@endif
@foreach ($errors->all() as $error)
<script>
    Swal.fire({
  position: "top-end",
  icon: "Error",
  title: "{{ $error}}",
  showConfirmButton: !1,
  timer: 3000
  })
  Swal();
</script>
@endforeach

@if ($massage = Session::get('error'))
<script>
    Swal.fire({
  position: "top-end",
  icon: "Error",
  title: "{{ $massage }}",
  showConfirmButton: !1,
  timer: 3000
  })
  Swal();
</script>
@endif

@if ($massage = Session::get('warning'))
<script>
    Swal.fire({
  position: "center",
  icon: "warning",
  title: "{{ $massage }}",
  showConfirmButton: !1,
  timer: 3000
  })
  Swal();
</script>
@endif
<script>
    $(document).ready(function() {
        // Initialize Dropify
        $('.dropify').dropify();
    });
</script>
