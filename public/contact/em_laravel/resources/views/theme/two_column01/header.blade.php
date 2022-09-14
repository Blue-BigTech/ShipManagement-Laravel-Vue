<header class="header">
  @isset($append['in_header_top']){!! $append['in_header_top'] !!}@endisset
  <h1 class="header__siteTitle">EasyMail</h1>
  <nav class="header__gnavi">
    <a href="#" class="header__naviLink">Top</a>
    <a href="#" class="header__naviLink">Contact</a>
  </nav>
  @isset($append['in_header_bottom']){!! $append['in_header_bottom'] !!}@endisset
</header>