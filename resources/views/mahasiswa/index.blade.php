@extends('mahasiswa.layout') 
 
@section('content') 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="search" placeholder="Cari Mahasiswa">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>
 
 @if ($message = Session::get('success')) 
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
 @endif
 @if ($message = Session::get('error')) 
    <div class="alert alert-error">
        <p>{{ $message }}</p>
    </div>
 @endif
 
 <table class="table table-bordered">
 <tr>
    <th>Nim</th>
    <th>Nama</th>
    <th>Foto</th>
    <th>Kelas</th>
    <th>Jurusan</th>
    <!-- <th>Email</th>
    <th>Alamat</th>
    <th>Tanggal Lahir</th> -->
    <th width="280px">Action</th>
 </tr>
 @foreach ($paginate as $mhs) 
 <tr>
 
    <td>{{ $mhs ->nim }}</td>
    <td>{{ $mhs ->nama }}</td>
    <td><img width="100px" height="100px" src="{{ asset('storage/' . $Mahasiswa->foto) }}"></td>
    <td>{{ $mhs ->kelas->nama_kelas }}</td>
    <td>{{ $mhs ->jurusan }}</td>
    <td>
    <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">
 
        <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
        @csrf 
        @method('DELETE') 
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
 </td>
 </tr>
 @endforeach 
 </table>
 <br> 
 Halaman : {{ $paginate->currentPage() }}</br>
 Jumlah Data : {{ $paginate->total() }}</br>
 Data Per Halaman : {{ $paginate->perPage() }}</br>
</br>
{{ $paginate->links() }}
@endsection
