
  

@extends('template.user')
@section('konten')  

                  
                    <div class="container">
                      
                    @include('pesan.pesan')

                      <div class="row mt-5">
                        <h2>Information</h2>
                        <div class="mb-3 text-right">
                          <a href="/cartlist" class="btn btn-danger">Back to Cart</a>
                        </div>
                        <div class="col-6">
                          <div class="card h-100">
                            <div class="card-body">
                              <form action="" method="POST">
                                @csrf
                                @if (Auth::check())
                                <div class="mb-3">
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" name="nama" class="form-control" value="{{ Auth::user()['name'] }}">
                                </div>
                                <div class="mb-3">
                                  <label for="name" class="form-label">Address</label>
                                  <input type="text" name="alamat" class="form-control" value="{{ Auth::user()['alamat'] }}">
                                </div>
                                <div class="mb-3">
                                  <label for="name" class="form-label">Phone Number</label>
                                  <input type="text" name="no" class="form-control" value="{{ Auth::user()['no'] }}">
                                </div>
                                <div class="mb-3">
                                  <label for="name" class="form-label">Note</label>
                                  <textarea name="note"  cols="30" rows="10" class="form-control summernote"></textarea>
                                </div>
                                <div class="mb-3 row">
                                  <label for="pembayaran" class="form-label">pembayaran</label>
                                  <select type="text" name="pembayaran"  name="pembayaran" id="pembayaran"  class="form-control">
                                  <option >cod</option>
                                </select>  
                              </div>
                              <div class="mb-3 row">
                                <label for="item"  class="col-sm-2 col-form-label">item</label>
                                <div class="col-sm-10"  name="item" >
                                  <input type="text" name="item" class="form-control"
                                   value=" @foreach ($roti as $data){{ $data->roti->nama }}{{ $data->roti->harga }},  @endforeach" readonly >
                                 
                                </div>
                            </div>
                                @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-6">
                          @php
                              $total=0
                          @endphp
                          <div class="card h-100">
                            <div class="card-body">
                              <div class="card">
                                <div class="card-body">
                                  @if(!empty($roti))
                                  @foreach ($roti as $data => $value)
                                  @php
                                  $total = $total + str_replace(".","",str_replace(",00","",str_replace('Rp ', '' , (int)$value->roti->harga)))
                              @endphp
                                    <div class="row">
                                      <div class="col-6">
                                        @if ($value->roti->foto)
                                        <img style='max-height:100%;max-width:100%' src='{{ url('foto').'/'.$value->roti->foto }}'/>
                                        @endif
                                      </div>
                                      <div class="col-6">
                                        <h4>{{$value->roti->nama}}</h4>
      
                                        <p>Price  : {{$value->roti->harga}}</p>
                                      </div>
                                      <div class="col">
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
                              $total = "Rp ".number_format($total, 0, '.', '.').",00";
                              @endphp
                              <div class="m-3 text-right">
                                <p class="text-muted">Total : {{$total}}</p>
                                <button type="submit" class="btn btn-danger">Order</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
          @endsection