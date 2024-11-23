@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-10 col-sm-8 col-lg-5">
            <div class="form-registration">
                <h1 class="mb-5 fw-bold text-center">Registration Form</h1>
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="form-floating">
                        <input type="text" name="name"
                            class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
                            placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="Username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="Email" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" placeholder="Password_confirmation" required>
                        <label for="password_confirmation">Password Confirmation</label>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                            id="dob" placeholder="dob" required value="{{ old('dob') }}">
                        <label for="dob">Birth Date</label>
                        @error('dob')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <select id="gender" class="form-select rounded-0 @error('gender') is-invalid @enderror" name="gender"
                            required>
                            <option value="">Select a Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>
                        </select>
                        <label for="gender">Gender</label>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" name="address"
                            class="form-control @error('address') is-invalid @enderror" id="address"
                            placeholder="Address" required value="{{ old('address') }}">
                        <label for="address">Address</label>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" name="phoneNumber"
                            class="form-control rounded-bottom @error('phoneNumber') is-invalid @enderror" id="phoneNumber"
                            placeholder="Phone Number" required value="{{ old('phoneNumber') }}">
                        <label for="phoneNumber">Phone Number</label>
                        @error('phoneNumber')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-4">
                    Already have an account?
                    <a href="{{ route('login') }}">
                        Login here!
                    </a>
                </small>
            </div>
        </div>
    </div>
@endsection
