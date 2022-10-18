@extends('layouts.layout')

@section('title', 'Login - Liberty NFT Market')

@section('content')
  <main>
    <section id="author-login" class="bg-darkBlue py-24 pt-[180px] sm:pt-[200px] lg:pt-[220px] min-h-[calc(100vh-70px)] flex items-center">
      <div class="container">
        <div class="space-y-10">
          <div class="section-header">
            <h2>Login To <span>Your Account</span></h2>
          </div>

          <form action="{{ route('authors.authenticate') }}" method="POST" class="mx-auto max-w-[500px]">
            @csrf

            <x-form-wrapper class="pb-14 px-2 sm:px-4">
              <x-form-group>
                <label for="email">Email</label>
                <input 
                  type="email" name="email" placeholder="Your email"
                  @if(Cookie::has('useremail'))
                    value="{{ Cookie::get('useremail') }}"
                  @else
                    value="{{ old('email') }}"
                  @endif
                >

                @error('email')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <x-form-group>
                <label for="password">Password</label>
                <input 
                  type="password" name="password" placeholder="Your password"
                  @if(Cookie::has('userpassword'))
                    value="{{ Cookie::get('userpassword') }}"
                  @else
                    value="{{ old('password') }}"
                  @endif
                >

                @error('password')
                  <x-form-error>{{ $message }}</x-form-error>
                @enderror
              </x-form-group>

              <div class="px-4 flex flex-wrap justify-between w-full pb-6 text-sm">
                <div class="px-1 flex items-center">
                  <input type="checkbox" name="remember_me" id="remember_me" class="w-4 h-4" 
                    @if(Cookie::has('useremail'))
                      checked
                    @endif
                  >
                  <label for="remember_me" class="mx-1">Remember Me</label>
                </div>

                <a href="{{ route('authors.forgot') }}" class="text-sm text-darkPurple underline underline-offset-2 hidden sm:block">Forgot password?</a>
              </div>

              <x-form-group class="text-center space-y-0">
                <button type="submit" class="btn w-full text-sm">Login</button>
              </x-form-group>

              
              <div class="w-full px-4 text-center">
                <p class="text-[#afafaf] text-sm">
                  Not an author?
                  <a href="{{ route('authors.create') }}" class="text-darkPurple underline underline-offset-2">Register Now</a>
                </p>

                <a href="{{ route('authors.reset') }}" class="text-sm text-darkPurple underline underline-offset-2 pt-5 block sm:hidden">Forgot password?</a>
              </div>
            </x-form-wrapper>
          </form>
        </div>
      </div>
    </section>
  </main>

@endsection