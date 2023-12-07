@php
    use App\Http\Controllers\BooksController;
    $booksController = new BooksController;
@endphp

<div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Our Menu</h2>
      <p>Check Our <span>Yummy Menu</span></p>
    </div>

    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
      {{-- <li class="nav-item" data-filter="*">
        <a href="" class="nav-link filter-active">All</a>
      </li> --}}
      @foreach ($booksController->getGenre() as $item)
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-{{ $loop->iteration }}" data-filter=".filter-{{ $loop->iteration }}">
            <h4>{{ $item }}</h4>
            </a>
        </li><!-- End tab nav item -->
      @endforeach
    </ul>

    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

      <div class="tab-pane fade active show" id="menu-starters">

        <div class="tab-header text-center">
          <p>Choose</p>
        </div>

        <div class="row gy-5">

          @foreach ($booksController->index() as $item)
            <div class="col-lg-4 menu-item filter-{{ $item->category - 1 }}">
              <a href="{{ $item->book_cover }}" class="glightbox"><img src="{{ $item->book_cover }}" class="menu-img img-fluid" alt=""></a>
              <h4>{{ ucwords($item->title) }}</h4>
              <p class="ingredients px-2 text-left">
                {{ ucwords($item->author) }}
              </p>
              <p class="price">
                ₱ {{ number_format($item->price, 2, '.', ',')  }}
              </p>
            </div>
          @endforeach

        </div>
      </div><!-- End Starter Menu Content -->

      <div class="tab-pane fade" id="menu-breakfast">

        <div class="tab-header text-center">
          <p>Menu</p>
          <h3>Breakfast</h3>
        </div>

        <div class="row gy-5">

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
            <h4>Magnam Tiste</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $5.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
            <h4>Aut Luia</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $14.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
            <h4>Est Eligendi</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $8.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
            <h4>Eos Luibusdam</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $12.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
            <h4>Eos Luibusdam</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $12.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img src="assets/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
            <h4>Laboriosam Direva</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $9.95
            </p>
          </div><!-- Menu Item -->

        </div>
      </div><!-- End Breakfast Menu Content -->

      <div class="tab-pane fade" id="menu-lunch">

        <div class="tab-header text-center">
          <p>Menu</p>
          <h3>Lunch</h3>
        </div>

        <div class="row gy-5">

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
            <h4>Magnam Tiste</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $5.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
            <h4>Aut Luia</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $14.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
            <h4>Est Eligendi</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $8.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
            <h4>Eos Luibusdam</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $12.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
            <h4>Eos Luibusdam</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $12.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img src="assets/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
            <h4>Laboriosam Direva</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $9.95
            </p>
          </div><!-- Menu Item -->

        </div>
      </div><!-- End Lunch Menu Content -->

      <div class="tab-pane fade" id="menu-dinner">

        <div class="tab-header text-center">
          <p>Menu</p>
          <h3>Dinner</h3>
        </div>

        <div class="row gy-5">

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
            <h4>Magnam Tiste</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $5.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
            <h4>Aut Luia</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $14.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
            <h4>Est Eligendi</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $8.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
            <h4>Eos Luibusdam</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $12.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
            <h4>Eos Luibusdam</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $12.95
            </p>
          </div><!-- Menu Item -->

          <div class="col-lg-4 menu-item">
            <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img src="assets/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
            <h4>Laboriosam Direva</h4>
            <p class="ingredients">
              Lorem, deren, trataro, filede, nerada
            </p>
            <p class="price">
              $9.95
            </p>
          </div><!-- Menu Item -->

        </div>
      </div><!-- End Dinner Menu Content -->

    </div>

  </div>