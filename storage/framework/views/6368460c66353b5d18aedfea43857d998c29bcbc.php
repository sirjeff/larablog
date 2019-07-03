  <nav class="navbar navbar-default">
   <div class="container-fluid">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="/"><img class="figured logo" src="https://www.figured.com/assets/img/figured-logo.png"></a>
     </div>

     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
         <li><a href="/">Blog</a></li>
         <li><a href="/about">About</a></li> 
         <li><a href="/contact">Contact</a></li>        
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <?php if(Auth::check()): ?>
         
         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           Hi <?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="<?php echo e(route('posts.index')); ?>">All Posts</a></li>
             <li><a href="<?php echo e(route('posts.create')); ?>">-- Create Post</a></li>
             <li><a href="<?php echo e(route('categories.index')); ?>">All Categories</a></li>
             <li><a href="<?php echo e(route('categories.create')); ?>">-- Create Category</a></li>
             <li><a href="<?php echo e(route('tags.index')); ?>">All Tags</a></li>
             <li><a href="<?php echo e(route('tags.create')); ?>">-- Create Tag</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="<?php echo e(route('logout')); ?>">Sign-out</a></li>
           </ul>
         </li>
         
         <?php else: ?>
         
         <a href="<?php echo e(route('login')); ?>" class="btn btn-default" style="margin-top:0.5em">Sign-in</a>
         
         <?php endif; ?>
       </ul>
     </div>
   </div>
 </nav>
