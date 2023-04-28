<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <div class="container mt-5 mb-5">
    <div  class="row d-flex justify-content-center">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="row ">
                    <div class="col-md-6">
                      @if ($roti->foto)
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src='{{ url('foto').'/'.$roti->foto }}' width="100%" /> </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="kolom p-4">
                            <a href='{{url('/')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>
                                <h5 class="text-uppercase">Status: {{ $roti->status }}</h5>
                                <div class="lokasi d-flex flex-row align-items-center">
                                    <span class="lokasi">{{ $roti->nama }} </span>
                            </div>
                            <p class="about">{!! $roti->desc !!}</p>
                          
                            <form action="{{ route('addtocart') }}" method="POST">
                              @csrf
                              <input type="hidden" name="roti_id"  value="{{$roti->id}}">
                                   <button class="btn btn-primary"><i class="bi bi-skip-backward-btn-cart"></i></button>
                             
                             <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
              .card{
                border:none;
            }
            .card:hover{
              transform: scale(1.05);
              top:-10px;
              box-shadow: 0 10px 20px rgba(20, 14, 14, 0.12), 0 4px 8px rgba(0,0,0,.06);
            }
            .kolom{
              background-color: #eee
            }
            .brand{
              font-size: 13px
            }
            .lokasi{
              color:red;
              font-weight: 700;
              }
              .about{
                font-size: 14px;
                }
                .btn{
                  margin-top:10px;
                }
                            .cart i{
                              margin-right: 10px
                              }

                              .col-md-12{
                                height:100vh;
                              }
</style>
