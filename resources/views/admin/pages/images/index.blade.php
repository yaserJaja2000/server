@extends('admin.blank')

@section('content')
    <div class="card ">
        {{-- Card Header --}}
        <div class="card-header d-flex align-items-center justify-content-between fw-bold">
            <h5 class="m-0 font-weight-bold text-secondary">صور القسم</h5>
            <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i>
            </button>
        </div>
        {{-- Card Body --}}
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">الصورة</th>
                            <th scope="col">القسم</th>
                            <th scope="col">الرابط</th>
                            <th scope="col">التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset($image->image) }}" width="100" height="60px">
                                </td>
                                <td class="align-middle">{{ $image->section->name }}</td>
                                <td class="align-middle">{{ substr($image->link, 0, 80) }}...</td>
                                <td class="align-middle">
                                    <a href="{{ route('images.edit', $image->id) }}" class="btn btn-sm btn-success mb-1">
                                        <i class="bi bi-pencil-square"></i>
                                        {{-- تعديل --}}
                                    </a>
                                    <button class="btn btn-sm btn-danger delete-btn mb-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteDeal"
                                        data-action="{{ route('images.destroy', $image->id) }}"
                                        onclick="setAction(this.dataset.action)"
                                        data-action="{{ route('images.destroy', $image->id) }}">
                                        <i class="bi bi-trash3-fill"></i>
                                        {{-- حذف --}}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Delete -->
        <div class="modal fade" id="deleteDeal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-end">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">هل أنت متأكد عملية الحذف</h1>
                    </div>
                    <div class="modal-footer">
                        <form action="" id="actionForm" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</a>
                        </form>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">أغلق</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Create -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content text-end">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> إضافة صورة جديدة</h1>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formFile" class="form-label">الصورة</label>
                                <span class="text-danger">*</span>
                                <input class="form-control" name="image" type="file" id="formFile" required>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">القسم</label>
                                <span class="text-danger">*</span>
                                <select class="form-select" name="section_id" aria-label="Default select example" required>
                                    <option value="">اختر  القسم</option>
                                    @foreach ($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">الرابط</label>
                                <input type="text" name="link" class="form-control" id="recipient-name">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">إنشاء</button>
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('deleteModal')
        <script>
            const setAction = (action) => {
                let form = document.getElementById("actionForm")
                form.removeAttribute("action")
                form.setAttribute("action", action)
            };
        </script>
    @endpush
