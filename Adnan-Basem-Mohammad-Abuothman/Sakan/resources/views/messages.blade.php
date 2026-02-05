@extends('layouts.master')
@section('title', 'Sakan - Messages')



@section('head')





    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">



@endsection

@section('content')
    <div class="chat-container">
        <div class="chat-sidebar">
            <ul class="chat-list p-0">
                @foreach ($contacts as $item)
                    <a href="{{ route('messages.show', $item['user']->id) }}" class="text-decoration-none">
                        <li class="chat-item {{ isset($contact) && $contact->id == $item['user']->id ? 'active' : '' }}">
                            <div class="chat-avatar text-white bg-primary d-flex align-items-center justify-content-center">
                                {{ substr($item['user']->name, 0, 2) }}
                            </div>
                            <div class="chat-info">
                                <div class="chat-name">
                                    {{ $item['user']->name }} <span
                                        class="chat-time">{{ $item['last_message']->created_at->format('h:i A') }}</span>
                                </div>
                                <div class="chat-preview">{{ $item['last_message']->content }}</div>
                            </div>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>

        <div class="chat-body">
            @if (isset($contact))
                <div class="chat-header">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0 fw-bold">{{ $contact->name }}</h6>
                    </div>
                </div>

                <div class="chat-messages" id="chatMessages">
                    @foreach ($messages as $msg)
                        <div class="message {{ $msg->sender_id == auth()->id() ? 'sent' : 'received' }}">
                            {{ $msg->content }}
                            <span class="message-time">{{ $msg->created_at->format('h:i A') }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="chat-input-area">
                    <form action="{{ route('messages.store') }}" method="POST" class="w-100 d-flex gap-2">
                        @csrf
                        <input type="hidden" name="receiver_id" value="{{ $contact->id }}">
                        <input type="text" name="content" class="chat-input" placeholder="Type a message..." required
                            autocomplete="off">
                        <button class="btn btn-primary rounded-circle p-2" style="width: 45px; height: 45px;"
                            type="submit">
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </form>
                </div>
            @else
                <div class="h-100 d-flex align-items-center justify-content-center text-muted">
                    Select an owner to start chatting.
                </div>
            @endif
        </div>
    </div>
@endsection
