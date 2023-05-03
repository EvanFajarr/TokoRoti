@extends('template.user')
@section('konten')



    <div style="margin-botton:50px;" class="banner" > 
     @include('pesan.pesan')
        <div class="container">
          <h1 class="font-weight-semibold">ROTIKU</h1>
          <h6 style="margin-top:20px;"  class="font-weight-normal text-muted pb-3">
           Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam aliquam qui explicabo, ipsam consequatur velit dolorem provident natus, repellat vero facilis saepe exercitationem, esse cumque quas quia eaque ratione deserunt!</h6>
          <div>
           
          </div>
          <img  style="margin-top:20px;"  src="images/coba1.png" alt="" class="img-fluid">
        </div>
      </div>
      
            </div>
          </section>

         

          <section class="Roti" id="Roti">
            <div class="row">
              <div class="col-12 text-center pb-5">
                <h2></h2>
                <h6 class="section-subtitle text-muted m-0">Pilihan Roti</h6>
              </div>

              <div class="owl-carousel owl-theme grid-margin">
                @foreach ($data as $item)
                  <div class="card customer-cards">
                    <div class="card-body">
                      <div class="text-center">
                        @if ($item->foto)
                        <img  style="max-height:100%; max-width:100%;"src='{{ url('foto').'/'.$item->foto }}' class="d-block w-100 img-fluid" id="gambar" alt="picture"/> 
                       {{-- @else
                       <img  style="max-height:100%; max-width:100%;"src='/foto/foto1.jpg' class="d-block w-100 img-fluid" id="gambar" alt="picture"/>  --}}
                       @endif
                        <p class="m-0 py-3 text-muted">{{ $item->nama }} </p>
                        <div class="content-divider m-auto"></div>
                        <h6 class="card-title pt-3">{{ $item->harga }}</h6>
                        <a href="detail/{{ $item['id'] }}" class="btn btn-outline-primary" >Detail</a>
                   </div>
                    </div>
                  </div>
                  @endforeach
            </div>

          </section> 




          <section style="padding:50px;" class="digital-marketing-service" id="digital-marketing-section">
            <div class="row align-items-center">
              <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                <h3 class="m-0">We Offer a Full Range<br>of Digital Marketing Services!</h3>
                <div class="col-lg-7 col-xl-6 p-0">
                  <p class="py-4 m-0 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                  <p class="font-weight-medium text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer</p>
                </div>    
              </div>
              <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                <img src="roti1.jpg" alt="" class="img-fluid">
              </div>
            </div>
    
          </section>     



<!-- Modal for Contact - us Button -->
<form action='{{ url('/saran') }}'  method='post'  >
    @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Kritik Dan Saran</h4>
          @include('pesan.pesan')
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" value="{{Session::get('nama')}}"  name='nama'id="nama" >
            </div>
            <div class="form-group">
              <label for="Email">Email</label>
              <input type="text" class="form-control" name='email' value="{{Session::get('email')}}"  id="email">
            </div>
            <div class="form-group">
              <label for="saran">Saran</label>
              <textarea class="form-control summernote" name='saran'  value="{{Session::get('saran')}}"  id="saran" placeholder="tambahkan saranmu"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</form>











@endsection