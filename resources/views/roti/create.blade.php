

@extends('template.admin')
@section('name')
    

<form method="post" action="/roti" enctype="multipart/form-data">
    
    @include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('roti')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('nama')}}"  name='nama'id="nama">
             
            </div>
        </div>

        
          <div class="mb-3 row">
            <label for="desc" class="col-sm-2 col-form-label">Descripsi</label>
            <div class="col-sm-10">
            <textarea class="form-control  summernote" name="desc" value="{{Session::get('desc')}}"  id="desc"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  value="{{Session::get('harga')}}"   name='harga'id="harga">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" name="foto" id="foto">
            </div>
        </div>


    
    <div class="mb-3 row">
        <label for="tahun" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
    </div>
</div>

</form>

@endsection

