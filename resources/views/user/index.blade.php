
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{'user'}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Search</button>
                  </form>
                </div>
                <!-- TOMBOL TAMBAH data -->
                <div class="pb-3">
                  <a href='/user/create' class="btn btn-primary"> Tambah User</a>
               </div> 

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">nama</th>
                            <th class="col-md-3">telephone</th>
                            <th class="col-md-4">email</th>
                            <th class="col-md-4">rolle</th>
                            <th class="col-md-4">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $user->firstItem()?>
                        @foreach ($user as $item)
                      
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{  $item->no  }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                @if ($item->role == "admin")
                                @else()
                                <form onsubmit="return confirm('Yakin mau menghapus user?')" class='d-inline' action="{{ url('delete/'.$item->id) }}" method="post">
                                    @csrf 
                                    {{method_field('delete')}}
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                              <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
               {{$user->links()}}
          </div> 
          @endsection