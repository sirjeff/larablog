  <nav class="navbar navbar-default">
   <div class="container-fluid">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="/"><img class="figured logo" src="/images/ui/figured-logo.png"></a>
     </div>

     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
         <li><a href="/"><span class="glyphicon glyphicon-home"></span>Blog Home</a></li>
         <li><a href="/about"><span class="glyphicon glyphicon-info-sign"></span>About</a></li> 
         <li><a href="/blog/archives"><span class="glyphicon glyphicon-time"></span>Archives</a></li> 
         <li><a href="/contact" title="Contact"><span class="glyphicon glyphicon-envelope"></span>Contact</a></li>        
       </ul>
       <ul class="nav navbar-nav navbar-right">
         @if (Auth::check())
         
         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim( Auth::user()->email))) . "?s=64&d=monsterid" }}" class="author-image" alt="gravatar image">{{ Auth::user()->name }} <span class="caret"></span>
           </a>
           <ul class="dropdown-menu">
             <li><a href="{{ route('posts.index') }}">All Posts</a></li>
             <li><a href="{{ route('posts.create') }}">Create Post</a></li>
             <li><a href="{{ route('categories.index') }}">All Categories</a></li>
             <li><a href="{{ route('tags.index') }}">All Tags</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="{{ route('logout') }}">Sign-out</a></li>
           </ul>
         </li>
         
         @else
         <span class="auth">
             <span class="glyphicon glyphicon-log-in"></span><a href="{{ route('login') }}">Sign-in</a> / <a href="/auth/register">Register</a>
         </span>
         @endif
       </ul>
     </div>
   </div>
 </nav>
