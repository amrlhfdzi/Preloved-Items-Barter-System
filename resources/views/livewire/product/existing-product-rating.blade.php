<div class="rating-container">
    <h3>View Rating</h3>
    <h4>{{ $rating->product->name }}</h4>

    <div class="product-images">
        <!-- Display the product images -->
        @foreach ($rating->product->productImages as $itemImg)
            <img src="{{ asset($itemImg->image) }}" alt="Product Image" width="200">
        @endforeach
    </div>

    <div class="rating-css">
        <!-- Display the rating value -->
        <div class="star-icon">
            @for ($i = 1; $i <= 5; $i++)
                <input type="radio" value="{{ $i }}" @if ($i == $rating->rating) checked @endif disabled>
                <label for="rating{{ $i }}" class="fa fa-star"></label>
            @endfor
        </div>
    </div>

    <div class="user-comment">
        <!-- Display the user's comment -->
        <label for="comment">Review:</label>
        <textarea name="comment" rows="4" class="form-control" disabled>{{ $rating->comment }}</textarea>
    </div>
</div>


<div class="col-md-12  mt-3">
  <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
</div>
