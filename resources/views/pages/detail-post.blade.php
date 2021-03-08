@extends('layouts.blog')
@section('title')
{{ $items->title }} — Okriiza 
@endsection

@section('content')
<main>
   <section class="section-detail-post">
      <div class="container">
         <div class="row">
            <div class="col-lg-8">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb border-0 shadow-sm rounded-post">
                     <li class="breadcrumb-item"><a href="{{ route('article') }}"><i class="fas fa-home"></i></a></li>
                     @foreach ($items->categories as $item)
                        <li class="breadcrumb-item"><a href="{{ route('category', $item->slug) }}">{{ $item->name }}</a></li>
                     @endforeach
                     <li class="breadcrumb-item active" aria-current="page">{{ $items->title }}</li>
                  </ol>
               </nav>
               <div class="card border-0 shadow-sm rounded-post mb-3">
                  <div class="img-photo-post">
                     <img src="{{ Storage::url($items->thumbnail)}}" class="card-img-top"  alt="{{ $items->slug }}" loading="lazy" class="lazyload">
                  </div>
                  <div class="py-3 px-3">
                     <h1 class="text-judul-post text-justify">{{ $items->title }}</h1>
                     <table class="table table-borderless">
                        <tr>
                           <td rowspan="3" style="width: 10%;">
                              <div class="img-photo-admin">
                                 <img src="{{ url('themes/frontend/assets/image/photo post.png')}}" alt="okriiza">
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <th class="text-left nama-penulis">{{$items->user->name}}</th>
                           <td class="text-right tanggal-posting">{{ date_format($items->created_at,"d F Y")}}</td>
                        </tr>
                        <tr>
                           <td class="text-left status-penulis"> 
                              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-patch-check-fill text-primary" viewBox="0 0 16 16">
                                 <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                              </svg> Verifed</td>
                           <td class="text-right">
                              @php
                                 $color = 'bg-biru-muda';
                              @endphp
                              @foreach ($items->categories as $item)
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
                                 {{-- <span class="{{$color}} text-label-post">{{$item->name}}</span> --}}
                                 <button class="btn {{$color}} text-label-post rounded">{{$item->name}}</button>
                              @endforeach
                              {{-- <button class="btn bg-biru text-label-post">Web Developer</button>
                              <button class="btn bg-pink text-label-post">Tecknology</button> --}}
                           </td>
                        </tr>
                     </table>
                     <div class="isi-post-artikel">
                        {!! $items->body !!}
                     </div>
                  </div>
               </div>
               <div class="card border-0 shadow-sm rounded-post py-3 px-3 mb-3">
                  <h5 class="title-related-post">Related Post</h5>
                  <div class="row">
                     @foreach ($related as $item)
                        <div class="col-sm-6 col-md-4 mb-2">
                           <img src="{{ Storage::url($item->thumbnail)}}" style="width: 215px; height: 121px;" class="rounded-post rounded-post-img mb-2" alt="{{ $item->slug }}" loading="lazy" class="lazyload">
                           <a href="{{ route('detail',$item->slug)}}" class="text-related-post">{{ $item->title }}</a>
                        </div>
                     @endforeach
                  </div>
               </div>
               <div class="card border-0 shadow-sm rounded-post py-3 px-3 mb-3">
                  <h5 class="title-related-post">Komentar</h5>
                  @include('includes.disqus')
               </div>
            </div>
            <div class="col-lg-4">
               {{-- <div class="card border-0 shadow-sm rounded-post p-3 mb-4">
                  <h4 class="title-newsletter">Newsletter</h4>
                  <p class="text-newsletter">Get Notifications from this blog</p>
                  <div class="form-group has-search mb-0">
                     <span class="fa fa-envelope form-control-feedback"></span>
                     <input type="text" class="form-control  rounded-pill" placeholder="Email Address">
                  </div>
               </div> --}}

               <div class="card border-0 shadow-sm rounded-post p-3 mb-4">
                  <h4 class="title-trending">Recent Post</h4>
                  <div class="row">
                     @forelse ($recent as $item)
                        <div class="col-sm-12 col-md-6 col-lg-12">
                           <div class="media mt-2">
                              <img src="{{ Storage::url($item->thumbnail) }}" style="width: 100px; height: 70px;" class="rounded-post align-self-center rounded-trending-img mr-3"  alt="{{ $item->slug }}" loading="lazy" class="lazyload">
                              <div class="media-body">
                                 <a href="{{ route('detail',$item->slug) }}" class="text-trending">{{ $item->title }}</a> <br>
                              </div>
                           </div>
                           <hr>
                        </div>
                     @empty
                        <div class="text-center mx-auto col-sm-6 col-md-4 mb-2 mt-5 ">
                           <img src="{{ url('themes/frontend/assets/image/no-data.svg') }}" alt="no-data" style="width: 150px; " height="auto" class="mb-3">
                           <p><small class="font-weight-bold">Data Tidak Ditemukan</small></p>
                        </div>
                     @endforelse
                     {{-- @foreach ($recent as $item)
                        <div class="col-sm-12 col-md-6 col-lg-12">
                           <div class="media mt-2">
                              <img src="{{ Storage::url($item->thumbnail) }}" width="100" height="70" class="rounded-post align-self-center rounded-trending-img mr-3"  alt="{{ $item->slug }}" loading="lazy" class="lazyload">
                              <div class="media-body">
                                 <a href="{{ route('detail',$item->slug) }}" class="text-trending">{{ $item->title }}</a> <br>
                              </div>
                           </div>
                           <hr>
                        </div>
                     @endforeach --}}
                     {{-- @foreach ($popular as $item)
                        <div class="col-sm-12 col-md-6 col-lg-12">
                           <div class="media mt-2">
                              <img src="{{ Storage::url($item->thumbnail) }}{{ url('themes/frontend/assets/image/constant-loubier-7lzIyp2Ork4-unsplash.jpg')}}" width="100" height="60" class="rounded-post align-self-center rounded-trending-img mr-3">
                              <div class="media-body">
                                 <a href="#" class="text-trending">{{ $item['pageTitle'] }}</a> <br>
                                 <span>View : {{ $item['pageViews'] }}</span>
                              </div>
                           </div>
                           <hr>
                        </div>
                     @endforeach --}}
                  </div>
               </div>
               
               <div class="card border-0 shadow-sm rounded-post p-3 mb-4">
                  <h4 class="title-trending">Random Post</h4>
                  <div class="row">
                     @foreach ($random as $item)
                        <div class="col-sm-12 col-md-6 col-lg-12">
                           <div class="media mt-2">
                              <img src="{{ Storage::url($item->thumbnail) }}" style="width: 100px; height: 70px;"class="rounded-post align-self-center rounded-trending-img mr-3"  alt="{{ $item->slug }}" loading="lazy" class="lazyload">
                              <div class="media-body">
                                 <a href="{{ route('detail',$item->slug) }}" class="text-trending">{{ $item->title }}</a> <br>
                              </div>
                           </div>
                           <hr>
                        </div>
                     @endforeach
                  </div>
               </div>

               <div class="card border-0 shadow-sm rounded-post p-3 mb-4">
                  <h4 class="title-kategori">Kategori</h4>
                  <div class="label-post">
                     @php
                        $color = 'bg-biru-muda';
                     @endphp
                     @foreach ($category as $item)
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
                              $color = 'bg-kuning'
                           @endphp
                        @elseif ($color == 'bg-kuning')
                           @php
                              $color = 'bg-biru-muda'
                           @endphp
                        @elseif ($color == 'bg-biru-muda')
                           @php
                              $color = 'bg-biru-muda'
                           @endphp
                        @else
                           @php
                              $color = 'bg-biru-muda'
                           @endphp
                        @endif
                           <a href="{{ route('category', $item->slug) }}" class="btn {{ $color}} btn-kategori text-decoration-none mb-2 rounded">{{$item->name}}</a>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection
