@php
    use App\Http\Controllers\BooksController;
    $booksController = new BooksController;
@endphp



<div class="container" data-aos="fade-up">

  <div class="section-header">
    <h2>Our Books</h2>
    <p>Find your next <span>Adventure</span></p>
  </div>

  <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
    @foreach ($booksController->getGenre() as $item)
      @if ($loop->iteration == 1)
        <li class="nav-item">
          <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-{{ $loop->iteration }}">
            <h4>{{ $item }}</h4>
          </a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-{{ $loop->iteration }}">
            <h4>{{ $item }}</h4>
          </a>
        </li>
      @endif

     
    @endforeach

  </ul>

  <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

    @foreach ($booksController->getGenre() as $genre)
      @if ($loop->iteration == 1)
        <div class="tab-pane fade active show" id="menu-{{ $loop->iteration }}">

          <div class="tab-header text-center">
            <p>Choose</p>
            <h3>{{ $genre }}</h3>
          </div>

          <div class="row gy-5">

            @foreach ($booksController->index() as $item)
              @if (strtolower($booksController->getGenre()[$item->genre - 1]) == strtolower($genre))
                <div class="col-lg-4 menu-item">
                  <a href="{{ $item->book_cover }}" class="glightbox"><img src="{{ $item->book_cover }}" class="menu-img img-fluid" alt=""></a>
                  <h4>{{ ucwords($item->title) }}</h4>
                  <p class="ingredients">
                    {{ ucwords($item->author) }}
                  </p>
                  <p class="price">
                    ₱ {{ number_format($item->price, 2, '.', ',')  }}
                  </p>
                  <div class="form-group">
                    <a href="#" class="btn btn-danger">Buy Now</a>
                  </div>
                </div> 
              @endif
            @endforeach

          </div>
        </div>
      @else
        <div class="tab-pane fade" id="menu-{{ $loop->iteration }}">

          <div class="tab-header text-center">
            <p>Choose</p>
            <h3>{{ $genre }}</h3>
          </div>

          <div class="row gy-5">

            @foreach ($booksController->index() as $item)
              @if (strtolower($booksController->getGenre()[$item->genre - 1]) == strtolower($genre))
                <div class="col-lg-4 menu-item sa">
                  <a href="{{ $item->book_cover }}" class="glightbox"><img src="{{ $item->book_cover }}" class="menu-img img-fluid" alt=""></a>
                  <h4>{{ ucwords($item->title) }}</h4>
                  <p class="ingredients">
                    {{ ucwords($item->author) }}
                  </p>
                  <p class="price">
                    ₱ {{ number_format($item->price, 2, '.', ',')  }}
                  </p>
                  <div class="form-group">
                    <a href="#" class="btn btn-danger">Buy Now</a>
                  </div>
                </div> 
              @endif
            @endforeach

          </div>
        </div>
      @endif
    @endforeach


  </div>
</div>