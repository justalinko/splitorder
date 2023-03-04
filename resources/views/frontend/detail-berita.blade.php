@extends('frontend.layouts.app')

@section('content')
    	<!-- single article section -->
	<div class="mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="single-article-section">
						<div class="single-article-text">
							<div class="single-artcile-bg" style="background-image: url({{$news->image}});"></div>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> {{$news->author}}</span>
								<span class="date"><i class="fas fa-calendar"></i> {{$news->created_at->diffForHumans()}}</span>
							</p>
							<h2>{{$news->title}}</h2>
							{!!$news->content!!}
						</div>

					

					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-section">
						<div class="recent-posts">
							<h4>Berita terbaru</h4>
							<ul>
                                @foreach($latestNews as $new)
								<li><a href="/home/berita/{{$new->slug}}">{{$new->title}}</a></li>
								@endforeach
							</ul>
						</div>
						
						<div class="tag-section">
							<h4>Tags</h4>
							<ul>
								<li><a href="single-news.html">Genteng</a></li>
								<li><a href="single-news.html">Kerjasama</a></li>
								<li><a href="single-news.html">Jepara</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single article section -->

@endsection