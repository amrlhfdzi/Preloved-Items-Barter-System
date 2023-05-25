<div>
    <h3>View Rating</h3>
    <h4>{{ $rating->barter->name }}</h4>

    <!-- Display the product images -->
    @foreach ($rating->barter->barterImages as $images)
        <img src="{{ Storage::url($images->image) }}" onerror="this.onerror=null; this.src='{{ asset($images->image) }}';" alt="Product Image" width="200">
    @endforeach

    <!-- Display the rating value -->
    <div class="rating-css">
        <div class="star-icon">
            @for ($i = 1; $i <= 5; $i++)
                <input type="radio" value="{{ $i }}" @if ($i == $rating->rating) checked @endif disabled>
                <label for="rating{{ $i }}" class="fa fa-star"></label>
            @endfor
        </div>
    </div>

    <!-- Display the user's comment -->
    <div>
        <label for="comment">Review:</label>
        <textarea name="comment" rows="4" class="form-control" disabled>{{ $rating->comment }}</textarea>
    </div>
</div>

