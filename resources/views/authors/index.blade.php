@extends('layouts.layout')

@section('title', 'Authors - Liberty NFT Market')

@section('content')

  <x-hero>
    <h2 class="uppercase font-bold text-[40px] leading-snug sm:text-5xl mb-4">View Our Authors</h2>
    <span class="hero-breadcrumbs text-[15px] space-x-1 mb-10">
      <a href="{{ route('home.index') }}">Home</a>
      <svg class="w-2.5 h-2.5 inline-block fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
      <a href="{{ route('authors.index') }}">Authors</a>
    </span>
    <div class="flex flex-wrap justify-center gap-3 md:gap-5">
      <a href="{{ route('items.index') }}" class="btn flex-grow md:flex-grow-0 text-sm !py-3">Explore Our Items</a>
      @auth
        <a href="{{ route('authors.logout') }}" class="btn !bg-transparent border border-darkPurple flex-grow hover:!bg-darkPurple hover:text-white md:flex-grow-0 text-sm !py-3">Logout</a>
      @else
        <a href="{{ route('authors.create') }}" class="btn !bg-transparent border border-darkPurple flex-grow hover:!bg-darkPurple hover:text-white md:flex-grow-0 text-sm !py-3">Become An Author</a>
      @endauth
      
    </div>
  </x-hero>

  <main>
    <section id="authors" class="bg-darkBlue py-10 pb-16">
      <div class="container author-list">

        @foreach($authors as $author)
          <div class="py-14 border-b border-b-[rgba(255,255,255,0.2)]">
            <x-author :author="$author" />
          </div>
        @endforeach

        <div class="mt-5">
          {{ $authors->links() }}
        </div>

      </div>
    </section>

    @include('partials._create_nft')
  </main>

@endsection