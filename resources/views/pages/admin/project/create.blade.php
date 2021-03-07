@extends('layouts.admin')

@section('content')
<div class="container-fluid">
   <div class="row justify-content-center">
      <div class="col-md-6 ">
         <div class="card shadow border-left-primary">
            <div class="card-body">
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-gray-800">Tambah project</h1>
                  <a href="{{ route('project.index') }}" class="btn btn-sm btn-warning shadow-sm">
                     <i class="fas fa-angle-double-left fa-sm "></i> Kembali
                  </a>
               </div>
                  <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     
                     <div class="form-group">
                        <label for="">Title</label>
                        <input type="title" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                        @error('title')
                           <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="">Expertises</label>
                        <select name="name[]" class="form-control select2" multiple="multiple">
                           @foreach ($expertises as $item)
                              <option value="{{ $item->id }}">{{$item->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" name="image">
                        @error('image')
                           <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
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
   </div>
</div>
@endsection
