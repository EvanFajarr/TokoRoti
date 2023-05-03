
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
        <div class="my-1 p-3 bg-body rounded shadow-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-6">nama</th>
                            <th class="col-md-6">email</th>
                            <th class="col-md-12">saran</th>
                        </tr>
                    </thead>
                    <tbody>            
                        @foreach ($saran as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{!! $item->saran !!}</td>
                            <td>                        
                            </td>
                        </tr>
                        @endforeach
                     
                    </tbody>
                </table>
          </div> 
          @endsection