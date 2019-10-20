@extends('layouts.frontend.app')

@section('title', 'DTS NEWS')

@section('content')
<section class="site-section pt-5">
	<div class="container">

		<div class="row blog-entries">
			<div class="col-md-12 col-lg-8 main-content">

				<div class="row">
					<div class="col-md-12">
						<h2 class="mb-4">ABOUT DTS TEAM</h2>
						<p class="mb-5"><center><img src="{{url('images/dts.png')}}" width="50%" alt="Image placeholder" ></center></p>
						<p>Kami DTS TEAM Kelompok 2 yang terdiri dari 4 Orang, yaitu Apriyadi, Daniel, Leska, Rizky</p>
						<table width="745" cellspacing="0" cellpadding="5" align="center">
							<tr>
								<td>Nama</td>
								<td>Apriyadi</td>
								<td rowspan="10" align="center"><img src="" width="210" height="313"></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td>Teknik Informatika (TI)</td>
							</tr>
							<tr>
								<td>Jenjang</td>
								<td>Strata-1 (S1)</td>
							</tr>
							<tr>
								<td>Tempat/Tanggal Lahir</td>
								<td></td>
							</tr>
							<tr>
								<td>Perguruan Tinggi</td>
								<td>UNIVERSITAS GUNADARMA</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td></td>
							</tr>
							<tr>
								<td>Hobi</td>
								<td>Ngoding</td>
							</tr>
						</table>
						<br>
						<table width="745" cellspacing="0" cellpadding="5" align="center">
							<tr>
								<td>Nama</td>
								<td>Daniel</td>
								<td rowspan="10" align="center"><img src="" width="210" height="313"></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td>Teknik Informatika (TI)</td>
							</tr>
							<tr>
								<td>Jenjang</td>
								<td>Strata-1 (S1)</td>
							</tr>
							<tr>
								<td>Tempat/Tanggal Lahir</td>
								<td></td>
							</tr>
							<tr>
								<td>Perguruan Tinggi</td>
								<td>UNIVERSITAS GUNADARMA</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td></td>
							</tr>
							<tr>
								<td>Hobi</td>
								<td>Ngoding</td>
							</tr>
						</table>
						<br>
						<table width="745" cellspacing="0" cellpadding="5" align="center">
							<tr>
								<td>Nama</td>
								<td>Leska</td>
								<td rowspan="10" align="center"><img src="" width="210" height="313"></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td>Teknik Informatika (TI)</td>
							</tr>
							<tr>
								<td>Jenjang</td>
								<td>Strata-1 (S1)</td>
							</tr>
							<tr>
								<td>Tempat/Tanggal Lahir</td>
								<td></td>
							</tr>
							<tr>
								<td>Perguruan Tinggi</td>
								<td>UNIVERSITAS GUNADARMA</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td></td>
							</tr>
							<tr>
								<td>Hobi</td>
								<td>Ngoding</td>
							</tr>
						</table>
						<br>
						<table width="745" cellspacing="0" cellpadding="5" align="center">
							<tr>
								<td>Nama</td>
								<td>Rizky</td>
								<td rowspan="10" align="center"><img src="" width="210" height="313"></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td>Teknik Informatika (TI)</td>
							</tr>
							<tr>
								<td>Jenjang</td>
								<td>Strata-1 (S1)</td>
							</tr>
							<tr>
								<td>Tempat/Tanggal Lahir</td>
								<td>Jakarta, 16 Desember 1997</td>
							</tr>
							<tr>
								<td>Perguruan Tinggi</td>
								<td>UNIVERSITAS GUNADARMA</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>Vila Mutiara Gading 3, Bekasi</td>
							</tr>
							<tr>
								<td>Hobi</td>
								<td>Olahraga</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

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

		
		</div>
	</div>
</section>
@endsection
@push('js')

@endpush