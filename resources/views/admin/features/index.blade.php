@extends('admin.master')

@section('title', __('keywords.features'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.features') }}</h2>

                    <div class="page-title-right">
                        <!-- Add New -->
                        <x-action-button href="{{ route('admin.features.create') }}" type="create"></x-action-button>
                    </div>
                </div>
                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!-- Success Alert Component -->
                        <x-success-alert></x-success-alert>

                        <!-- ****** Start Table ****** -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('keywords.title') }}</th>
                                    <th width="10%">{{ __('keywords.icon') }}</th>
                                    <th width="15%">{{ __('keywords.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($features) > 0)
                                    @foreach ($features as $key => $feature)
                                        <tr>
                                            <td>{{ $features->firstItem() + $loop->index }}</td>
                                            <td>{{ $feature->title }}</td>
                                            <td width="15%">{{ $feature->icon }}</td>

                                            <td>
                                                <!-- Edit Button -->
                                                <x-action-button
                                                    href="{{ route('admin.features.edit', ['feature' => $feature]) }}"
                                                    type="edit"></x-action-button>

                                                <!-- Show Button -->
                                                <x-action-button
                                                    href="{{ route('admin.features.show', ['feature' => $feature]) }}"
                                                    type="show"></x-action-button>

                                                <!-- Delete Button -->
                                                <x-delete-button
                                                    href="{{ route('admin.features.destroy', ['feature' => $feature]) }}"
                                                    id="{{ $feature->id }}"></x-delete-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <!-- Empty Alert Component -->
                                    <x-empty-alert></x-empty-alert>
                                @endif
                            </tbody>
                        </table>
                        <!-- ****** End Table ****** -->
                        {{ $features->render('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want delete this record ?')) {
                document.getElementById('deleteForm-' + id).submit();
            }
        }
    </script>
@endsection
