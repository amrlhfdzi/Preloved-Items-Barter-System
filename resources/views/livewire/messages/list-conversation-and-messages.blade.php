@if ($conversations->isNotEmpty())

<div class="container" wire:poll>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contacts</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group contacts-list">
                        @foreach ($conversations as $conversation)
                        <li class="list-group-item {{ $conversation->id === $selectedConversation->id ? 'bg-warning' : '' }}">
                            <a href="#" wire:click.prevent="viewMessage( {{ $conversation->id }})" class="d-flex align-items-center">
                                <div class="mr-3">
                                @if ($conversation->sender_id === auth()->id())
                                    <img class="contacts-list-img rounded-circle" src="/uploads/avatars/{{ $conversation->receiver->avatar }}" alt="User Avatar" width="50">
                                    @else
                                    <img class="contacts-list-img rounded-circle" src="/uploads/avatars/{{ $conversation->sender->avatar }}" alt="User Avatar" width="50">
                                    @endif
                                </div>
                                <div class="contacts-list-info">
                                    <h5 class="contacts-list-name text-dark mb-0">
                                        @if ($conversation->sender_id === auth()->id())
                                        {{ $conversation->receiver->userDetail->username ?? $conversation->receiver->name }}
                                        @else
                                        {{ $conversation->sender->userDetail->username ?? $conversation->sender->name }}
                                        @endif
                                        <small class="float-right contacts-list-date text-muted" style="margin-left: 80px;">
                                            @if ($conversation->messages->last())
                                            {{ $conversation->messages->last()->created_at->format('d/m/Y') }}
                                            @endif
                                        </small>
                                    </h5>
                                    <p class="contacts-list-msg text-secondary mb-0">
                                        @if ($conversation->messages->last())
                                        {{ $conversation->messages->last()->body }}
                                        @endif
                                    </p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Chat with
                        <span>
                            @if ($conversation->sender_id === auth()->id())
                            {{ $selectedConversation->receiver->userDetail->username ?? $selectedConversation->receiver->name}}
                            @else
                            {{ $selectedConversation->sender->userDetail->username ?? $selectedConversation->sender->name }}
                            @endif
                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="direct-chat-messages" id="conversation">
                        @foreach ($selectedConversation->messages->reverse() as $message)
                        <div class="direct-chat-msg {{ $message->user_id === auth()->id() ? 'flex-row-reverse'  : '' }} rounded p-2 mb-2 {{ $message->user_id === auth()->id() ? 'bg-primary text-white' : 'bg-secondary text-white' }}">
                            <div class="direct-chat-info mb-1">
                                <span class="direct-chat-name font-weight-bold">{{ $message->user->id === auth()->id() ? 'You' : $message->user->userDetail->username ?? $message->user->name }}</span>
                                <span class="float-right direct-chat-timestamp ml-2">{{ $message->created_at->format('d M H:i A') }}</span>
                            </div>
                            <img class="direct-chat-img rounded-circle" src="/uploads/avatars/{{ $message->user->id === auth()->id() ? Auth::user()->avatar : $message->user->avatar }}" alt="message user image" width="50">
                            <div class="direct-chat-text text-justify" style="font-size: 14px; line-height: 1.5rem;">
                                {{ $message->body }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <form wire:submit.prevent="sendMessage" action="#">
                        <div class="input-group">
                            <input wire:model.defer="body" type="text" name="message" placeholder="Type Message ..." class="form-control" required>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="text-center">
            <img src="/images/messages.png" width="130" height="130" class="img-fluid my-4">
            <h3><strong>You do not have any messages yet.</strong></h3>
            <!-- <h4>Click the button below to select the users to chat with</h4> <a href="/admin/users" class="btn btn-primary m-3">Go to Users</a> -->
        </div>
    </div>
</div>

@endif
