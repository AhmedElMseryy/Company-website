@extends('admin.master')

@section('title', __('keywords.services'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.services') }}</h2>

                    <div class="page-title-right">
                        <!-- Add New -->
                        <x-action-button href="{{ route('admin.services.create') }}" type="create"></x-action-button>
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
                                    <th width="15%">{{ __('keywords.icon') }}</th>
                                    <th width="15%">{{ __('keywords.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($services) > 0)
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <td>{{ $services->firstItem() + $loop->index }}</td>
                                            <td>{{ $service->title }}</td>
                                            <td>{{ $service->icon }}</td>

                                            <td>
                                                <!-- Edit Button -->
                                                <x-action-button
                                                    href="{{ route('admin.services.edit', ['service' => $service]) }}"
                                                    type="edit"></x-action-button>

                                                <!-- Show Button -->
                                                <x-action-button
                                                    href="{{ route('admin.services.show', ['service' => $service]) }}"
                                                    type="show"></x-action-button>

                                                <!-- Delete Button -->
                                                <x-delete-button
                                                    href="{{ route('admin.services.destroy', ['service' => $service]) }}"
                                                    id="{{ $service->id }}"></x-delete-button>
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
                        {{ $services->render('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
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
