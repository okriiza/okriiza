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
   <div class="row justify-content-center">
      <div class="col-md-6 ">
         <div class="card shadow border-left-primary">
            <div class="card-body">
               <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-gray-800">Edit category</h1>
                  <a href="{{ route('category.index') }}" class="btn btn-sm btn-warning shadow-sm">
                     <i class="fas fa-angle-double-left fa-sm "></i> Kembali
                  </a>
               </div>
                  <form action="{{ route('category.update',$items->id) }}" method="post" enctype="multipart/form-data">
                     @method('PUT')
                     @csrf
                     <div class="form-group">
                        <label for="">Category</label>
                        <input type="text" class="form-control" name="name" placeholder="Category" value="{{ old('name', $items->name) }}">
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
