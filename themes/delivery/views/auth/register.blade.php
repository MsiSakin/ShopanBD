<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('delivery.register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                             <!-- Phone -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">
                                    {{ __('Phone') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="phone" type="number"
                                    class="form-control w-full @error('phone') border-red-500 @enderror" name="phone"
                                     required min="11">

                                     @error('phone')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                            </div>

                            
                             <!-- Address -->
                             <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">
                                    {{ __('Address') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                    class="form-control w-full @error('address') border-red-500 @enderror" name="address"
                                    required>

                                    @error('address')
                                    <p class="mt-1 text-xs italic text-red-500">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            
                              <!-- Image -->
                             <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">
                                    {{ __('Image') }}
                                </label>

                                <div class="col-md-6">
                                    <input  type="file"
                                    class="form-control w-full @error('image') border-red-500 @enderror" name="image"
                                     required>

                                     @error('image')
                                     <p class="mt-1 text-xs italic text-red-500">
                                         {{ $message }}
                                     </p>
                                    @enderror
                                </div>
                            </div>


                             <!--Document Image -->
                             <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">
                                    {{ __('Document Image') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="docimage" type="file"
                                    class="form-control w-full @error('docimage') border-red-500 @enderror" name="docimage"
                                    required>

                                    @error('docimage')
                                    <p class="mt-1 text-xs italic text-red-500">
                                     {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <!--ID No -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">
                                    {{ __('ID No') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="idno" type="number"
                                    class="form-control w-full @error('idno') border-red-500 @enderror" name="idno"
                                    required>

                                    @error('idno')
                                    <p class="mt-1 text-xs italic text-red-500">
                                    {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                 


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-0 form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
