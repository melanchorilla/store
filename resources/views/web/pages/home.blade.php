@extends('layouts.web')

<?php $seo = DB::table('seo')->where('id_seo', '1')->first(); ?>
@section('title')
  {{ $seo->title ? $seo->title : 'Jasa Pembuatan Website | websitetangguh.com' }}
@endsection

@section('description')
  {{ $seo->deskripsi ? $seo->deskripsi : 'Jasa Pembuatan Website | websitetangguh.com' }}
@endsection

@section('keyword')
  {{ $seo->keyword ? $seo->keyword : 'Jasa Pembuatan Website | websitetangguh.com' }}
@endsection

@section('content')

  @include('web.components.header')

  <!-- Main Content Wrapper Start -->

    @include('web.components.tophomepage')

    
    <!-- ABOUT US -->
    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>NASA</h1>
          <h2>AIRLINE EDUCATION SYSTEM</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="https://youtu.be/inH2nfz0Xt0" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('assets/images/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    </section><!-- End Hero -->

    <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{ $aboutus->title }}</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <img src="{{ asset('assets/images/diklat.jpg') }}" class="img-fluid">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>NASA AIRLINE EDUCATION CENTER</h3>
            <p>{!! $aboutus->konten !!}</p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3><strong>Our Vision</strong></h3>

              <div class="mt-5">
                {!! $aboutus->visi !!}
              </div>

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
            <img src="{{ asset('assets/images/airplane.jpg') }}" class="img-fluid">
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('assets/images/student.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Our Mission</h3>
            <p>{!! $aboutus->misi !!}</p>
            
          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><strong>Product & Services</strong></h2>
          <p>Berikut adalah program-program unggulan Diklat NASA AIRLINE EDUCATION kami memiliki tiga kategori program pendidikan yang dapat disesuaikan dengan keinginan terbaik Anda.</p>
        </div>

        <div class="row">
          <div class="col-xl-4 col-md-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="card">
              <img src="{{ asset('assets/images/products/kelas-airline-staff-nasa.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-center"><strong>AIRLINE STAFF</strong></h5>
                <p class="card-text">Airline Staff adalah petugas bandara yang melakukan pelayanan baik itu sebelum keberangkatan penerbangan (pre flight services) maupun saat kedatangan penerbangan (post flight services). Lama pendidikan Airline Staff di Nasa adalah 4 bulan yang berisi teori dan praktik terutama dalam pelayanan di bandara juga simulasi interview dan pengoptimalan diri. Untuk praktik yang dilaksanakan adalah On Job Training di bandara.</p>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-md-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="card">
              <img src="{{ asset('assets/images/products/kelas-avsec.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-center"><strong>AVSEC</strong></h5>
                <p class="card-text">Aviation Security (Avsec) adalah petugas keamanan yang bertugas yaitu menjamin keamanan dan keselamatan penerbangan, memberikan perlindungan terhadap awak pesawat udara, para penumpang, petugas di darat, masyarakat dan instansi yang ada di bandar udara dari tindakan melawan hukum. Avsec wajib memilki lisensi atau Surat Tanda Kecakapan Petugas (STKP) yang dikeluarkan oleh Direktur Jendral Perhubungan Udara. Lama pendidikan program Avsec adalah 1 bulan materi di kelas dan 1-2 bulan OJT di bandara.</p>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-md-4 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="card">
              <img src="{{ asset('assets/images/products/kelas-pramugari.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-center"><strong>PRAMUGARI</strong></h5>
                <p class="card-text">Pramugara/i adalah petugas atau awak kabin yang tugas utamanya adalah untuk menjamin keamanan, melayani kebutuhan dan memastikan kenyamanan penumpang selama penerbangan. Lama pendidikan program pramugara/i di Nasa adalah 4 bulan yang berisi teori dan praktik kepramugarian juga simulasi interview dan pengoptimalan diri. Untuk praktik yang dilaksanakan adalah Flight Experience dan/atau Short Training di salah satu maskapai yang sudah bekerja sama dengan Nasa</p>
              </div>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Services Section -->



    </main><!-- End #main -->
    <!-- //ABOUT US -->

  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

  @include('web.components.bottomhomepage')

@endsection
