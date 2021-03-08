@extends('layouts.blog')
@section('title')
   Sharing Pengetahuan, Tips And Trick and Have Fun :) — Okriiza
@endsection

@section('content')
<main>
   <section class="section-post">
      <div class="container">
         <div class="row">
            < class="col-lg-8 ">
               @if ($items->count())
               <div class="card mb-3 rounded-post border-0 shadow-sm">
                  <div class="card rounded-post border-0 shadow-sm">
                     <img src="{{ url(Storage::url($items->first()->thumbnail))}}" class="img-fluid rounded-post-img"  alt="{{ $items->first()->slug }}" loading="lazy" class="lazyload">
                     <div class="card-img-overlay d-flex align-items-start flex-column bd-highlight">
                        <h5 class="card-title btn btn-sm bg-kuning rounded-pill mb-auto">{{ date_format($items->first()->created_at,"d M Y")}}</h5>
                        @php
                           $color = 'bg-biru-muda';
                        @endphp
                        @foreach ($items->first()->categories as $categori)
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
                           <button class="card-text btn btn-sm {{$color}} ">{{$categori->name}}</button>
                        @endforeach
                     </div>
                  </div>
                  <div class="px-3 py-3">
                     <a href="{{ route('detail',$items->first()->slug) }}" class="title-post">{{ $items->first()->title }}</a>
                     <p class="text-post">
                        @if (strlen($items->first()->body)>250)
                           {!! Str::substr(strip_tags($items->first()->body),0,180) !!}...
                        @else
                           {!! $items->first()->body !!}
                        @endif
                     </p>
                     <a href="{{ route('detail',$items->first()->slug) }}" class="btn btn-bg-biru btn-sm">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                  </div>
               </div>
               <div class="row">
                  <!-- medium -->
                  @foreach ($items as $item)
                  <div class="col-md-6 d-none d-md-block">
                     <div class="card mb-2 rounded-post border-0 shadow-sm">
                        <div class="img-photo-post">
                           <img src="{{ url(Storage::url($item->thumbnail))}}" class="card-img-top" alt="{{ $item->slug }}" loading="lazy" class="lazyload">
                        </div>
                        <div class="px-3 py-3">
                           <a href="{{ route('detail',$item->slug) }}" class="text-judul-post text-justify">{{ $item->title }}</a>
                           <p class="text-post-artikel">
                              @if (strlen($item->body)>150)
                                 {!! Str::substr(strip_tags($item->body),0,100) !!}...
                              @else
                                 {!! $item->body !!}
                              @endif
                           </p>
                        <table class="table table-borderless">
                           <tr>
                              <td rowspan="3" style="width: 10%;">
                                 <div class="img-photo-admin mr-2">
                                    <img src="{{ url('themes/frontend/assets/image/photo post1.png')}}" alt="Admin" loading="lazy" class="lazyload">
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <th class="text-left nama-penulis">{{ $item->user->name }}</th>
                              <td class="text-right tanggal-posting">{{ date_format($item->created_at,"d F Y")}}</td>
                           </tr>
                           <tr>
                              <td class="text-left status-penulis"> 
                              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-patch-check-fill text-primary" viewBox="0 0 16 16">
                                 <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                              </svg> Verifed</td>
                              <td class="text-right">
                                 @php
                                 $color = 'bg-biru-muda';
                              @endphp
                              @foreach ($item->categories as $categori)
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
                                 <button class="btn {{$color}} text-label-post rounded">{{$categori->name}}</button>
                              @endforeach
                                 {{-- <span class="bg-biru text-label-post">Web Developer</span>
                                 <span class="bg-pink text-label-post">Tecknology</span> --}}
                              </td>
                           </tr>
                        </table>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  <!-- mobile sm -->
                  @foreach ($items as $item)
                  <div class="col-sm-12 d-md-none">
                     <div class="card mb-2 rounded-post border-0 shadow-sm">
                        <div class="media p-2">
                           <img src="{{ Storage::url($item->thumbnail) }}" style="width: 120px; height: 80px;"class="mr-3 rounded-post"  alt="{{ $item->slug }}" loading="lazy" class="lazyload">
                           <div class="media-body">
                              {{-- <h5 class="title-post-sm"></h5> --}}
                              <a href="{{ route('detail',$item->slug) }}" class="title-post-sm">{{ $item->title }}</a>
                              <p class="d-none d-sm-block">
                                 @if (strlen($item->body)>100)
                                    {!! Str::substr(strip_tags($item->body),0,60) !!}...
                                 @else
                                    {!! $item->body !!}
                                 @endif
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               @endif
               
               {{ $items->links() }}

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
                  <h4 class="title-trending">Random Post</h4>
                  <div class="row">
                     @foreach ($random as $item)
                        <div class="col-sm-12 col-md-6 col-lg-12">
                           <div class="media mt-2">
                              <img src="{{ Storage::url($item->thumbnail) }}" style="width: 100px; height: 70px;" class="rounded-post align-self-center rounded-trending-img mr-3"  alt="{{ $item->slug }}" loading="lazy" class="lazyload">
                              <div class="media-body">
                                 <a href="{{ route('detail',$item->slug) }}" class="text-trending">{{ $item->title }}</a> <br>
                              </div>
                           </div>
                           <hr>
                        </div>
                     @endforeach
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