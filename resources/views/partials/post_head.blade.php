
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{ e($post->summary) }}">
<meta name="author" content="Dwayne Pivac @ OMI Ltd.">
<title>{{ \App\Config::where(['name' => 'title'])->first()->value }} - @yield('title')</title>
<link rel="canonical" href="https://blog.omi.nz/blog/{{ $post->slug }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
{{ Html::style('/css/main.css') }}
<style>
 .hero-cover {background-image:url("/images/files/{{ \App\Config::where(['name' => 'hero_img'])->first()->value }}")}
 .account-cover {background-image:url("/images/files/{{ \App\Config::where(['name' => 'hero_img'])->first()->value }}")}
</style>
@yield('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css" integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
