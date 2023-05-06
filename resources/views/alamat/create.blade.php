{{-- @extends('template.user')
@section('konten')   --}}
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
 <title>Create alamat</title>
<form action='{{ url('alamat') }}'  method='post'>

    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('alamat')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="desa" class="col-sm-2 col-form-label">desa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='desa' value="{{Session::get('desa')}}" id="desa">
            </div>
        </div>
   
        <div class="mb-3 row">
            <label for="kecamatan" class="col-sm-2 col-form-label">kecamatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kecamatan' value="{{Session::get('kecamatan')}}" id="kecamatan">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="kabupaten" class="col-sm-2 col-form-label">kabupaten</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kabupaten' value="{{Session::get('kabupaten')}}" id="kabupaten">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="patokan" class="col-sm-2 col-form-label">detail rumah</label>
            <div class="col-sm-10">
            <textarea class="form-control  summernote" name="patokan" value="{{Session::get('patokan')}}"  id="patokan"></textarea>
            </div>
        </div>

        
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
   
</form>

{{-- @endsection --}}
