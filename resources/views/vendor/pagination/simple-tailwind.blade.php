@if ($paginator->hasPages())
  <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
      <span class="py-2.5 px-6 rounded-full bg-darkPurple text-center hover:bg-white transition-all duration-300 group opacity-0">
        <svg class="w-4 h-5 fill-white group-hover:fill-darkPurple transition-all duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"/></svg>
      </span>
    @else
      <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="py-2.5 px-6 rounded-full bg-darkPurple text-center hover:bg-white transition-all duration-300 group">
        <svg class="w-4 h-5 fill-white group-hover:fill-darkPurple transition-all duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M447.1 256C447.1 273.7 433.7 288 416 288H109.3l105.4 105.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448s-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L109.3 224H416C433.7 224 447.1 238.3 447.1 256z"/></svg>
      </a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="py-2.5 px-6 rounded-full bg-darkPurple text-center hover:bg-white transition-all duration-300 group">
        <svg class="w-4 h-5 fill-white group-hover:fill-darkPurple transition-all duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/></svg>
      </a>
    @else
      <span class="py-2.5 px-6 rounded-full bg-darkPurple text-center hover:bg-white transition-all duration-300 group opacity-0">
        <svg class="w-4 h-5 fill-white group-hover:fill-darkPurple transition-all duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/></svg>
      </span>
    @endif
  </nav>
@endif
