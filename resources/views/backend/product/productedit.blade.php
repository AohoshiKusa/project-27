@extends('layouts.master_backend')
@section('contant')

<div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">
                              <div class="card mb-9">
                                <h5 class="card-header">Edit Product</h5>
                                <div class="card-body">
                                  <form action="{{ url('admin/product/update/'.$pro->product_id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                      <div>
                                        <label for="defaultFormControlInput" class="form-label">Name</label>
                                        <input
                                          type="text"
                                          name="name"
                                          value="{{ $pro->name }}"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          placeholder="กรุณากรอกชื่อสินค้า"
                                          aria-describedby="defaultFormControlHelp"
                                        />


                                        <label for="defaultFormControlInput" class="form-label">Price</label>
                                        <input
                                          type="text"
                                          name="price"
                                          value="{{ $pro->price }}"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          placeholder="กรุณากรอกราคาสินค้า"
                                          aria-describedby="defaultFormControlHelp"
                                        />

                                        <label for="defaultFormControlInput" class="form-label">Description</label>
                                        <input
                                          type="text"
                                          name="description"
                                          value="{{ $pro->description }}"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          placeholder="กรุณากรอกรายละเอียดสินค้า"
                                          aria-describedby="defaultFormControlHelp"
                                        />

                                        <label for="exampleFormControlSelect1" class="form-label">Category</label>
                                        <select name="category_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                          <option selected>{{ $pro->category_id}}</option>
                                          <option value="1">โทรศัพท์มือถือ</option>
                                          <option value="2">โน๊ตบุ๊ค</option>
                                          <option value="3">คอมพิวเตอร์ตั้งโต๊ะ</option>
                                        </select>


                                        <label for="defaultFormControlInput" class="form-label">Images</label>
                                          <div class="input-group">
                                            <input type="file" value="{{ $pro->image }}" name="image" class="form-control" id="inputGroupFile02" />
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                      </div>
                                      <div class="mt-4">
                                        <img src="{{ asset('backend/product/resize/'.$pro->image) }}" alt="">
                                      </div>

                                        <input type="submit" value="อัพเดต" class="btn btn-primary mt-3"></a>
                                        <a href="{{ route('u.product') }}" class="btn btn-danger mt-3 mx-2">ย้อนกลับ</a>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

@endsection
