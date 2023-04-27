
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{'data'}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Search</button>
                  </form>
                </div>
                <!-- TOMBOL TAMBAH data -->
                <div class="pb-3">
                  <a href='/roti/create' class="btn btn-primary"> Tambah Product</a>
               </div> 

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">nama</th>
                            <th class="col-md-3">foto</th>
                            <th class="col-md-4">deskripsi</th>
                            <th class="col-md-4">harga</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                      
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama }}</td>
                            <td> @if ($item->foto)
                                <img style='max-height:50px;max-width:50px' src='{{ url('foto').'/'.$item->foto }}'/>
                                @endif</td>
                            <td>{!! $item->desc !!}</td>
                            <td>{{ $item->harga }}</td>
                            <td>
                                <a href= '{{url('roti/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('roti/'.$item->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                              <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
               {{$data->links()}}
          </div> 
          @endsection