@extends('layouts.admin')

@section('content')
<div class="container-fluid">
   
   <div class="card border-left-primary">
      <div class="card-body">
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Project</h1>
            <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary shadow-sm">
               <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Project
            </a>
         </div>
         @if (session('status'))
            <div class="alert alert-success">
               {{ session('status') }}
            </div>
         @endif
         <div class="table-responsive">
            <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 20%">Title</th>
                        <th>Expertise</th>
                        <th>Image</th>
                        <th style="width: 15%">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @php
                     $no = 1;
                  @endphp
                  @forelse ($items as $item)
                        <tr>
                           <td>{{ $no}}</td>
                           <td>{{ $item->title}} </td>
                           <td>
                              @php
                                 $color = 'primary';
                              @endphp
                              @foreach ($item->expertises as $items)
                                 @if ($color == 'primary')
                                    @php
                                       $color = 'success'
                                    @endphp
                                 @elseif ($color == 'success')
                                    @php
                                       $color = 'info'
                                    @endphp
                                 @elseif ($color == 'info')
                                    @php
                                       $color = 'warning'
                                    @endphp
                                 @elseif ($color == 'warning')
                                    @php
                                       $color = 'danger'
                                    @endphp
                                 @elseif ($color == 'danger')
                                    @php
                                       $color = 'primary'
                                    @endphp
                                 @else
                                    @php
                                       $color = 'primary'
                                    @endphp
                                 @endif
                                 <div class="badge badge-{{ $color }}">{{$items->name}}</div>
                              @endforeach
                           </td>
                           <td>
                              <img src="{{ Storage::url($item->image)}}" style="width:150px" class="img-thumbnail">    
                           </td>
                           
                           <td >
                              {{-- <a href="{{ route('project.show', $item->id)}}" class="btn btn-success btn-sm"><i class="fas fa-eye "></i></a> --}}
                              <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-circle btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                              </a>
                              <form action="{{ route('project.destroy', $item->id) }}" method="post" class="d-inline">
                                 @csrf
                                 @method('delete')
                                 <button class="btn btn-sm btn-circle btn-danger">
                                       <i class="fa fa-trash"></i>
                                 </button>
                              </form>
                           </td>
                        </tr>
                        @php
                           $no++;
                        @endphp
                  @empty
                        <tr>
                           <td colspan="5" class="text-center">
                              Data Kosong
                           </td>
                        </tr>
                  @endforelse

               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection