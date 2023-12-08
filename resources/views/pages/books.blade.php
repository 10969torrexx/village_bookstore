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

                  @guest
                  @else
                    <div class="form-group">
                      <button type="button" id="buyBookButton" data-id="{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Buy Now
                      </button>
                      
                    </div>
                  @endguest

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

                  @guest
                  @else
                    <div class="form-group">
                      <button type="button" id="buyBookButton" data-id="{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Buy Now
                      </button>
                      
                    </div>
                  @endguest

                </div> 
              @endif
            @endforeach

          </div>
        </div>
      @endif
    @endforeach


  </div>

  @include('pages.books-detail')
</div>

<script>
  var _quantity = 0;
  var _price = 0;
  const quantity = $('#quantity');
  const title = $('#title');
  const totalPrice = $('#totalPrice');
  const price = $('#price');

  $(document).on('click', '#buyBookButton', function(e) {
    e.preventDefault();
      $.ajax({
        type: "GET",
        url: "{{ route('getBookDetail') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, data: {
            'id' : $(this).data('id')
        },
        success: function (response) {
            if (response.status == 200) {
              _quantity = 0;
              _price = parseFloat(response.data.price);

              $('#finalProductId').val(response.data.id);

              const imageSynopsisContainer = $('#imageSynopsisContainer');
              imageSynopsisContainer.html(' ');

              // creating the image & synopis container
                const image = $('<img>', {
                  'src' : response.data.book_cover,
                  'class' : 'col-8'
                });
                imageSynopsisContainer.append(image);

                const synopsis = $('<p>', {
                  'text' : response.data.synopis,
                  'class' : 'ingredients mt-1'
                });
                imageSynopsisContainer.append(synopsis);
              // creating the book details
                title.html(`<strong>Title:</strong> ${response.data.title}`);
                price.html(`<strong>Price:</strong> ${response.data.price.toLocaleString('en-PH', {
                  style: 'currency',
                  currency: 'PHP'
                })}`);
                quantity.html(`<strong>Quantity: </strong> ${_quantity}`);
                totalPrice.html(`<strong>Total Price: </strong>${0.00}`);
            }
        },
        error: function (xhr, status, error) {
            toastr.error('Cannot fetch attendance (Error: 500)');
        }
      });
  });

  $('#addOne').click(function(e) {
    e.preventDefault();
    _quantity ++;
    quantity.html(`<strong>Quantity: </strong> ${_quantity}`);
    totalPrice.html(`<strong>Total Price: </strong>${calculateTotalPrice().toLocaleString('en-PH', {
      style : 'currency',
      currency : 'PHP'
    })}`);
    $('#finalTotalPrice').val(calculateTotalPrice());
    $('#finalQuantity').val(_quantity);
  });

  $('#minusOne').click(function(e) {
    e.preventDefault();
    _quantity = (_quantity > 0 ) ? _quantity-= 1: 0;
    quantity.html(`<strong>Quantity: </strong> ${_quantity}`);
    totalPrice.html(`<strong>Total Price: </strong>${calculateTotalPrice().toLocaleString('en-PH', {
      style : 'currency',
      currency : 'PHP'
    })}`);
    $('#finalTotalPrice').val(calculateTotalPrice());
    $('#finalQuantity').val(_quantity);
  });

  $(document).on('input', '#payment', function() {
    $('#change').text(calculateChange().toLocaleString('en-PH', {
        style: 'currency',
        currency: 'PHP' 
    }));

    $('#finalChange').val(calculateChange().toLocaleString('en-PH', {
        style: 'currency',
        currency: 'PHP' 
    }));
  });

  function calculateTotalPrice() {
    return _price * _quantity;
  }
  
  function calculateChange() {
    return  (calculateTotalPrice() > parseFloat($('#payment').val())) ? 'Insufficient Payment!' : parseFloat($('#payment').val()) - calculateTotalPrice();
  }
</script>