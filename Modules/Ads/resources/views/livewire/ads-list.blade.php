<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-10">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">عنوان</th>
            <th class="text-center align-middle text-primary">دسته</th>
            <th class="text-center align-middle text-primary">عکس</th>
            <th class="text-center align-middle text-primary"> وضعیت</th>
            <th class="text-center align-middle text-primary">نمایش در اسلایدر</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ads as $ad)
            <tr>
                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                <td class="text-center align-middle">{{ $ad->title }}</td>
                <td class="text-center align-middle">{{ $ad->category->name }}</td>
                <td class="text-center align-middle"><img src="{{ asset('images/ads/small/'.$ad->image) }}" alt="" width="80" height="80" class="rounded-circle"></td>
                <td class="text-center align-middle">
                    @if($ad->status == 1)
                        <span class="cursor-pointer badge badge-success" wire:click="changeStatus({{ $ad->id }})">فعال</span>
                    @else
                        <span class="cursor-pointer badge badge-danger" wire:click="changeStatus({{ $ad->id }})">غیر فعال</span>
                    @endif
                </td>
                <td class="text-center align-middle">
                    @if($ad->show_in_slider == 1)
                        <span class="cursor-pointer badge badge-success" wire:click="changeShowInSlider({{ $ad->id }})">فعال</span>
                    @else
                        <span class="cursor-pointer badge badge-danger" wire:click="changeShowInSlider({{ $ad->id }})">غیر فعال</span>
                    @endif
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{ route('ads.edit',$ad->id) }}">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">
                    <button class="btn btn-outline-danger"  wire:click="deleteConfirm({{ $ad->id }})">
                        حذف
                    </button>
                </td>
                <td class="text-center align-middle">{{ verta($ad->created_at) }}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;" class="pagination pagination-rounded pagination-sm d-flex justify-content-center">{{ $ads->links() }}</div>
</div>
@section('script')
    <script>
        document.addEventListener('livewire:init', () => {
            console.log("livewireLoad");
            Livewire.on('deleteAd', (message,type) => {
                Swal.fire({
                    title: 'آیا مطمئن هستید؟',
                    text: "این عملیات قابل بازگشت نیست!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله حذف کن',
                    cancelButtonText: 'خیر'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete',{id: message.AdId});
                    }
                })
            })
        })
    </script>
@endsection
