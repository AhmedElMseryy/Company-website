@extends('admin.master')

@section('title', __('keywords.members'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.members') }}</h2>

                    <div class="page-title-right">
                        <!-- Add New -->
                        <x-action-button href="{{ route('admin.members.create') }}" type="create"></x-action-button>
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
                                    <th>{{ __('keywords.name') }}</th>
                                    <th>{{ __('keywords.position') }}</th>
                                    <th>{{ __('keywords.image') }}</th>
                                    <th>{{ __('keywords.facebook') }}</th>
                                    <th>{{ __('keywords.twitter') }}</th>
                                    <th>{{ __('keywords.linkedin') }}</th>
                                    <th width="15%">{{ __('keywords.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($members) > 0)
                                    @foreach ($members as $key => $member)
                                        <tr>
                                            <td>{{ $members->firstItem() + $loop->index }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->position }}</td>
                                            <td>
                                                <img src="{{ asset("storage/members/$member->image") }}" alt="#"
                                                    width="50px">
                                            </td>
                                            <td>{{ $member->facebook }}</td>
                                            <td>{{ $member->twitter }}</td>
                                            <td>{{ $member->linkedin }}</td>

                                            <td>
                                                <!-- Edit Button -->
                                                <x-action-button
                                                    href="{{ route('admin.members.edit', ['member' => $member]) }}"
                                                    type="edit"></x-action-button>

                                                <!-- Show Button -->
                                                <x-action-button
                                                    href="{{ route('admin.members.show', ['member' => $member]) }}"
                                                    type="show"></x-action-button>

                                                <!-- Delete Button -->
                                                <x-delete-button
                                                    href="{{ route('admin.members.destroy', ['member' => $member]) }}"
                                                    id="{{ $member->id }}"></x-delete-button>
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
                        {{ $members->render('pagination::bootstrap-4') }}
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
