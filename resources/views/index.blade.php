@extends('layouts.layout')

@section('title', 'Home - Liberty NFT Market')

@push('swiper_js')
  <script src="{{ asset('vendor/swiper/swiper.js') }}"></script>
@endpush

@push('swiper_css')
  <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper.css') }}">
@endpush

@push('jquery')
  <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
@endpush

@push('isotope')
  <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
@endpush

@section('content')
  <section id="hero" class="home-hero pt-40 pb-20 bg-brightPink md:pt-48 md:pb-28 lg:pt-60 lg:pb-36" style="background-image: url({{ asset('images/homeHero.jpg') }})">
    <div class="container">
      <div class="flex flex-col gap-y-20 md:gap-y-32 lg:gap-y-0 lg:flex-row lg:justify-between">
        <div class="lg:w-1/2 lg:self-center">
          <h3 class="text-xl mb-2">Liberty NFT Market</h3>
          <h2 class="uppercase font-bold text-5xl leading-snug mb-7">Create, Sell & Collect Top NFT’s.</h2>
          <p class="leading-7 mb-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero sapiente unde provident corrupti, illum asperiores totam rerum voluptas fugiat reprehenderit, accusantium dolor consequatur nesciunt non dicta pariatur officia? Facilis, soluta necessitatibus impedit illum id ratione maxime perferendis repellat.</p>
          <div class="flex flex-wrap justify-center gap-3 sm:justify-start md:gap-5">
            <a href="{{ route('items.index') }}" class="btn !bg-transparent border border-darkPurple flex-grow hover:!bg-darkPurple hover:text-white">Explore Top NFTs</a>
            <a href="https://youtube.com" class="btn flex-grow">Watch Our Videos</a>
          </div>
        </div>
    
        <div class="lg:w-2/5 lg:self-start">
          <div class="swiper hero-slider space-y-14">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="{{ asset('images/banner-01.png') }}" alt="" class="w-full select-none">
              </div>
              <div class="swiper-slide">
                <img src="{{ asset('images/banner-02.png') }}" alt="" class="w-full select-none">
              </div>
            </div>
    
            <div class="flex justify-center space-x-10">
              <div class="swiper-button-prev static"></div>
              <div class="swiper-button-next static"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <main>
    <section id="categories-and-collections" class="bg-darkBlue py-24 overflow-hidden">
      <div class="container">
        <div class="space-y-14">
          <div class="section-header">
            <h2>Browse Through Our <span>Categories</span> Here.</h2>
          </div>
  
          <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-y-8 gap-x-6">

          @foreach($categories as $category)

            <x-card class="category">
              <a href="{{ route('categories.show', $category->cat_slug) }}" class="py-8 px-4 flex flex-col items-center gap-y-4">
                <div class="bg-white w-16 h-16 flex justify-center items-center rounded-full">
                  {!! $category->cat_icon !!}
                </div>
                <h3 class="font-semibold text-xl text-center leading-tight">{{ $category->cat_name }}</h3>
              </a>
            </x-card>

          @endforeach
          </div>
        </div>

        <div class="space-y-14 pt-32">
          <div class="section-header">
            <h2><span>Top Items</span> In Each Category </h2>
          </div>
  
          <div class="relative">
            <div class="swiper collection-slider">
              <div class="swiper-wrapper">

                @foreach($items as $item)
                  <div class="swiper-slide">
                    <div class="flex flex-col rounded-3xl overflow-hidden relative">
                      <div>
                        <img src='{{ asset("storage/$item->image") }}' alt="" class="w-full">
                      </div>
        
                      <div class="border border-borderColor bg-veryDarkGrey space-y-5 rounded-b-3xl p-6 pb-14 -mt-[50px]">
                        <h3 class="text-xl font-bold tracking-wide">{{ $item->name }}</h3>
                        <div class="h-[1px] w-full bg-[rgba(255,255,255,0.2)]"></div>
                        <div class="flex justify-between items-end">
                          <div class="flex flex-col w-[40px]">
                            <h4 class="text-[15px]">Price:</h4>
                            <p class="text-xl font-bold tracking-wide">{{ $item->price }}ETH</p>
                          </div>
        
                          <div class="flex flex-col max-w-[50%]">
                            <h4 class="text-[15px]">Category:</h4>
                            <p class="text-xl font-bold tracking-wide block truncate">{{ $item->cat_name }}</p>
                          </div>
                        </div>
                      </div>
        
                      <a href="{{ route('categories.show', $item->cat_slug) }}" class="btn absolute left-[10%] bottom-[26px] w-4/5 !py-3 text-sm tracking-wide">Explore {{ $item->cat_name }}</a>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>
      
            <div class="swiper-button-prev absolute top-[calc(50%-24px)] -left-[24px]"></div>
            <div class="swiper-button-next absolute top-[calc(50%-24px)] -right-[24px]"></div>
          </div>
        </div>
      </div>
    </section>

    @include('partials._create_nft')

    <section id="current-items" class="bg-darkBlue pt-24 pb-16">
      <div class="container">
        <div class="mb-14">
          <div class="flex flex-wrap gap-y-8 gap-x-4 justify-center lg:justify-between lg:flex-nowrap lg:items-center">
            <div class="section-header w-full lg:w-auto lg:flex-shrink-0">
              <h2><span>Items</span> Currently In The Market</h2>
            </div>

            <div class="indicator flex flex-wrap justify-center gap-y-2 gap-x-2 w-full lg:w-auto button-group filter-button-group">
              <button type="button" data-filter="*" class="current">All Items</button>

              @foreach ($categories as $category)
                <button type="button" data-filter="{{ '.' . $category->cat_slug }}">{{ $category->cat_name }}</button>
              @endforeach
            </div>
          </div>   
        </div>
      </div>

      <div class="container !p-0">
        <div id="items-list" class="items flex">

          @foreach($items as $item)
            <div class="px-4 pb-8 {{ $item->cat_slug }} grid-item w-full md:w-1/2">
              <x-card class="flex flex-col w-full flex-grow p-8 border">
                <div class="flex flex-wrap gap-6 items-stretch justify-center lg:flex-nowrap pb-8">
                  <div class="lg:flex-shrink-0">
                    <img src='{{ asset("storage/$item->image") }}' alt="" class="item-image-x rounded-xl mx-auto w-[300px] h-[300px] sm:w-[160px] sm:h-[160px] md:w-[280px] md:h-[280px] lg:w-[160px] lg:h-[160px]">
                  </div>
  
                  <div class="flex flex-col gap-y-4 justify-between flex-grow">
                    <div class="space-y-4">
                      <h3 class="font-bold text-xl">{{ $item->name }}</h3>
  
                      <div class="flex space-x-4">
                        <img src='{{ asset("storage/$item->author_thumbnail") }}' alt="" class="rounded-full w-[50px] h-[50px]">
  
                        <div class="flex flex-col gap-y-1">
                          <span class="text-[15px] break-all">{{ $item->author_name }}</span>
                          <a href='{{ route("authors.show", $item->author_slug) }}' class="text-[15px] text-darkPurple font-bold break-all">{{ $item->author_username }}</a>
                        </div>
                      </div>
                    </div>
  
                    <a href='{{ route("items.show", $item->slug) }}' class="btn w-full text-sm !py-3">View Item Details</a>
                  </div>
                </div>
  
                <div class="items-wrapper text-[15px] flex justify-between gap-x-6 gap-y-2 items-stretch pt-8 border-t border-[rgba(255,255,255,0.2)]">
                  <div class="flex flex-col gap-y-2 justify-between">
                    <p>Current Bid</p>
                    <span class="font-bold text-xl">{{ $item->price }} ETH</span>
                    <span>
                      @php
                        echo '($' . number_format($item->price * 1656.15, 2) . ')';
                      @endphp
                    </span>
                  </div>
  
                  <div class="flex flex-col gap-y-2 text-right">
                    <p>Category</p>
                    <span class="font-bold text-xl">{{ $item->cat_name }}</span>
                    <a href="{{ route('categories.show', $item->cat_slug) }}" class="text-darkPurple underline underline-offset-2 hover:text-[#afafaf] transition-all">Browse {{ $item->cat_name }}</a>
                  </div>
                </div>
              </x-card>
            </div>
          @endforeach
  
        </div>
      </div>
    </section>
  </main>
@endsection

  