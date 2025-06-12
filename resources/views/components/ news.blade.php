<div class="news-bar bg-dark text-white py-2">
    <div class="container">
        <marquee behavior="scroll" direction="{{ app()->getLocale() =='ar' ? 'right' : 'left' }}">
            @foreach($news as $item)
                <span class="mx-4">📢 {{ app()->getLocale() =='ar' ? $item->content : $item->content_fr }}</span>
            @endforeach
        </marquee>
    </div>
</div>
