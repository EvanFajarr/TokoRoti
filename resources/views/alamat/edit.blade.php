@extends('template.user')
@section('konten')  
 
<!-- START FORM -->
<form action='{{ url('alamat/'.$alamat->id) }}'  method='post' >
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('alamat')}}' class="btn btn-primary">Kembali</a> 
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
            {{$alamat->id}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="desa" class="col-sm-2 col-form-label">desa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='desa' value="{{$alamat->desa}}" id="desa">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kecamatan" class="col-sm-2 col-form-label">kecamatan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kecamatan' value="{{$alamat->kecamatan}}" id="kecamatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kabupaten" class="col-sm-2 col-form-label">kabupaten</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kabupaten' value="{{$alamat->kabupaten}}" id="kabupaten">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="patokan" class="col-sm-2 col-form-label">patokan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='patokan' value="{{$alamat->patokan}}" id="patokan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </div>
</form>
    <!-- AKHIR FORM -->
    @endsection