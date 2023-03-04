@extends('frontend.layouts.app')


@section('content')
    	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
				@foreach($news as $n)
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg" style="background-image: url({{$n->image}});"></div></a>
						<div class="news-text-box">
							<h3><a href="/home/berita/{{$n->slug}}">{{$n->title}}</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> {{$n->author}}</span>
								<span class="date"><i class="fas fa-calendar"></i>{{$n->created_at->diffForHumans()}}</span>
							</p>
							<p class="excerpt">{{substr($n->content,0,100)}}...</p>
							<a href="/home/berita/{{$n->slug}}" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
                @endforeach

			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							{{$news->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->
@endsection