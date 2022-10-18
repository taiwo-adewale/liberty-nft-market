@extends('layouts.layout')

@section('title', 'Explore - Liberty NFT Market')

@push('swiper_js')
  <script src="{{ asset('vendor/swiper/swiper.js') }}"></script>
@endpush

@push('swiper_css')
  <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper.css') }}">
@endpush

@section('content')

  <section id="hero" class="pt-40 pb-20 bg-[#513fb9] md:pt-48 md:pb-28 lg:pt-52">
    <div class="container">
      <div class="flex flex-col text-center justify-center">
        <h3 class="text-xl mb-2">Liberty NFT Market</h3>
        <h2 class="uppercase font-bold text-[40px] leading-snug sm:text-5xl mb-4">Discover Some Top Items</h2>
        <span class="hero-breadcrumbs text-[15px] space-x-1 mb-10">
          <a href="{{ route('home.index') }}">Home</a>
          <svg class="w-2.5 h-2.5 inline-block fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
          <a href="{{ route('items.index') }}">Items</a>
        </span>
      </div>

      <div id="explore-slider" class=" relative mt-10 -mb-[350px] md:-mb-[300px]">
        <div class="swiper explore-slider">
          <div class="swiper-wrapper">

            @foreach($items as $item)
            <div class="swiper-slide flex justify-center group">
              <div class="flex justify-center relative overflow-hidden w-full">
                <img src='{{ asset("storage/$item->image") }}' alt="" class="rounded-3xl w-full">

                <div class="bg-[rgba(40,43,47,0.8)] border border-borderColor p-6 absolute right-6 bottom-6 space-y-6 rounded-3xl translate-x-[300px] group-hover:translate-x-0 transition-all duration-300">
                  <h3 class="text-xl font-bold">{{ $item->name }}</h3>
                  <div class="flex space-x-4">
                    <img src='{{ asset("storage/$item->author_thumbnail") }}' alt="" class="rounded-full w-[50px] h-[50px]">
                    <div class="flex flex-col gap-y-1">
                      <span class="text-[15px]">{{ $item->author_name }}</span>
                      <a href="{{ route('authors.show', $item->author_slug) }}" class="text-[15px] text-darkPurple font-bold break-all">{{ $item->author_username }}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>
  
        <div class="swiper-button-prev absolute top-1/2 left-[24px] sm:left-[10%] md:left-[24px] opacity-60 hover:opacity-100 hover:!bg-white hover:!text-darkPurple"></div>
        <div class="swiper-button-next absolute top-1/2 right-[24px] sm:right-[10%] md:right-[24px] opacity-60 hover:opacity-100 hover:!bg-white hover:!text-darkPurple"></div>
      </div>
    </div>
  </section>

  <main>
    <section id="explore-items" class="bg-darkBlue py-24 pt-[380px] sm:pt-96 md:pt-72">
      <div class="container">
        <div class="space-y-14">
          <div class="flex flex-wrap gap-y-8 gap-x-8 justify-center lg:justify-between lg:flex-nowrap lg:items-center">
            <div class="section-header">
              <h2>Discover Some Of Our <span>Items</span></h2>
            </div>

            <form action="{{ route('items.index') }}" class="flex-grow">
              @csrf

              <div class="flex flex-wrap justify-center gap-4 w-full md:flex-nowrap lg:w-auto lg:justify-end">
                <input type="text" name="search" placeholder="Type Something" class="rounded-full bg-veryDarkGrey focus:outline-none px-4 py-3 border border-borderColor text-sm flex-grow lg:flex-grow-0 w-full sm:w-40">

                <select name="category" id="" class="bg-transparent border border-borderColor rounded-full px-3 pr-8 text-sm cursor-pointer text-white focus:outline-none focus:ring-2 py-3 flex-grow lg:flex-grow-0 md:w-[250px]">
                  <option value="all" selected>All Categories</option>

                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                  @endforeach
                </select>

                <button type="submit" class="btn text-sm min-w-[100px] !py-3 flex-grow lg:flex-grow-0 w-full sm:w-auto md:w-[250px]">Search</button>
              </div>
            </form>
          </div>

          <x-item-card :items="$filtItems" />
        </div>
      </div>
    </section>

    <section id="top-sellers" class="bg-brightPink py-24">
      <div class="container">
        <div class="space-y-14">
          <div class="section-header">
            <h2>Our Top Sellers This Week.</h2>
          </div>

          <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @foreach($top_sellers as $seller)
            <div class="flex gap-x-4 relative pl-12">
              <div class="absolute left-0 top-0 w-12 text-center">
                <h4 class="text-xl font-bold mt-3">{{ $loop->iteration }}.</h4>
              </div>
              <div>
                <img src='{{ asset("storage/$seller->thumbnail") }}' alt="" class="rounded-full w-[50px] h-[50px]">
              </div>
              <div class="flex flex-col gap-y-1">
                <h3 class="text-xl font-bold">{{ $seller->name }}</h3>
                <span class="text-sm">{{ $seller->sales }}ETH 
                  @php
                    echo '($' . number_format($seller->sales * 1656.15, 2) . ')';
                  @endphp
                </span>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </section>
  </main>

@endsection