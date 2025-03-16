@extends('catalog.layouts.app')

@section('title','Galeri Sayfamız')

@section('content')
    

    
    
    
    
    <section class="page-title page-title-layout1 bg-overlay bg-overlay-2 bg-parallax text-center">
      <div class="bg-img"><img src="assets/images/page-titles/11.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Ana Sayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hizmetlerimiz</li>
              </ol>
            </nav>
            <h1 class="pagetitle__heading mb-0">Hizmetlerimiz</h1>
            <a href="#careers" class="scroll-down">
              <i class="icon-arrow-down"></i>
            </a>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
      Blog Grid
    ========================= -->
    <section class="post-grid">
      <div class="container">
        <div class="row">
          <!-- Post Item #1 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="post-item">
              <div class="post__img">
                <a href="blog-single-post.html">
                  <img src="assets/images/blog/grid/1.jpg" alt="post image" loading="lazy">
                </a>
              </div><!-- /.post-img -->
              <div class="post__body">
                <h4 class="post__title"><a href="#">Hizmet Başlık
                  </a></h4>
                <p class="post__desc">Hizmet Kısa Açıklama
                </p>
                <a href="blog-single-post.html" class="btn btn__secondary btn__outlined btn__custom">
                  <i class="icon-arrow-right"></i>
                  <span>Devamını Oku</span>
                </a>
              </div><!-- /.post-content -->
            </div><!-- /.post-item -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            <nav class="pagination-area">
              <ul class="pagination justify-content-center">
                <li><a class="current" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#"><i class="icon-arrow-right"></i></a></li>
              </ul>
            </nav><!-- .pagination-area -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.blog Grid -->

@endsection