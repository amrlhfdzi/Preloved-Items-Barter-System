<?php

namespace App\Http\Livewire\Messages;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;

class ListConversationAndMessages extends Component
{
    public $body;

    public $selectedConversation;

    public function mount()
    {
        $this->selectedConversation = Conversation::query()
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->first();

    }

    public function sendMessage()
    {
        Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'user_id' => auth()->id(),
            'body' => $this->body
        ]);

        $this->reset('body');

        $this->viewMessage($this->selectedConversation->id);
    }

    public function viewMessage($conversationId)
    {
        $this->selectedConversation = Conversation::findOrFail($conversationId);
    }
    public function render()
    {

        $conversations = Conversation::query()
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->get();

        return view('livewire.messages.list-conversation-and-messages', [
            'conversations' => $conversations
        ]);
    }
}
