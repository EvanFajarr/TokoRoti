
  

@extends('template.user')
@section('konten')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <table class="table table-striped-fluid">
                    <thead>
                        <tr>
                            <th class="col-md-1">nama</th>
                            <th class="col-md-3">alamat</th>
                            <th class="col-md-4">item</th>
                            <th class="col-md-4">note</th>
                            <th class="col-md-4">nomor hp</th>
                            <th class="col-md-4">status</th>
                            <th class="col-md-4">aksi</th>
                        </tr>
                    </thead>
                    <tbody>            
                        @foreach ($order as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->item }}</td>
                            <td>{!! $item->note !!}</td>
                            <td>{{ $item->no }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                            @if ($item->status == "terkirim")
                            <form onsubmit="return confirm('Yakin mau menghapus order?')" class='d-inline' action="{{ url('hapus/'.$item->id) }}" method="post">
                                @csrf 
                                {{method_field('delete')}}
                                <button type="submit" name="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                     
                    </tbody>
                </table>
          </div> 
          @endsection