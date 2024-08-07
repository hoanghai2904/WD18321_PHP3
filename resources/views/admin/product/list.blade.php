{{-- ke thua tu layout index --}}
@extends('admin.layout.index')
{{-- section goi yield ben index --}}
@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if (session('message'))
            <div class="alert alert-warning" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
        <a href="{{ route('admin.product.addProducts') }}" class="btn btn-info">Thêm mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Mô tả sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Ảnh sản phẩm</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                        <td><img src="{{ asset($item->image) }}" width="150px" alt=""></td>
                        <td>
                            <a href="{{route('admin.product.detailProducts', $item->product_id)}}" class="btn btn-info">Chi Tiết</a>
                            <a href="{{route('admin.product.updateProducts', $item->product_id)}}" class="btn btn-warning">Sửa</a>
                            <button class="btn btn-danger" data-id="{{ $item->product_id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Xoá</button>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
    <!-- Modal Delete -->
    {{-- DeleteModal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Xoá</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="formDelete">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        Bạn Có Chắc Muốn Xoá Không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Xoá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('script')
    {{-- modal delete --}}
    <script>
        var deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-id')
            // console.log(button);
            let formDelete = document.getElementById('formDelete')
            formDelete.setAttribute('action', '{{ route('admin.product.deleteProducts') }}?id=' + recipient)
        })
    </script>
@endpush
