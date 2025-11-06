@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $totalUsers ?? 0 }}</h4>
                        <p class="mb-0">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $totalProducts ?? 0 }}</h4>
                        <p class="mb-0">Total Products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">{{ $totalOrders ?? 0 }}</h4>
                        <p class="mb-0">Total Orders</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-chart-line fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="mb-0">Rp {{ number_format($revenue ?? 0, 0, ',', '.') }}</h4>
                        <p class="mb-0">Revenue</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Welcome to Dashboard</h5>
            </div>
            <div class="card-body">
                <p>Selamat datang di aplikasi dashboard. Anda dapat mengakses berbagai menu melalui sidebar.</p>
                <p>Aplikasi ini berjalan tanpa sistem login.</p>
            </div>
        </div>
    </div>
</div>
@endsection