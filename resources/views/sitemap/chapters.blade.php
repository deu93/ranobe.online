<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($chapters as $chapter)
        @php
          $book= App\Models\Book::where('id', $chapter->book_id)->first()
        @endphp
        <url>
            <loc>{{url("/reader/". $chapter->book_id . '/' . $chapter->slug)}}</loc>
        </url>
    @endforeach
</urlset>