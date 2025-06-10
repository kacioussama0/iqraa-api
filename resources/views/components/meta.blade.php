<title>{{ $title ?? config('app.name') }}</title>

<meta name="description" content="{{ $description ?? 'Bienvenue à l’École Arabe de Genève.' }}">
<meta name="keywords" content="{{ $keywords ?? 'école, arabe, genève, enfants, cours' }}">
<meta name="author" content="École Arabe de Genève">
<link rel="canonical" href="{{ $canonical ?? url()->current() }}"/>

{{-- Open Graph --}}
<meta property="og:title" content="{{ $ogTitle ?? $title ?? config('app.name') }}">
<meta property="og:description" content="{{ $ogDescription ?? $description }}">
<meta property="og:image" content="{{ $ogImage ?? asset('assets/imgs/og-default.jpg') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">

{{-- Twitter --}}
<meta name="twitter:title" content="{{ $twitterTitle ?? $title }}">
<meta name="twitter:description" content="{{ $twitterDescription ?? $description }}">
<meta name="twitter:image" content="{{ $twitterImage ?? $ogImage ?? asset('assets/imgs/og-default.jpg') }}">
<meta name="twitter:card" content="summary_large_image">
