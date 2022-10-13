/**
  * Sticky header on scroll
  */
const navbar = document.querySelector('#navbar');
if (navbar) {
  document.addEventListener('scroll', () => {
    if(window.scrollY > 32) {
      navbar.classList.remove('not-fixed');
    } else {
      navbar.classList.add('not-fixed');
    }
  });
}


/**
  * Mobile Menu toggle
  */
const menuBtn = document.getElementById('menu-btn');
const navMenu = document.getElementById('nav-menu');

menuBtn.addEventListener('click', ()=> {
  menuBtn.classList.toggle('open');
  navMenu.classList.toggle('hidden');
})



/**
  * Update Data in Create Item Page
  */
if(document.querySelector('#create-item-form')) {
  const updateFormBtn = document.querySelector('#update-create-form');

  updateFormBtn.addEventListener('click', () => {
    let itemTitle = document.querySelector('#item-title').value
    let itemPrice = document.querySelector('#item-price').value
    let itemCategory = document.querySelector('#item-category').value
    let itemDescription = document.querySelector('#item-description').value
    let itemImage = document.querySelector('#item-image')
    
    let itemTitlePreview = document.querySelector('#item-title-preview')
    let itemPricePreview = document.querySelector('#item-price-preview')
    let itemPriceDollars = document.querySelector('#item-price-dollars')
    let itemCategoryPreview = document.querySelector('#item-category-preview')
    let itemCategoryPreview2 = document.querySelector('#item-category-preview-2')
    let itemDescriptionPreview = document.querySelector('#item-description-preview')
    let itemImagePreview = document.querySelector('#item-image-preview')

    itemPrice = itemPrice.replace(/[^.\d]/g, '')

    if(itemTitle) { itemTitlePreview.innerHTML = itemTitle };
    if(itemPrice) {
      itemPricePreview.innerHTML = itemPrice
      itemPriceDollars.innerHTML = `(${(itemPrice * 1656.15).toLocaleString('en-US', {style: 'currency', currency: 'USD'})})`
    };
    if(itemCategory) {
      itemCategoryPreview.innerHTML = itemCategory
      itemCategoryPreview2.innerHTML = `Browse ${itemCategory}`
      itemCategoryPreview2.setAttribute('href', `/categories/${itemCategory.toLowerCase()}`)
    };
    if(itemDescription) { itemDescriptionPreview.innerHTML = itemDescription };
    if(itemImage.files.length > 0) {
      let src = URL.createObjectURL(itemImage.files[0])
      itemImagePreview.src = src
    }

    document.querySelector('.js-flash-message').classList.remove('hidden');
    setTimeout(() => document.querySelector('.js-flash-message').classList.add('hidden'), 1500)
  })

  
}


/**
  * Hero Slider
  */
if(document.querySelector('.hero-slider')) {
  var swiperHero = new Swiper(".hero-slider", {
    speed: 500,
    loop: true,
    slidesPerView: "1",
    spaceBetween: 50,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      type: "bullets",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    }
  });
}



/**
  * Collection slider
  */
if(document.querySelector('.collection-slider')) {
  var swiperCollection = new Swiper(".collection-slider", {
    speed: 500,
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 30,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      250: {
        slidesPerView: 1,
      },
  
      768: {
        slidesPerView: 2,
      },
  
      992: {
        slidesPerView: 3,
      }
    }
  });
}



/**
  * Explore slider
  */
if(document.querySelector('.explore-slider')) {
  var swiperCollection = new Swiper(".explore-slider", {
    speed: 500,
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 30,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      250: {
        slidesPerView: 1,
      },
  
      768: {
        slidesPerView: 2,
      },
  
      992: {
        slidesPerView: 3,
      },
    }
  });
}


/**
  * Current Items Filter
  */
// init Isotope
if(document.querySelector('#items-list')) {
  var $grid = $('#items-list').isotope({
    // options
    itemSelector: '.grid-item',
    // layoutMode: 'fitRows',
  });
  // filter items on button click
  $('.filter-button-group').on( 'click', 'button', function() {
    $('.filter-button-group').children('button').removeClass('current')
    $(this).addClass('current');
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  });
}