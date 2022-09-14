<header>
  @isset($append['in_header_top']){!! $append['in_header_top'] !!}@endisset
  <div class="col-12 bg-dark text-white text-center p-5">
    <h1>Easy Mail</h1>
    <p>theme gray</p>
    <p>Header contents</p>
  </div>
  @isset($append['in_header_bottom']){!! $append['in_header_bottom'] !!}@endisset
</header>
