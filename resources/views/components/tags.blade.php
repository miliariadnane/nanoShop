@foreach($tags as $tag)
    <span class="badge badge-info"><a href="{{ route('products.tag.index', ['id' => $tag->id]) }}">{{ $tag->name }}</a></span>
@endforeach