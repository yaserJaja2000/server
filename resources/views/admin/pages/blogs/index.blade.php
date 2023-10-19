@extends('admin.blank')

@section('content')
    <div class="card ">
        {{-- Card Header --}}
        <div class="card-header d-flex align-items-center justify-content-between fw-bold">
            <h5 class="m-0 font-weight-bold text-secondary">المدونة الإلكترونية</h5>
            <button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i>
            </button>
        </div>
        {{-- Card Body --}}
        <div class="card-body">
            {{-- Nav Pills --}}
            <ul class="nav nav-pills mb-2 d-flex flex-wrap justify-content-center" id="myTab" role="tablist">
                <li class="nav-item mx-0 p-0" role="presentation">
                    <button class="nav-link mb-1 btn-sm border mx-1 fw-bold px-2 active" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                        aria-selected="true">المقالات</button>
                </li>
                <li class="nav-item mx-0 p-0" role="presentation">
                    <button class="nav-link mb-1 btn-sm border mx-1 fw-bold px-2" id="trip-tab" data-bs-toggle="tab"
                        data-bs-target="#trip-tab-pane" type="button" role="tab" aria-controls="trip-tab-pane"
                        aria-selected="false">رحلات يحيى</button>
                </li>
                <li class="nav-item mx-0 p-0" role="presentation">
                    <button class="nav-link mb-1 btn-sm border mx-1 fw-bold px-2" id="shirt-tab" data-bs-toggle="tab"
                        data-bs-target="#shirt-tab-pane" type="button" role="tab" aria-controls="shirt-tab-pane"
                        aria-selected="false">تيشيرت السفر</button>
                </li>
                <li class="nav-item mx-0 p-0" role="presentation">
                    <button class="nav-link mb-1 btn-sm fw-bold px-2 border mx-1" id="discovery-tab" data-bs-toggle="tab"
                        data-bs-target="#discovery-tab-pane" type="button" role="tab"
                        aria-controls="discovery-tab-pane" aria-selected="false">اكتشاف الأصدقاء</button>
                </li>
                <li class="nav-item mx-0 p-0" role="presentation">
                    <button class="nav-link mb-1 btn-sm fw-bold border mx-1 px-2" id="archives-tab" data-bs-toggle="tab"
                        data-bs-target="#archives-tab-pane" type="button" role="tab" aria-controls="archives-tab-pane"
                        aria-selected="false">أرشيف الصور</button>
                </li>
            </ul>
            {{-- Nav Content --}}
            <div class="tab-content" id="myTabContent">
                {{-- المقالات --}}
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="table-responsive-sm">
                        <table class="table text-center align-middle">
                            <thead>
                                <tr>

                                    <th scope="col">العنوان</th>
                                    <th scope="col">صورة</th>
                                    <th scope="col">الدولة</th>
                                    <th scope="col">محتوى المقال</th>
                                    <th scope="col">التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td class="align-middle">{{ $article->title }}</td>
                                        <td class="align-middle">
                                            <img src="{{ asset($article->image) }}" width="100" height="60px">
                                        </td>
                                        <td class="align-middle">{{ $article->country->name }}</td>
                                        <td class="align-middle">{{ substr($article->body, 0, 25) }}...</td>
                                        <td class="align-middle">
                                            <a href="{{ route('blogs.show', $article->id) }}"
                                                class="btn btn-sm btn-info mb-1">
                                                <i class="bi bi-eye-fill"></i>
                                                {{-- مشاهدة --}}
                                            </a>
                                            <a href="{{ route('blogs.edit', $article->id) }}"
                                                class="btn btn-sm btn-success mb-1">
                                                <i class="bi bi-pencil-square"></i>
                                                {{-- تعديل --}}
                                            </a>
                                            <button class="btn btn-sm btn-danger delete-btn mb-1" data-bs-toggle="modal"
                                                data-bs-target="#deleteDeal"
                                                data-action="{{ route('blogs.destroy', $article->id) }}"
                                                onclick="setAction(this.dataset.action)"
                                                data-action="{{ route('blogs.destroy', $article->id) }}">
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
                {{-- رحلات يحيى --}}
                <div class="tab-pane fade show" id="trip-tab-pane" role="tabpanel" aria-labelledby="trip-tab"
                    tabindex="0">
                    <div class="table-responsive-sm">
                        <table class="table text-center align-middle">
                            <thead>
                                <tr>

                                    <th scope="col">العنوان</th>
                                    <th scope="col">الوصف</th>
                                    <th scope="col">صورة</th>
                                    <th scope="col">التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trips as $trip)
                                    <tr>
                                        <td class="align-middle">{{ $trip->title }}</td>
                                        <td class="align-middle">{{ substr($trip->body, 0, 25) }}...</td>
                                        <td class="align-middle">
                                            <img src="{{ asset($trip->image) }}" width="100" height="60px">
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('blogs.edit', $trip->id) }}"
                                                class="btn btn-sm btn-success mb-1">
                                                <i class="bi bi-pencil-square"></i>
                                                {{-- تعديل --}}
                                            </a>
                                            <button class="btn btn-sm btn-danger delete-btn mb-1" data-bs-toggle="modal"
                                                data-bs-target="#deleteDeal"
                                                data-action="{{ route('blogs.destroy', $trip->id) }}"
                                                onclick="setAction(this.dataset.action)"
                                                data-action="{{ route('blogs.destroy', $trip->id) }}">
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
                {{--  تيشيرت السفر --}}
                <div class="tab-pane fade show" id="shirt-tab-pane" role="tabpanel" aria-labelledby="shirt-tab"
                    tabindex="0">
                    <div class="table-responsive-sm">
                        <table class="table text-center align-middle">
                            <thead>
                                <tr>

                                    <th scope="col">صورة</th>
                                    <th scope="col">الدولة</th>
                                    <th scope="col">التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shirts as $shirt)
                                    <tr>
                                        <td class="align-middle">
                                            <img src="{{ asset($shirt->image) }}" width="100" height="60px">
                                        </td>
                                        <td class="align-middle">{{ $shirt->country->name }}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('blogs.edit', $shirt->id) }}"
                                                class="btn btn-sm btn-success mb-1">
                                                <i class="bi bi-pencil-square"></i>
                                                {{-- تعديل --}}
                                            </a>
                                            <button class="btn btn-sm btn-danger delete-btn mb-1" data-bs-toggle="modal"
                                                data-bs-target="#deleteDeal"
                                                data-action="{{ route('blogs.destroy', $shirt->id) }}"
                                                onclick="setAction(this.dataset.action)"
                                                data-action="{{ route('blogs.destroy', $shirt->id) }}">
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
                {{-- اكتشاف الأصدقاء --}}
                <div class="tab-pane fade show" id="discovery-tab-pane" role="tabpanel" aria-labelledby="discovery-tab"
                    tabindex="0">
                    <div class="table-responsive-sm">
                        <table class="table text-center align-middle">
                            <thead>
                                <tr>

                                    <th scope="col">صورة</th>
                                    <th scope="col">رابط</th>
                                    <th scope="col">التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($discoveries as $discovery)
                                    <tr>
                                        <td class="align-middle">
                                            <img src="{{ asset($discovery->image) }}" width="100" height="60px">
                                        </td>
                                        <td class="align-middle">{{ substr($discovery->url, 0, 50) }}...</td>
                                        <td class="align-middle">
                                            <a href="{{ route('blogs.edit', $discovery->id) }}"
                                                class="btn btn-sm btn-success mb-1">
                                                <i class="bi bi-pencil-square"></i>
                                                {{-- تعديل --}}
                                            </a>
                                            <button class="btn btn-sm btn-danger delete-btn mb-1" data-bs-toggle="modal"
                                                data-bs-target="#deleteDeal"
                                                data-action="{{ route('blogs.destroy', $discovery->id) }}"
                                                onclick="setAction(this.dataset.action)"
                                                data-action="{{ route('blogs.destroy', $discovery->id) }}">
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
                {{-- أرشيف الصور --}}
                <div class="tab-pane fade show" id="archives-tab-pane" role="tabpanel" aria-labelledby="archives-tab"
                    tabindex="0">
                    <div class="table-responsive-sm">
                        <table class="table text-center align-middle">
                            <thead>
                                <tr>

                                    <th scope="col">صورة</th>
                                    <th scope="col">التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archives as $archive)
                                    <tr>
                                        <td class="align-middle">
                                            <img src="{{ asset($archive->image) }}" width="100" height="60px">
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('blogs.edit', $archive->id) }}"
                                                class="btn btn-sm btn-success mb-1">
                                                <i class="bi bi-pencil-square"></i>
                                                {{-- تعديل --}}
                                            </a>
                                            <button class="btn btn-sm btn-danger delete-btn mb-1" data-bs-toggle="modal"
                                                data-bs-target="#deleteDeal"
                                                data-action="{{ route('blogs.destroy', $archive->id) }}"
                                                onclick="setAction(this.dataset.action)"
                                                data-action="{{ route('blogs.destroy', $archive->id) }}">
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
            </div>
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
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة عنصر جديد</h1>
                </div>
                <div class="modal-body mx-0 px-0" style="background: #eeeeee79">
                    {{-- Nav Pills --}}
                    <ul class="nav nav-pills d-flex flex-wrap justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item btn-sm mb-1 mx-0 p-0" role="presentation">
                            <button class="nav-link border mx-1 fw-bold px-2 active" id="home1-tab" data-bs-toggle="tab"
                                data-bs-target="#home1-tab-pane" type="button" role="tab"
                                aria-controls="home1-tab-pane" aria-selected="true">المقالات</button>
                        </li>
                        <li class="nav-item btn-sm mb-1 mx-0 p-0" role="presentation">
                            <button class="nav-link border mx-1 fw-bold px-2" id="trip1-tab" data-bs-toggle="tab"
                                data-bs-target="#trip1-tab-pane" type="button" role="tab"
                                aria-controls="trip1-tab-pane" aria-selected="false">رحلات يحيى</button>
                        </li>
                        <li class="nav-item btn-sm mb-1 mx-0 p-0" role="presentation">
                            <button class="nav-link border mx-1 fw-bold px-2" id="shirt1-tab" data-bs-toggle="tab"
                                data-bs-target="#shirt1-tab-pane" type="button" role="tab"
                                aria-controls="shirt1-tab-pane" aria-selected="false">تيشيرت السفر</button>
                        </li>
                        <li class="nav-item btn-sm mb-1 mx-0 p-0" role="presentation">
                            <button class="nav-link fw-bold px-2 border mx-1" id="discovery1-tab" data-bs-toggle="tab"
                                data-bs-target="#discovery1-tab-pane" type="button" role="tab"
                                aria-controls="discovery1-tab-pane" aria-selected="false">اكتشاف الأصدقاء</button>
                        </li>
                        <li class="nav-item btn-sm mb-1 mx-0 p-0" role="presentation">
                            <button class="nav-link fw-bold border mx-1 px-2" id="archives1-tab" data-bs-toggle="tab"
                                data-bs-target="#archives1-tab-pane" type="button" role="tab"
                                aria-controls="archives1-tab-pane" aria-selected="false">أرشيف الصور</button>
                        </li>
                    </ul>
                    <hr class="hr">
                    {{-- Nav Content --}}
                    <div class="tab-content" id="myTabContent">
                        {{-- المقالات --}}
                        <div class="tab-pane fade show active" id="home1-tab-pane" role="tabpanel"
                            aria-labelledby="home1-tab" tabindex="0">
                            <div class="container-sm text-end mt-1">
                                <form method="POST" action="{{ route('blogs.store') }}" class="py-0 rounded-3"
                                     enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="category" value="1" />
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label text-primary ">العنوان</label>
                                                <span class="text-danger">*</span>
                                                <input type="text" name="title" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label text-primary ">المقال</label>
                                                    <span class="text-danger">*</span>
                                                <textarea required class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label text-primary">دولة</label>
                                                <span class="text-danger">*</span>
                                                <select required name="country_id" class="form-select "
                                                    aria-label="Default select example">
                                                    <option value="">اختر دولة</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label text-primary">الصورة</label>
                                                <span class="text-danger">*</span>
                                                <input class="form-control" name="image" type="file"
                                                    id="formFile" required>
                                            </div>
                                        </div>
                                        <div class="col-10 mt-1">
                                            <button type="submit" class="btn btn-sm btn-primary">أنشأ</button>
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{--  تيشيرت السفر --}}
                        <div class="tab-pane fade show" id="shirt1-tab-pane" role="tabpanel" aria-labelledby="shirt-tab"
                            tabindex="0">
                            <div class="container-sm text-end mt-1">
                                <form method="POST" action="{{ route('blogs.store') }}" class="py-0 rounded-3"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="category" value="3" />
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label text-primary">دولة</label>
                                                <span class="text-danger">*</span>
                                                <select required name="country_id" class="form-select "
                                                    aria-label="Default select example">
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label text-primary">الصورة</label>
                                                <span class="text-danger">*</span>
                                                <input class="form-control" name="image" type="file"
                                                    id="formFile" required>
                                            </div>
                                        </div>
                                        <div class="col-10 mt-1">
                                            <button type="submit" class="btn btn-sm btn-primary">أنشأ</button>
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- رحلات يحيى --}}
                        <div class="tab-pane fade show" id="trip1-tab-pane" role="tabpanel" aria-labelledby="trip1-tab"
                            tabindex="0">
                            <div class="container-sm text-end mt-1">
                                <form action="{{ route('blogs.store') }}" method="POST" class="py-0 rounded-3"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="category" value="2" />
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label text-primary ">العنوان</label>
                                                    <span class="text-danger">*</span>
                                                <input type="text" name="title" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label text-primary ">الوصف</label>
                                                    <span class="text-danger">*</span>
                                                <textarea required class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label text-primary">الصورة</label>
                                                <span class="text-danger">*</span>
                                                <input required class="form-control" name="image" type="file"
                                                    id="formFile">
                                            </div>
                                        </div>
                                        <div class="col-10 mt-1">
                                            <button type="submit" class="btn btn-sm btn-primary">أنشأ</button>
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- اكتشاف الأصدقاء --}}
                        <div class="tab-pane fade show" id="discovery1-tab-pane" role="tabpanel"
                            aria-labelledby="discovery1-tab" tabindex="0">
                            <div class="container-sm text-end mt-1">
                                <form action="{{ route('blogs.store') }}" method="POST" class="py-0 rounded-3"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="category" value="4" />
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label text-primary ">رابط</label>

                                                <input type="text" class="form-control" name="url"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label text-primary">الصورة</label>
                                                <span class="text-danger">*</span>
                                                <input required class="form-control" name="image" type="file"
                                                    id="formFile">
                                            </div>
                                        </div>
                                        <div class="col-10 mt-1">
                                            <button type="submit" class="btn btn-sm btn-primary">أنشأ</button>
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- أرشيف الصور --}}
                        <div class="tab-pane fade show" id="archives1-tab-pane" role="tabpanel"
                            aria-labelledby="archives1-tab" tabindex="0">
                            <div class="container-sm text-end mt-1">
                                <form action="{{ route('blogs.store') }}" method="POST" class="py-0 rounded-3"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="category" value="5" />
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label text-primary">الصورة</label>
                                                <span class="text-danger">*</span>
                                                <input class="form-control" name="image" type="file"
                                                    id="formFile" required>
                                            </div>
                                        </div>
                                        <div class="col-10 mt-1">
                                            <button type="submit" class="btn btn-sm btn-primary">أنشأ</button>
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
