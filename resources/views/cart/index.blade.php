@extends('template.user')
@section('konten')



<div class="row">
    <h3>Cart</h3>
    @foreach ($roti as $data)
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100">
              <div class="card-body">
                @if ($data->roti->foto)
                <img style='max-height:100%;max-width:100%' src='{{ url('foto').'/'.$data->roti->foto }}'/>
                @endif
                <h5 class="card-title"> {{$data->roti->name}}</h5>

            </div>
              <div class="card-footer">
                
           
              
                <a href='/hapuscart/{{ $data->id }}' class="btn btn-danger"><i class="bi bi-trash">Hapus</i></a>   
              
              </div>
            </div>
          </div>
        </div>
        @endforeach
       
     
@endsection 



  



