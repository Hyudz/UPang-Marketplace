<!-- resources/views/livewire/chat.blade.php -->

<div>
    <h2>Select a Chat</h2>
    <ul>
        @foreach ($users as $chatUser)
            <li wire:click="selectUser({{ $chatUser->id }})" class="{{ $selectedUserId == $chatUser->id ? 'selected' : '' }}">
                {{ $chatUser->name }}
            </li>
        @endforeach
    </ul>
</div>

<div>
    <h2>Conversation History</h2>
    <ul>
        @foreach ($messages as $message)
            <li>
                <strong>{{ $message->sender->name }}:</strong> {{ $message->body }}
            </li>
        @endforeach
    </ul>
</div>
