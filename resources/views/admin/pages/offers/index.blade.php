@extends('admin.blank')

{{-- @section('title', 'العروض الترويجية') --}}

@section('content')
    <div class="card shadow-lg">
        <div class="card-header d-flex align-items-center justify-content-between fw-bold">
            <h5 class="m-0 font-weight-bold text-secondary">العروض الترويجية</h5>
            <a href="{{ route('offers.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i>
                {{-- أضف صفقة جديدة --}}
            </a>
        </div>
        <div class="card-body table-responsive-sm">
            <table class="table text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col">صورة</th>
                        <th scope="col">العنوان</th>
                        <th scope="col">القسم</th>
                        <th scope="col">الوصف</th>
                        <th scope="col">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ asset($offer->image) }}" width="100" height="50" alt="">
                            </td>
                            <td class="align-middle">{{ $offer->title }}</td>
                            <td class="align-middle">
                                @if ($offer->category == 1)
                                    الأكثر مبيعاً
                                @elseif ($offer->category == 2)
                                    كوبونات
                                @elseif ($offer->category == 3)
                                    كومبو
                                @endif
                            </td>
                            <td class="align-middle">{{ substr($offer->body, 0, 25) }}...</td>
                            <td class="align-middle">
                                <a href="{{ route('offers.show', $offer->id) }}" class="btn btn-sm btn-info mb-1">
                                    <i class="bi bi-eye-fill"></i>
                                    {{-- مشاهدة --}}
                                </a>
                                <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-sm btn-success mb-1">
                                    <i class="bi bi-pencil-square"></i>
                                    {{-- تعديل --}}
                                </a>
                                <button class="btn btn-sm btn-danger delete-btn mb-1" data-bs-toggle="modal"
                                    data-bs-target="#deleteDeal" data-action="{{ route('offers.destroy', $offer->id) }}"
                                    onclick="setAction(this.dataset.action)"
                                    data-action="{{ route('offers.destroy', $offer->id) }}">
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
