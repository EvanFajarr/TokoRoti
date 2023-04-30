@extends('template.user')
@section('konten')



        <div class="container">
          <div class="row mt-5">
            <div class="col mt-2">
              <h4>
                <i class="fa fa-cart-shopping"></i> Your Cart
              </h4>
              @php
                  $total = 0;
              @endphp
              <div class="card">
                <div class="card-body">
                  <div class="card">
                    <div class="card-body">
                      <a href='{{url('/')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>
                      @if(!empty($roti))
                        @foreach ($roti as $data => $value)
                        @php
                            $total = $total + str_replace(".","",str_replace(",00","",str_replace('Rp ', '' , (int)$value->roti->harga)))
                        @endphp
                        <div class="row">
                          <div style="margin-top:20px;"class="col-2">
                            @if ($value->roti->foto)
                            <img style='max-height:100%;max-width:100%' src='{{ url('foto').'/'.$value->roti->foto }}'/>
                            @endif
                          </div>
                          <div class="col-5">
                            <h4>{{$value->roti->nama}}</h4>
      
                            <p>Price  : {{$value->roti->harga}}</p>
                          </div>
                          <div class="col">
                            <p class="text-right">
                              <a href='/hapuscart/{{ $value->id }}' class="btn btn-danger"><i class="bi bi-trash"></i></a>   
                                <i class="fa fa-x"></i>
                              </a>
                            </p>
                          </div>
                        </div> <!-- row -->
                        @endforeach
                      @else
                        <div>
                          Your cart is empty
                        </div>
                      @endif
                    </div>
                  </div>
                  @php
                  $printTotal = "Rp ".number_format($total, 0, '.', '.').",00";
                  @endphp
                  <div class="m-3 text-right">
                    <p class="text-muted">Total : {{$printTotal}}</p>
                    <a href="/checkout" class="btn btn-danger @if($total == 0) disabled @endif" ><i class="bi bi-basket"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
     
@endsection 



  



