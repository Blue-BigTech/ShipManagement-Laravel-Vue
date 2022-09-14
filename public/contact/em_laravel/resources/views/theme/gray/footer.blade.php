<footer class="fixed-bottom">
  @isset($append['in_fixed_bottom_top']){!! $append['in_fixed_bottom_top'] !!}@endisset
  <div class="col-12 bg-dark text-white text-center p-2">
    footer contents
  </div>
  @isset($append['in_fixed_bottom_bottom']){!! $append['in_fixed_bottom_bottom'] !!}@endisset
</footer>
