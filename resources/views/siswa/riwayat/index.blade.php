@extends('siswa.dashboard')

@section('siswa-content')

<div class="container py-5">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body p-4 p-lg-5">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

                <div>

                    <h2 class="fw-bold text-success mb-1">
                        Riwayat Konseling
                    </h2>

                    <p class="text-muted mb-0">
                        Semua hasil konseling yang pernah dilakukan
                    </p>

                </div>

            </div>

            @if(session('success'))

                <div class="alert alert-success rounded-4 border-0">

                    {{ session('success') }}

                </div>

            @endif

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Hasil Minat</th>
                            <th>Tanggal</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    <span class="fw-semibold text-success">

                                        {{ $item->minat }}

                                    </span>

                                </td>

                                <td>

                                    {{ $item->created_at->format('d M Y H:i') }}

                                </td>

                                <td>

                                    <div class="d-flex gap-2 flex-wrap">

                                        <a
                                            href="{{ route('siswa.riwayat.show', $item->id) }}"
                                            class="btn btn-success btn-sm rounded-pill">

                                            <i class="bi bi-eye-fill me-1"></i>
                                            Detail

                                        </a>

                                        <form
                                            action="{{ route('siswa.riwayat.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Hapus riwayat ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm rounded-pill">

                                                <i class="bi bi-trash-fill me-1"></i>
                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center py-5">

                                    <div class="text-muted">

                                        Belum ada riwayat konseling

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4">

                {{ $data->links() }}

            </div>

        </div>

    </div>

</div>

@endsection