@extends('layouts.admin')

@section('content')
<div class="container-fluid">
   @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
               @foreach ($errors->all() as $error )
                  <li>{{ $error }}</li>
               @endforeach
         </ul>
      </div>
   @endif
      <div class="card shadow border-left-primary">
         <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800">Edit Article</h1>
               <a href="{{ route('article.index') }}" class="btn btn-sm btn-warning shadow-sm">
                  <i class="fas fa-angle-double-left fa-sm "></i> Kembali
               </a>
            </div>
               <form action="{{ route('article.update',$items->id) }}" method="post" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <div class="row">
                     <div class="col-md-8">
                        <div class="form-group">
                           <label for="title">Judul</label>
                           <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title',$items->title) }}">
                           @error('title')
                              <div class="mt-2 text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="thumbnail">Thumbnail</label> <br>
                           <img src="{{ Storage::url($items->thumbnail) }}" class="mb-2" width="120" height="80">
                           <input type="file" class="form-control-file" name="thumbnail" placeholder="Thumbnail">
                           @error('thumbnail')
                              <div class="mt-2 text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="Isi Artikel">Isi Artikel</label>
                           <textarea name="body" id="body" rows="10" class="form-control">{{ $items->body }}</textarea>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="Kategori">Kategori</label>
                           <select name="name[]" class="form-control select2" multiple="multiple">
                              @foreach ($categories as $item)
                                 <option {{ $items->categories()->find($item->id) ? 'selected' : ''}} value="{{ $item->id}}">{{ $item->name}}</option>
                              @endforeach>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="Keyword">Keyword</label>
                           <input type="text" class="form-control" name="keyword" placeholder="Keyword" value="{{ old('keyword',$items->keyword) }}">
                           @error('keyword')
                              <div class="mt-2 text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary btn-icon-split">
                     <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                     </span>
                     <span class="text">Simpan</span>
                  </button>
               </form>
         </div>
      </div>
</div>
@endsection
