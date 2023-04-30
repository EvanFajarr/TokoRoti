
  

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
                            <th class="col-md-4">nomor hp</th>
                            <th class="col-md-4">status</th>
                        </tr>
                    </thead>
                    <tbody>            
                        @foreach ($order as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->item }}</td>
                            <td>{{ $item->no }}</td>
                            <td>{{ $item->status }}</td>
                            <td>                        
                            </td>
                        </tr>
                        @endforeach
                     
                    </tbody>
                </table>
          </div> 
          @endsection