 <!-- Bootstrap core JavaScript -->
 <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
 <script>
     AOS.init();
 </script>
 {{-- adminkit --}}
 <script src="{{ asset('static/js/app.js') }}"></script>
 <!-- sweet alert -->
 <script src="{{asset('vendor/sweetalert2/sweetalert2.all.min.js')}}"></script>
 <!-- toastr js -->
 <script src="{{asset('vendor/toastr/toastr.min.js')}}"></script>
 <script>
     var url = "{{url('')}}"
 </script>