@extends('layouts.frontend.app')

@section('title', 'DTS NEWS')

@section('content')

 <section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="owl-carousel owl-theme home-slider">
              	   @forelse($posts as $post)
                <div>
                  <a href="{{ route('post.details',$post->slug) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{$post->image}}'); ">
                    <div class="text half-to-full">
                      
                      <div class="post-meta">
                        
                          <span class="author mr-2"><img src="{{$post->user->image}}" alt="Colorlib"> {{$post->user->username}}</span>&bullet;
                        <span class="mr-2">{{$post->created_at}} </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span>{{ $post->comments->count() }} </span>
                        
                      </div>
                      <h3>{{$post->title}}</h3>
                      <p>{!! substr($post->body,0,200) !!}</p>
                    </div>
                     </a>
          
     
                </div>
                        @empty
                     <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1 p-2">
                               <strong>Tidak ada News</strong>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse

              </div>
              
            </div>
          </div>
          
        </div>


      </section>
      <!-- END section -->
 <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
        @forelse($posts as $post)
                <div class="col-md-6">
                  <a href="{{ route('post.details',$post->slug) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="{{ url($post->image) }}" alt="Image placeholder">  
                    <h2>{{$post->title}}</h2> </a>
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <a href="{{ route('author.profile',$post->user->username) }}" title=""><span class="author mr-2"><img src="{{ url($post->user->image) }}" alt="Colorlib"> {{$post->user->username}}</span>&bullet;</a>

                        <span class="mr-2">{{$post->created_at}}</span> &bullet;
                        <br><hr>
                    
                                            @guest
                                                <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton: true,
                                                    progressBar: true,
                                                })"><span class="ml-2"><span class="fa fa-heart"></span>{{ $post->favorite_to_users->count() }}</span></a>
                                            @else
                                                <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"
                                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>

                                                <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite',$post->id) }}" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest

                                            <a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a>
                                   
                                            <a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a>
                                  
                      </div>
                     
                    </div>
               
                </div>
                        @empty
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-100">
                            <div class="single-post post-style-1 p-2">
                               <strong>Belum ada berita Tersedia</strong>
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforelse
              </div>

              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                      <li class="page-item  active"><a class="page-link" href="#">&lt;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
                    </ul>
                  </nav>
                </div>
              </div>


              

              

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
             
              <!-- END sidebar-box -->

              <!-- END sidebar-box -->  
              <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                           @forelse($posts as $post)
                     <li>
                      <a href="{{ route('post.details',$post->slug) }}">
                        <img src="{{ url($post->image) }}" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>{{ $post->title }}</h4>
                          <div class="post-meta">
                            <span class="mr-2">{{$post->created_at}} </span>
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

           
                   <li><a href="{{route('tag.posts',$tag->slug)}}">{{ $tag->name }}<span>{{ $tag->posts->count() }}</span></a></li>
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