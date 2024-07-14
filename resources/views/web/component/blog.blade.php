<div class="blog-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
    <div class="blog-item__image">
        <a href="{{ route('blog.details',$blog->id) }}"><img src="{{ asset('') }}uploads/blogs/{{ $blog->image }}"
              alt="Blog" width="330" height="179"></a>
    </div>
    <div class="blog-item__content">
        <div class="blog-item__meta">
            <span class="meta-action"><i class="fas fa-calendar"></i> {{ $blog->created_at->format('d M Y') }}</span>
        </div>
        <h3 class="blog-item__title"><a href="{{ route('blog.details',$blog->id) }}">{{ $blog->title }}</a></h3>
        <p>{{ $blog->subtitle }}</p>
        <a class="blog-item__more btn btn-light btn-hover-white" href="{{ route('blog.details',$blog->id) }}">Read More
            <i class="fas  fa-long-arrow-right"></i></a>
    </div>
</div>