@extends('template.admin')
@section('name')  
 

@include('pesan.pesan')

        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href='{{url('category/create')}}' class="btn btn-primary"> Tambah Category</a>
                </div>

               
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">id</th>
                            <th class="col-md-3">Category</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($category as $item)
                      
                        <tr>
                            
                            <td>{{$item->id}}</td>
                            <td>{{$item->category}}</td>
                           
                            <td>
                                <a href= '{{url('category/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('category/'.$item->id) }}" method="post">
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