@extends('layout.template')

@include('components.navbar')
@section('content')

<div class="my-3 p-3 px-5 bg-body rounded shadow-sm">
    <div class="pb-3">
    <a href='{{url('buku/create')}}' class="btn btn-success rounded-2">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Judul Buku</th>
                <th class="col-md-4">Nama Penulis</th>
                <th class="col-md-2">Jumlah Buku</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $id = $data->firstItem() ?>
        @foreach ($data as $item)
            <tr>
                <td>{{$id}}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->penulis}}</td>
                <td>{{$item->jumlah}}</td>
                <td>
                    <a href='{{url('buku/' . $item->judul . '/edit')}}' class="btn btn-warning btn-sm rounded-2">Edit</a>
                    <form action="{{url('buku/' . $item->judul)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm rounded-2">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php $id++ ?>
        @endforeach
        </tbody>
    </table>
    {{$data->links()}}
</div>
@endsection
