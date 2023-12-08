<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Book Detail</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('payForBook') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row justify-content-center" id="content">
                    <div class="col-6" id="imageSynopsisContainer">
                        <img src="assets/img/books/horror-4.jpg" class="col-8" alt="">
                        <p class="ingredients"><strong>Synopsis: </strong> <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                    </div>
                    <div class="col-6" id="bookDetailsContainer">
                        <input type="text" class="form-control" hidden placeholder="productId" name="productId" value="" id="finalProductId">
                        <input type="text" class="form-control" hidden placeholder="quantity" name="quantity" id="finalQuantity">
                        <input type="text" class="form-control" hidden placeholder="totalPrice" id="finalTotalPrice" name="totalPrice" id="finalQuantity">
                        <input type="number" class="form-control" hidden placeholder="change" id="finalChange" name="change">

                        <p id="title"></p>
                        <p data-price="" id="price"></p>
                        <p id="quantity"></p>
                        <p id="totalPrice"></p>
                        <p><strong>Set Quantity</strong></p>
                        <div class="row justify-content-center">
                            <a href="#" id="minusOne" class="col-5 mx-1 btn btn-secondary scrollto">-</a>
                            <a href="#" id="addOne" class="col-5 mx-1 btn btn-secondary scrollto">+</a>
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Payment</strong></label>
                            <input type="number" class="form-control" name="payment" id="payment" required>
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Change</strong></label>
                            <p id="change">₱ 0.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Confirm Order</button>
            </div>
        </form>
      </div>
    </div>
  </div>