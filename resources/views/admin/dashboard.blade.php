@extends('layouts.app')

@section('content')
    <div class="container p-4 mt-4">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        My Camps
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Register Data</th>
                                    <th>Paid Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkouts as $checkout)
                                    <tr>
                                        <td>{{ $checkout->User->name }}</td>
                                        <td>{{ $checkout->Camp->title }}</td>
                                        <td>
                                            <strong>
                                                Rp.{{ number_format($checkout->total) }}
                                                @if ($checkout->discount_id)
                                                    <span class="badge bg-success">Disc
                                                        {{ $checkout->discount_percentage }}%</span>
                                                @endif
                                            </strong>
                                        </td>
                                        <td>{{ $checkout->created_at->format('M d Y') }}</td>
                                        <td>
                                            <strong>{{ $checkout->payment_status }}</strong>
                                        </td>
                                        {{-- <td>
                                            @if (!$checkout->is_paid)
                                                <form action="{{ route('admin.checkout.update', $checkout->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm">
                                                        Set to Paid
                                                    </button>
                                                </form>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Camps Registered</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
