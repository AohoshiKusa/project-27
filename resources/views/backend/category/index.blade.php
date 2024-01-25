@extends('layouts.master_backend')
@section('contant')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Category</h5>
        <div class="table-responsive text-nowrap">
            <a href="{{ route('u.createform') }}" class="btn btn-success mx-3"><i class='bx bxs-plus-circle'></i> เพิ่มข้อมูล</a>
          <table class="table mt-4">
            <thead class="table-dark">
              <tr>
                <th>category_id</th>
                <th>name</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($category as $Category)
              <tr>
              <td>{{ $category->firstItem() + $loop->index  }}</td>
              <td>{{ $Category->name }}</td>
              <td>{{ $Category->created_at }}</td>
              <td>{{ $Category->updated_at }}</td>
              <td>
                <a href="{{ url('admin/category/edit/'.$Category->category_id) }}"><i class='bx bxs-edit'></i></a>
                <a href="{{ url('admin/category/delete/'.$Category->category_id) }}"><i class='bx bxs-edit'></i></a>
              </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div class="mt-3 comtainer">
            {{ $category->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>

@endsection
