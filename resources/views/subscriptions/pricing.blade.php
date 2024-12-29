@extends('layouts.main')

@section('css')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, 0.1);
            border: solid rgba(0, 0, 0, 0.15);
            border-width: 1px 0;
            box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
                inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -0.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>

    <link rel="stylesheet" href="{{ secure_asset('css/subscriptions/pricing.css') }}">
@endsection

@section('container')
    <div class="container py-3">
        <header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal text-body-emphasis">Pricing</h1>
                <p class="fs-5 text-body-secondary">
                    Quickly build an effective pricing table for your potential
                    customers with this Bootstrap example. It’s built with default
                    Bootstrap components and utilities with little customization.
                </p>
            </div>
        </header>

        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Free</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">
                                $0<small class="text-body-secondary fw-light">/mo</small>
                            </h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>10 users included</li>
                                <li>2 GB of storage</li>
                                <li>Email support</li>
                                <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-outline-primary">
                                Sign up for free
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Pro</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">
                                $15<small class="text-body-secondary fw-light">/mo</small>
                            </h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>20 users included</li>
                                <li>10 GB of storage</li>
                                <li>Priority email support</li>
                                <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-primary">
                                Get started
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Enterprise</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">
                                $29<small class="text-body-secondary fw-light">/mo</small>
                            </h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>30 users included</li>
                                <li>15 GB of storage</li>
                                <li>Phone and email support</li>
                                <li>Help center access</li>
                            </ul>
                            <button type="button" class="w-100 btn btn-lg btn-primary">
                                Contact us
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="display-6 text-center mb-4">Compare plans</h2>

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th style="width: 34%"></th>
                            <th style="width: 22%">Free</th>
                            <th style="width: 22%">Pro</th>
                            <th style="width: 22%">Enterprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Public</th>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Private</th>
                            <td></td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Permissions</th>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Sharing</th>
                            <td></td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Unlimited members</th>
                            <td></td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Extra security</th>
                            <td></td>
                            <td></td>
                            <td>
                                <svg class="bi" width="24" height="24">
                                    <use xlink:href="#check" />
                                </svg>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

    </div>
@endsection
