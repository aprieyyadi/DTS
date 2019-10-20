@extends('layouts.frontend.app')

@section('title')
{{ $post->title }}
@endsection


@section('content')
  
    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            <img src="{{ url($post->image) }}" alt="Image" class="img-fluid mb-5">
             <div class="post-meta">
                        <span class="author mr-2"><img src="{{url($post->user->image)}}" alt="Colorlib" class="mr-2">{{$post->user->name}}</span>&bullet;
                        <span class="mr-2">{{$post->created_at}} </span> &bullet;
                      
                      </div>
            <h1 class="mb-4">{{$post->title}}</h1>
            @foreach($post->tags as $tag)
            <a class="category mb-5" href="{{ route('tag.posts',$tag->slug) }}">{{$tag->name}}</a>

            @endforeach
           
            <div class="post-content-body text-justify">
              <p>  {!! html_entity_decode($post->body) !!}</p>
     
            </div>

            
            <div class="pt-5">
              <p>Categories:  

                @foreach($post->categories as $category)



                <a href="{{ route('category.posts',$category->slug) }}">{{$category->name}}</a>

                @endforeach


                 Tags: 


                 @foreach($post->tags as $tag)


                 <a href="{{ route('tag.posts',$tag->slug) }}">{{$tag->name}}</a>

                 @endforeach
            </div>


            <div class="pt-5">
              <h3 class="mb-5">{{ $post->comments->count() }} Comments</h3>
              <ul class="comment-list">
            @if($post->comments->count() > 0)
              @foreach($post->comments as $comment)
                <li class="comment">
                  <div class="vcard">
                    <img src="{{ url($comment->user->image) }}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>{{ $comment->user->name }}</h3>
                    <div class="meta">>on {{ $comment->created_at->diffForHumans()}}</div>
                    <p>{{ $comment->comment }}</p>
                  
                  </div>
                </li>
                        @endforeach
                    @else
                           <div class="commnets-area ">

                        <div class="comment">
                            <p>Belum ada komentar ...</p>
                    </div>
                    </div>

                    @endif

             
              </ul>
              <!-- END comment-list -->
              
                    <div class="comment-form">
                        @guest
                            <p>For post a new comment. You need to login first. <a href="{{ route('login') }}">Login</a></p>
                        @else
                            <form method="post" action="{{ route('comment.store',$post->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea name="comment" rows="2" class="text-area-messge form-control"
                                                  placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                    </div><!-- col-sm-12 -->
                                    <div class="col-sm-12">
                                        <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                    </div><!-- col-sm-12 -->

                                </div><!-- row -->
                            </form>
                        @endguest
                    </div><!-- comment-form -->
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            
            <!-- END sidebar-box -->
            <div class="sidebar-box">
              <div class="bio text-center">
                <img src="{{url($post->user->image)}}" alt="Image Placeholder" class="img-fluid">
                <div class="bio-body">
                  <h2>{{$post->user->name}}</h2>
                  <p></p>
                  <p><a href="{{ route('author.profile',$post->user->username) }}" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                </div>
              </div>
            </div>
            <!-- END sidebar-box -->  
                      <!-- END sidebar-box -->  
              <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                           @forelse($blog as $blogs)
                     <li>
                      <a href="{{ route('post.details',$post->slug) }}">
                        <img src="{{ url($blogs->image) }}" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>{{ $blogs->title }}</h4>
                          <div class="post-meta">
                            <span class="mr-2">{{$blogs->created_at}} </span>
                          </div>
                        </div>
                      </a>
                    </li>

             

                    @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1 p-2">
                               <strong>Belum ada berita Tersedia</strong>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse
                  </ul>
                </div>
              </div>

              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">

                @forelse($categories as $category)
              <li><a href="{{route('category.posts',$category->slug)}}">{{ $category->name }}<span>{{ $category->posts->count() }}</span></a></li>
                                  @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1 p-2">
                               <strong>Belum ada berita Tersedia</strong>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse
            
          
                </ul>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Tags</h3>
                <ul class="categories">
                   @forelse($tags as $tag)

                  <li><a href="{{route('tag.posts',$tag->slug)}}">{{ $tag->name }}</a></li>
                     @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1 p-2">
                               <strong>Belum ada berita Tersedia</strong>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse
            
        
                </ul>
              </div>
          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>


@endsection

@push('js')

@endpush