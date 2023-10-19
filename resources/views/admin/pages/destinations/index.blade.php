@extends('admin.blank')

{{-- @section('title', 'اكتشف وجهاتنا') --}}

@section('content')
    <div class="card shadow-lg">
        <div class="card-header d-flex align-items-center justify-content-between fw-bold">
            <h5 class="m-0 font-weight-bold text-secondary">اكتشف وجهاتنا</h5>
            <a href="{{ route('destinations.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i>
                {{-- أضف صفقة جديدة --}}
            </a>
        </div>
        <div class="card-body table-responsive-sm">
            <table class="table text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الدولة</th>
                        <th scope="col">المدينة</th>
                        <th scope="col">صورة العلم</th>
                        <th scope="col">الرابط</th>
                        <th scope="col">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($destinations as $destination)
                        <tr>
                            <th class="align-middle" scope="row">{{ $destination->id }}</th>
                            <td class="align-middle">{{ $destination->country }}</td>
                            <td class="align-middle">{{ $destination->city }}</td>
                            <td class="align-middle">
                                <img src="{{ asset($destination->image) }}" width="100" alt="">
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('destinations.show', $destination->id) }}"
                                    class="btn btn-sm btn-info mb-1">
                                    <i class="bi bi-eye-fill"></i>
                                    {{-- مشاهدة --}}
                                </a>
                                <a href="{{ route('destinations.edit', $destination->id) }}"
                                    class="btn btn-sm btn-success mb-1">
                                    <i class="bi bi-pencil-square"></i>
                                    {{-- تعديل --}}
                                </a>
                                <button class="btn btn-sm btn-danger delete-btn mb-1" data-bs-toggle="modal"
                                    data-bs-target="#deleteDeal"
                                    data-action="{{ route('destinations.destroy', $destination->id) }}"
                                    onclick="setAction(this.dataset.action)"
                                    data-action="{{ route('destinations.destroy', $destination->id) }}">
                                    <i class="bi bi-trash3-fill"></i>
                                    {{-- حذف --}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal -->
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
