@extends('template.admin')
@section('name')

                    <form action='{{ url('roti/'.$data->id) }}'  method='post' enctype="multipart/form-data">
                        @include('pesan.pesan')
                        <a href='{{url('roti')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

                        @csrf
                        @method('PUT')
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <div class="mb-3 row">
                                <label for="id" class="col-sm-2 col-form-label">Id</label>
                                <div class="col-sm-10">
                                {{$data->id}}
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="desc" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nama' value="{{$data->nama}}" id="nama">
                                </div>
                            </div>
                    
                            <div class="mb-3 row">
                                <label for="harga" class="col-sm-2 col-form-label">harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='harga' value="{{$data->harga}}" id="harga">
                                </div>
{{--                   
                                <div class="mb-3 row">
                                    <label for="category" class="col-sm-2 col-form-label">category</label>
                                    <div class="col-sm-10">
                                    <select type="text" name="category"  name="category"  value="{{$data->category}}" id="category"  class="form-control">
                                    @foreach ($category as $categorys)
                                    <option > {{ $categorys->category }}</option>
                                    @endforeach
                                  </select>
                                  <p class="text-muted">*silahkan pilih category yang sesuai</p>
                                    </div>
                                </div> --}}


                     <div class="mb-3 row">
                        <label for="desc" class="col-sm-2 col-form-label">desc</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " name='desc' value="{{$data->desc}}" id="desc">
                            
                        </div>
                    </div>

                            @if ($data->foto)
                            <div class="mb-3">
                                <img style="max-width:50px;max-height:50px" src="{{ url('foto').'/'.$data->foto }}"/>
                            </div>
                        @endif
                        <div class="mb-3 row">
                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                            <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                        </div>
                    
                    
                    
                            <div class="mb-3 row">
                                <label for="tahun" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                            </div>
                        
                        </div>
                    </form>



@endsection