<header id="header">
  @isset($append['in_header_top']){!! $append['in_header_top'] !!}@endisset
  <div class="inTabels">
    <div class="inCell">
      <div class="texts">
        <h1 class="mainTitle">EASY MAIL</h1>
        <p class="subTitle">theme gradation</p>
      </div>
    </div>
  </div>
  <nav class="navs en">
    <ul>
      <li><a href="{{ route("index") }}">TOP</a></li>
      <li><a href="{{ route("index")}}/contact">Contact</a></li>
    </ul>
  </nav>
  @isset($append['in_header_bottom']){!! $append['in_header_bottom'] !!}@endisset
</header><!-- /#header -->
