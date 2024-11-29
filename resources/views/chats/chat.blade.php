@extends('layouts.main')

@section('container')

    <link rel="stylesheet" href="{{ asset('css/chat/style.css') }}?v={{ time() }}">

    <div class="row justify-content-center mt-5">
        <div class="col-11 col-lg-8">
            <div class="chat-box">
                <div class="d-flex flex-row align-items-center mb-3">
                    <div class="col-1">
                        <a href="{{ route('chats.index') }}" class="color-inherit"><i class="bi bi-arrow-left fs-3"></i></a>
                    </div>
                    <div class="col-1 overflow-hidden" style="width: 50px; height:50px;">
                        @if ($recipient->image)
                            <img src="{{ asset('storage/' . $recipient->image) }}" alt="{{ $recipient->name }}"
                                class="rounded-circle">
                        @else
                            <img src="{{ asset('img/' . $recipient->gender . ' icon.png') }}" alt="{{ $recipient->name }}"
                                class="rounded-circle">
                        @endif
                    </div>
                    <div class="col-10 ps-3">
                        <h3 class="fw-bold m-0">{{ $recipient->name }}</h3>
                    </div>
                </div>

                <div class="chat-content" id="chat-messages">
                    @if ($chat->messages->count() > 0)
                        @foreach ($chat->messages as $message)
                            <div
                                class="message {{ $message->sender->id == auth()->user()->id ? 'sent' : 'received' }} pb-2">
                                <div class="message-bubble">
                                    <p class="m-0">{{ $message->message_text }}</p>
                                </div>
                                <div
                                    class="message-info {{ $message->sender->id == auth()->user()->id ? 'sent' : 'received' }}">
                                    <span
                                        class="timestamp">{{ \Carbon\Carbon::parse($message->created_at)->timezone('Asia/Jakarta')->format('H:i') }}</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-muted">No messages yet. Be the first to send a message!</p>
                    @endif
                </div>

                <form id="chat-form" method="POST" action="{{ route('chats.store') }}" class="chat-form">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="chat" id="chat" value="{{ $chat->id }}">
                        <input type="text" name="message" class="form-control" placeholder="Type a message..." required>
                        <button type="submit" class="btn btn-primary send-btn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add this to the <head> or before your chat.js script tag -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const chatId = @json($chat->id);
        const userId = @json(auth()->user()->id);
        const chatStoreUrl = "{{ route('chats.store') }}"
    </script>

    <script src="{{ asset('js/chat.js') }}?v={{ time() }}"></script>

@endsection
