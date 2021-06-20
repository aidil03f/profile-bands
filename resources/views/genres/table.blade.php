@extends('layouts.backend',['title' => $title])

@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
           <table class="table">
               <thead>
                   <th>#</th>
                   <th>Name</th>
                   <th>Band</th>
                   <th>Action</th>
               </thead>
               <tbody>
                   @foreach ($genres as $genre)
                       <tr>
                        <td>{{ $genres->count() * ($genres->currentpage() - 1) + $loop->iteration }}</td>
                           <td>{{ $genre->name }}</td>
                           <td>{{ 0 }}</td>
                           <td>
                               <a href="#" class="btn btn-primary btn-sm">Edit</a>
                               {{-- <div endpoint="{{ route('albums.delete', $album) }}" class="delete d-inline"></div> --}}
                           </td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
           {{ $genres->links() }}
        </div>
    </div>
@endsection