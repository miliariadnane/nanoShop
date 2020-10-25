@component('mail::message')
# Comment Mailing infos

SomeOne has comment you Product 

[Nano](https://miliari-adnane.com)

The body of your message.

@component('mail::button', ['url' => route('products.show', ['product' => $comment->commentable->id]) ])
Read More
@endcomponent

@component('mail::button', ['url' => route('users.show', ['user' => $comment->user->id]) ])
    {{ $comment->user->name }} User commented
@endcomponent

@component('mail::panel')
    {{ $comment->content }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
