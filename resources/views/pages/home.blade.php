@extends('layouts.app')
@section('title')
   Rendi Okriza Putra 
@endsection

@section('content')
<header>
   <div class="container">
      <div class="row align-items-center">
         <div class="col-md-6 mb-3" >
            <p><span class="text-pink text-nama">Hallo</span>, my name is</p>
            <h1 class="text-biru title-nama txt-rotate" data-period="1500"
            data-rotate='[ "Rendi Okriza Putra.", "Rendi Okriza Putra.", "Rendi Okriza Putra.", "Rendi Okriza Putra.", "Rendi Okriza Putra." ]'></h1>
            <p class="text-nama">I am a freelance full Stack web developer , I am a college student and
               I Love Playing Games.</p>
               <a href="#project" class="btn btn-bg-biru">MY WORK</a>
               <a href="#about-me" class="btn btn-bg-biru-outline">CONTACT</a>
         </div>
         <div class="col-md-6">
            <img src="{{ url('themes/frontend/assets/image/header.png')}}" class="img-fluid" width="540" height="350">
         </div>
      </div>
   </div>
</header>

<main>
   <section class="section-about-me" id="about-me">
      <div class="container">
         <div class="text-center mb-5">
            <p class="text-biru sub-title-about">About</p>
            <h2 class="title-about">About Me</h2>
            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> --}}
         </div>
         <div class="row align-items-center">
            <div class="col-md-6 mb-3" data-aos="fade-right" data-aos-duration="1500">
               <img src="{{ url('themes/frontend/assets/image/about.png')}}" class="img-fluid">
            </div>
            <div class="col-md-6">
               <p class="text-justify" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">Website ini di buat untuk menampilkan hasil dari project yang pernah saya kerjakan dan terdapat blog yang berisikan artikel, yang mana di artikel tersebut saya akan sharing mengenai hal apa yang saya suka dan saya pelajari.</p>
               <table data-aos="fade-up" data-aos-duration="2000" data-aos-delay="1000">
                  <tr>
                     <td><i class="fas fa-user-tie text-biru"></i> Nama</td>
                     <td class="font-weight-bold">: Rendi Okriza Putra</td>
                  </tr>
                  {{-- <tr>
                     <td><i class="fas fa-phone text-biru"></i> Phone</td>
                     <td class="font-weight-bold">: +6289502161899</td>
                  </tr> --}}
                  <tr>
                     <td><i class="fas fa-envelope text-biru"></i> Email</td>
                     <td class="font-weight-bold">: okriizaa@gmail.com</td>
                  </tr>
               </table>
               <h4 class="mt-4 font-weight-bold" data-aos="fade-up" data-aos-duration="2500" data-aos-delay="1500">My Interests</h4>
               <div class="list-interests" data-aos="fade-up" data-aos-duration="3000" data-aos-delay="1700">
                  <span class="font-weight-bold"><i class="fas fa-headphones-alt text-biru"></i> Music</span>
                  <span class="font-weight-bold ml-2"><i class="fas fa-suitcase text-biru"></i> Travel</span>
                  <span class="font-weight-bold ml-2"><i class="fas fa-film text-biru"></i> Movie</span>
                  <span class="font-weight-bold ml-2"><i class="fas fa-camera-retro text-biru"></i> Photo</span>
                  <span class="font-weight-bold ml-2"><i class="fas fa-hiking text-biru"></i> Hiking</span>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="section-service" id="service">
      <div class="container">
         <div class="text-center mb-5 pt-4">
            <p class="text-kuning sub-title-service">Service</p>
            <h2 class="title-service">My Best Service</h2>
            {{-- <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> --}}
         </div>
         <div class="row list-service align-items-center" >
            <div class="col-md-4 text-white text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">
               <div class="icon">
                  <i class="fas fa-code"></i>
               </div>
               <h5 class="title-service">Backend Web Development</h5>
               <p class="text-service mx-4">Back-end adalah bagian belakang layar, Bahasa pemrograman untuk back-end diantaranya adalah PHP, Ruby, Python, dan banyak lainnya.</p>
            </div>
            <div class="col-md-4 text-white text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1000">
               <div class="icon">
                  <i class="fas fa-laptop-code"></i>
               </div>
               <h5 class="title-service">Frontend Web Development</h5>
               <p class="text-service mx-4">Front-end adalah bagian yang langsung dilihat oleh user. Dibangun menggunakan HTML, CSS, dan JavaScript</p>
            </div>
            <div class="col-md-4 text-white text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500">
               <div class="icon">
                  <i class="fas fa-gem"></i>
               </div>
               <h5 class="title-service">UI/UX Web Designer</h5>
               <p class="text-service mx-4">Pada bagian ini UI/UX designer merupakan orang yang menangani tampilan dari suatu produk, seperti aplikasi atau website.</p>
            </div>
         </div>
      </div>
   </section>
   <section class="section-blog" id="article">
      <div class="text-center mb-5 pt-4">
         <p class="text-pink sub-title-blog">Blog</p>
         <h2 class="title-blog">Last Update</h2>
         {{-- <p class="text-blog">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> --}}
      </div>
      <div class="container">
         <div class="row mt-5 mb-5" data-aos="fade-up" data-aos-duration="3000">
            @foreach ($artikel_data as $artikel)
            <div class="col-md-4 mb-3">
               <div class="card bg-dark text-white">
                  <img src="{{ Storage::url($artikel->thumbnail)}}" class="card-img-top" height="200">
                  <div class="card-img-overlay d-flex align-items-start flex-column bd-highlight mb-3">
                     <h5 class="mb-auto card-title btn btn-sm bg-kuning rounded-pill ">{{ date_format($artikel->created_at,"d M Y")}}</h5>
                     @php
                        $color = 'bg-biru-muda';
                     @endphp
                     @foreach ($artikel->categories as $category)
                        @if ($color == 'bg-biru-muda')
                           @php
                              $color = 'bg-biru'
                           @endphp
                        @elseif ($color == 'bg-biru')
                           @php
                              $color = 'bg-pink'
                           @endphp
                        @elseif ($color == 'bg-pink')
                           @php
                              $color = 'bg-abu-putih'
                           @endphp
                        @elseif ($color == 'bg-abu-putih')
                           @php
                              $color = 'bg-kuning'
                           @endphp
                        @elseif ($color == 'bg-kuning')
                           @php
                              $color = 'bg-biru-muda'
                           @endphp
                        @else
                           @php
                              $color = 'bg-biru-muda'
                           @endphp
                        @endif
                        <p class="card-text btn {{$color}}">{{ $category->name}}</p>
                     @endforeach
                  </div>
               </div>
               <h4 class="title-artikel">{{ $artikel->title}}</h4>
               <p class="text-artikel">
                  
                  {!!  Str::limit(strip_tags($artikel->body),120) !!}
                  {{-- @if (strlen($artikel->body)>150)
                     {!! Str::substr(strip_tags($artikel->body),0,120) !!}...
                  @else
                     {!! $artikel->body !!}
                  @endif --}}
               </p>
               <a href="{{ route('detail',$artikel->slug)}}" class="btn-bg-biru btn btn-sm text-white ">READ MORE <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
            @endforeach
         </div>
      </div>
   </section>
   <section class="section-project" id="project">
      <div class="text-center mb-3 pt-4">
         <p class="text-biru sub-title-project">My Project</p>
         <h2 class="title-project">Recent Works</h2>
      </div>

      <div class="container">
         <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">
            <li class="nav-item" role="presentation">
               <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-home" aria-selected="true">All Project</a>
            </li>
            @foreach ($expertise_data as $item)
               <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-{{ $item->slug}}-tab" data-toggle="pill" href="#pills-{{ $item->slug}}" role="tab" aria-controls="pills-{{ $item->slug}}" aria-selected="false">{{ $item->name}}</a>
               </li>
            @endforeach
         </ul>
         <div class="tab-content" id="pills-tabContent" data-aos="fade-up" data-aos-duration="2500" data-aos-delay="1000">
            <div class="tab-pane fade show active " id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
               <div class="row">
                  @foreach ($project_data as $item)
                     <div class="col-md-4 mb-3">
                        <div class="img-hover-zoom image-hover-zoom-animate project-image-popup"> 
                           <a href="{{ Storage::url($item->image)}}"><img src="{{ Storage::url($item->image)}}" class="img-fluid">{{ $item->title }}</a>
                        </div>
                     </div>
                  @endforeach
               </div>
               
               <div class="d-flex justify-content-center mt-3" data-aos="fade-up" data-aos-duration="3000" data-aos-delay="1500">
                  {{ $project_data->links() }}
               </div>
            </div>
            @foreach ($expertise_data as $item)
                  <div class="tab-pane fade" id="pills-{{ $item->slug}}" role="tabpanel" aria-labelledby="pills-{{ $item->slug}}-tab">
                     <div class="row">
                        @foreach ($item->projects as $items)
                           <div class="col-md-4 mb-3">
                              <div class="img-hover-zoom image-hover-zoom-animate project-image-popup">
                                    <a href="{{ Storage::url($items->image)}}"><img src="{{ Storage::url($items->image)}}" class="img-fluid ">{{ $items->title }}</a>
                              </div>
                           </div>
                           @endforeach
                     </div>
                  </div>
            @endforeach
         </div>
      </div>
   </section>
</main>
@endsection