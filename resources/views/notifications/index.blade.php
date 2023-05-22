
<ul>
    @forelse ($notifications as $notification)
        <li class="{{ $notification->is_read ? 'read' : 'unread' }}">
            <a href="{{ route('notifications.markAsRead', $notification) }}">
            {{ $notification->data['message'] }};
            </a>
        </li>
    @endforeach
</ul>
