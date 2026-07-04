{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://sitemaps.org">
 {{-- Homepage --}}
 <url>
  <loc>{{ url( '/' ) }}</loc>
 </url>
 {{-- About --}}
 <url>
  <loc>{{ url( '/about' ) }}</loc>
 </url>
 {{-- Archives --}}
 <url>
  <loc>{{ url( '/blog/archives' ) }}</loc>
 </url>
 {{-- Contact --}}
 <url>
  <loc>{{ url( '/contact' ) }}</loc>
 </url>
 {{-- Dynamic Blog Posts --}}
 @foreach ($posts as $post)
 <url>
  <loc>{{ url( '/blog' ) . '/' . $post->slug }}</loc>
 </url>
 @endforeach
</urlset>
