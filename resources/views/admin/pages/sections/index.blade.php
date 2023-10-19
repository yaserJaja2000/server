@extends('admin.blank')

@section('content')
    <div class="card ">
        {{-- Card Header --}}
        <div class="card-header d-flex align-items-center justify-content-between fw-bold">
            <h5 class="m-0 font-weight-bold text-secondary">الأقسام الفرعية</h5>
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

                            <th scope="col">صورة القسم</th>
                            <th scope="col">اسم القسم</th>
                            <th scope="col">الدولة</th>
                            <th>العنوان</th>
                            <th>الوصف</th>
                            <th scope="col">التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset($section->image) }}" width="100" height="60px">
                                </td>
                                <td class="align-middle">{{ $section->name }}</td>
                                <td class="align-middle">{{ $section->country->name }}</td>
                                <td class="align-middle {{$section->title ? '':'text-danger fw-bold'}}">{{ $section->title ? $section->title : 'لا يوجد' }}</td>
                                <td class="align-middle {{$section->title ? '':'text-danger fw-bold'}}"">{{ $section->body ? substr($section->body, 0, 25) : 'لا يوجد' }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('sections.show', $section->id) }}" class="btn btn-sm btn-info mb-1">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-sm btn-success mb-1">
                                        <i class="bi bi-pencil-square"></i>
                                        {{-- تعديل --}}
                                    </a>
                                    <button class="btn btn-sm btn-danger delete-btn mb-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteDeal"
                                        data-action="{{ route('sections.destroy', $section->id) }}"
                                        onclick="setAction(this.dataset.action)"
                                        data-action="{{ route('sections.destroy', $section->id) }}">
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة عنصر جديد</h1>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('sections.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">اسم القسم</label>
                                <span class="text-danger">*</span>
                                <input type="text" name="name" class="form-control" id="recipient-name" required>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">الدولة</label>
                                <span class="text-danger">*</span>
                                <select required class="form-select" name="country_id" aria-label="Default select example">
                                    <option value="">اختر الدولة</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">صورة القسم</label>
                                <span class="text-danger">*</span>
                                <input class="form-control" name="image" type="file" id="formFile" required>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">العنوان</label>
                                <input type="text" name="title" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">الوصف</label>
                                <textarea class="form-control" name="body" id="message-text" rows="3"></textarea>
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
