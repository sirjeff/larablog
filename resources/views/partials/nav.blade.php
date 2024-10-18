  <nav class="navbar navbar-default">
   <div class="container-fluid">
     <div class="navbar-header">
       <a class="navbar-brand" href="/"><img class="logo png" src="/images/ui/logo.png" alt="Logo" width="60" height="60"></a>
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="glyphicon glyphicon-menu-hamburger">
       </button>
     </div>

     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
         <li><a href="/about"><span class="glyphicon glyphicon-info-sign"></span><b>About</b></a></li> 
         <li><a href="/blog/archives"><span class="glyphicon glyphicon-time"></span><b>Archives</b></a></li> 
         <li><a href="/contact" title="Contact"><span class="glyphicon glyphicon-envelope"></span><b>Contact</b></a></li>
         <li>
          <form class="navbar-form navbar-left" role="search" action="/search" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search" name="q">
            </div>
            <button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
          </form>
         </li>

         @if ( Auth::check() && Auth::user()->role === 1)
         <li class="dropdown">
           <a href="#" class="dropdown-toggle userid" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim( Auth::user()->email))) . "?s=64&d=monsterid" }}" class="author-image" alt="gravatar image">{{ Auth::user()->name }} <span class="caret"></span>
           </a>
           <ul class="dropdown-menu">
             <li><a href="{{ route('posts.index') }}">All Posts</a></li>
             <li><a href="{{ route('posts.create') }}">Create Post</a></li>
             <li><a href="{{ route('categories.index') }}">All Categories</a></li>
             <li><a href="{{ route('tags.index') }}">All Tags</a></li>
             <li><a href="{{ route('config.index') }}">Configuration</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span>Sign-out</a></li>
           </ul>
         </li>
         @elseif ( Auth::check() && Auth::user()->role === 2)
         <li class="dropdown">
           <a href="#" class="dropdown-toggle userid" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim( Auth::user()->email))) . "?s=64&d=monsterid" }}" class="author-image" alt="gravatar image">{{ Auth::user()->name }} <span class="caret"></span>
           </a>
           <ul class="dropdown-menu">
             <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span>Sign-out</a></li>
           </ul>
         </li>
         @else
         
         <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span><b>Sign-in</b></a></li> 
         <li><a href="/auth/register"><span class="glyphicon glyphicon-user"></span><b>Register</b></a></li> 
         @endif
         
       </ul>
       
     </div>
   </div>
 </nav>
