@extends('layouts.admin')

@section('content')
<main class="container-fluid py-4">
    <div class="card border-0 shadow rounded-4">
        <div class="card-header bg-white py-4 px-4 d-flex justify-content-between align-items-center border-bottom">
            <h2 class="h5 fw-semibold text-primary mb-0">User Management</h2>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus-circle me-1"></i> Create User
            </a>
        </div>

        <div class="card-body px-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 5%;">#</th>
                            <th style="width: 30%;">Name</th>
                            <th style="width: 40%;">Email</th>
                            <th class="text-center" style="width: 25%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $user->id }}">
                                            <i class="fas fa-trash me-1"></i> Delete
                                        </button>
                                    </div>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                            <div class="modal-content border-0 shadow-sm rounded-3">
                                                <div class="modal-header bg-light border-0">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $user->id }}">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <p class="mb-1">Are you sure you want to delete <strong>{{ $user->name }}</strong>?</p>
                                                    <p class="text-danger small mb-0">This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer justify-content-center border-0">
                                                    <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    <p class="mb-2">No users found.</p>
                                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-plus-circle me-1"></i> Create User
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator && $users->total() > $users->perPage())
                <div class="d-flex justify-content-center mt-4">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</main>
@endsection

@push('styles')
<!-- Bootstrap & FontAwesome (jika belum ada di layouts.admin) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>
    .table th {
        font-size: 0.875rem;
        font-weight: 600;
        color: #6c757d;
    }

    .table td {
        font-size: 0.9rem;
        padding: 0.65rem 0.75rem;
    }

    .btn-sm {
        padding: 0.35rem 0.65rem;
        font-size: 0.8rem;
    }

    .gap-2 {
        gap: 0.5rem;
    }    

    .modal-content {
        animation: fadeIn 0.2s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
</style>
@endpush

@push('scripts')
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush
