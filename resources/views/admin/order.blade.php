
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">nama</th>
                            <th class="col-md-3">alamat</th>
                            <th class="col-md-4">item</th>
                            <th class="col-md-4">nomor hp</th>
                            <th class="col-md-4">status</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>            
                        <?php $i = $order->firstItem()?>
                        @foreach ($order as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->item }}</td>
                            <td>{{ $item->no }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
           @if ($item->status == "selesai")
           @else()
           <a href= '{{url('edit/'.$item->id.'')}}'  class="btn btn-primary btn-sm">Edit</a>
           @endif
                               
                          
                            </td>
                        </tr>
                        @endforeach
                     
                    </tbody>
                </table>
               {{$order->links()}}
          </div> 
          @endsection