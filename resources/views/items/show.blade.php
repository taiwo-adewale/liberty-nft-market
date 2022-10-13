@extends('layouts.layout')

@section('title', $item->name . ' - NFTsGo')

@section('content')

  <x-hero>
    <h2 class="uppercase font-bold text-[40px] leading-snug sm:text-5xl mb-4">View Item Details</h2>
    <span class="hero-breadcrumbs text-[15px] space-x-1 mb-10">
      <a href="{{ route('home.index') }}">Home</a>
      <svg class="w-2.5 h-2.5 inline-block fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
      <a href="{{ route('items.index') }}">Items</a>
      <svg class="w-2.5 h-2.5 inline-block fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
      <a href="{{ route('items.show', $item->slug) }}">{{ $item->name }}</a>
    </span>
    <div class="flex flex-wrap justify-center gap-3 md:gap-5">
      <a href="{{ route('items.index') }}" class="btn flex-grow md:flex-grow-0 text-sm !py-3">Explore Our Items</a>
      <a href="{{ route('items.create') }}" class="btn !bg-transparent border border-darkPurple flex-grow hover:!bg-darkPurple hover:text-white md:flex-grow-0 text-sm !py-3">Create Your NFT</a>
    </div>
  </x-hero>

  <main>
    <section id="item-details" class="bg-darkBlue py-24">
      <div class="container">
        <div class="space-y-14">
          <div class="section-header">
            <h2>View Details <span>For Item</span> Here.</h2>
          </div>
  
          <div class="grid lg:grid-cols-2 gap-x-12 gap-y-8">
            <div>
              <img src='{{ asset("storage/$item->image") }}' alt="" class="rounded-3xl w-full">
            </div>

            <div>
              <h2 class="font-bold text-xl mb-6">{{ $item->name }}</h2>

              <div class="flex space-x-4 mb-8">
                <img src='{{ asset("storage/$item->author_thumbnail") }}' alt="" class="rounded-full w-[50px] h-[50px]">
                <div class="flex flex-col gap-y-1">
                  <span class="text-[15px]">{{ $item->author_name }}</span>
                  <a href="{{ route('authors.show', $item->author_slug) }}" class="text-[15px] text-darkPurple font-bold">{{ $item->author_username }}</a>
                </div>
              </div>

              <p class="text-[15px] leading-loose">{{ $item->description }}.</p>

              <div class="flex flex-wrap justify-between items-stretch text-[15px] mt-10 gap-x-4 gap-y-6">
                <div class="flex flex-col gap-y-2 justify-between">
                  <p>Current Bid</p>
                  <span class="font-bold text-xl text-darkPurple">{{ $item->price }} ETH</span>
                  <p>
                    @php
                      echo '($' . number_format($item->price * 1656.15, 2) . ')';
                    @endphp
                  </p>
                </div>

                <div class="flex flex-col gap-y-2 justify-between">
                  <p>Owner</p>
                  <span class="font-bold text-xl text-darkPurple">{{ $item->author_name }}</span>
                  <p>{{ $item->author_username }}</p>
                </div>

                <div class="flex flex-col gap-y-2">
                  <p>Category</p>
                  <span class="font-bold text-xl text-darkPurple">{{ $item->cat_name }}</span>
                  <a href="{{ route('categories.show', $item->cat_slug) }}" class="underline underline-offset-2 hover:text-darkPurple">Browse {{ $item->cat_name }}</a>
                </div>
              </div>

              <div class="flex flex-wrap mt-10 items-center gap-6">
                <span>Place Bid:</span>
                <div class="flex">
                  <input type="number" name="" id="" placeholder="2" class="border border-darkPurple bg-transparent rounded-l-full py-2 px-3 pl-3.5 w-[50px] text-center text-white focus:outline-none">
                  <span class="bg-darkPurple text-white py-2 px-3 pr-3.5 rounded-r-full text-center">ETH</span>
                </div>
                <button class="btn text-sm !py-3 flex-grow md:flex-grow-0">Submit Now</button>
              </div>
            </div>
          </div>
        </div>

        <div class="space-y-14 pt-32">
          <div class="section-header">
            <h2>Current <span>Bidding</span> Prices.</h2>
          </div>

          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @for($i = 0; $i < 6; $i++)
              <x-card class="flex overflow-hidden">
                <div class="w-[33%] sm:w-[30%] md:w-2/5">
                  <img src="{{ asset('images/current-02.jpg') }}" alt="" class="h-full">
                </div>

                <div class="p-6 flex flex-col flex-grow gap-y-6">
                  <div>
                    <h4 class="text-xl font-bold">David Walker</h4>
                    <a href="" class="text-darkPurple font-bold">@davidwalker</a>
                  </div>

                  <div class="h-[1px] w-full bg-[rgba(255,255,255,0.2)]"></div>

                  <div class="space-y-2">
                    <span>Bid: <span class="text-darkPurple font-bold text-lg">0.06 ETH</span></span>
                    <p class="text-darkPurple text-sm">24/07/2022, 22:00</p>
                  </div>
                </div>
              </x-card>
            @endfor

          </div>
        </div>
      </div>
    </section>

    @include('partials._create_nft')
  </main>

@endsection