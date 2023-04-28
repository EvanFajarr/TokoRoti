@extends('template.user')
@section('konten')



<div class="row">
   
    @foreach ($roti as $data)
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                @if ($data->roti->foto)
                <img style='max-height:50%;max-width:50%' src='{{ url('foto').'/'.$data->roti->foto }}'/>
                @endif
                <h5 class="card-title"> {{$data->roti->nama}}</h5>
                <p class="text-muted">{{ $data->roti->harga }}</p>
                <a href='/hapuscart/{{ $data->id }}' class="btn btn-danger"><i class="bi bi-trash"></i></a>   
            </div>
                
           
              
             
              
            </div>
          </div>
        </div>
        @endforeach
       
     
@endsection 



  



