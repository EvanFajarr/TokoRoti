@extends('template.user')
@section('konten')  
 

@include('pesan.pesan')

        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href='{{url('alamat/create')}}' class="btn btn-primary"> Tambah alamat</a>
                </div>

               
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-3">Alamat</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ Auth::user()['alamat'] }}</td>
                        </tr>
                        @foreach ($alamat as $item)
                        <tr>
                            <td>{!! $item->patokan !!},{{ $item->desa }},{{ $item->kecamatan }},{{ $item->kabupaten }}</td>
                           
                            <td>
                                <a href= '{{url('alamat/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('alamat/'.$item->id) }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                            </td>
                        </tr>
               
                        @endforeach 
                    </tbody>
                 </table>

          </div>
          @endsection 