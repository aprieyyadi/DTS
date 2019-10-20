@extends('layouts.frontend.app')

@section('title', 'DTS NEWS')

@section('content')
    <section class="site-section pt-5">
      <div class="container">
        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="row">
              <div class="col-md-12">
                <h2 class="mb-4">ABOUT DTS NEWS</h2>
                <p class="mb-5"><center><img src="{{url('images/dts.png')}}" width="50%" alt="Image placeholder" ></center></p>
                <p>Halo Digiers! Kalian tahu tidak kalau pemerintah kita lebih tepatnya Kementerian Komunikasi dan Informatika (Kemenkominfo) mengadakan program pengembangan sumber daya manusia (SDM) sebagai bagian dari program pembangan prioritas nasional.</p>
                <p>Program pelatihan kompetensi DTS 2019 ditujukan untuk meningkatkan keterampilan (up-skilling) SDM bidang Komunikasi dan Informatika sehingga dapat meningkatkan produktivitas dan daya saing bangsa.</p>
                <p>Program DTS 2019 secara garis besar dibagi menjadi empat akademi, yaitu:</p>
                <p><ol>
                  <li>
                    Fresh Graduate Academy (FGA) , program pelatihan bagi lulusan D3, D4 dan S1 bidang TIK dan MIPA, terbuka bagi penyandang disabilitas;
                  </li>
                  <li>
                    Vocational School Graduate Academy (VSGA) , program pelatihan bagi lulusan SMK;
                  </li>
                  <li>
                    Coding Teacher Academy (CTA) , program pelatihan bagi para guru yang mengajar bidang TIK pada SMK, SMA, SMALB, dan Madrasah Aliyah (Terbuka bagi Guru PNS dan Non PNS); dan
                  </li>
                  <li>
                    Online Academy (OA) , program pelatihan secara online bagi masyarakat umum termasuk ASN, mahasiswa, dan pelaku industri.
                  </ol>
                </ul></p>
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
                <ul class="tags">
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