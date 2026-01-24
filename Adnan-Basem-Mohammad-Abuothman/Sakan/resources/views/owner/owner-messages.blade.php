@extends('layouts.owner_master')
@section('title', 'Messages - Owner Dashboard')



@section('head')





    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">





@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold mb-1">Messages</h2>
            <p class="text-muted">Chat with interested students.</p>
        </div>
    </div>

    <div class="row" style="height: 600px;">
        <div class="col-md-4 h-100">
            <div class="dashboard-card h-100 d-flex flex-column overflow-auto">
                @foreach ($contacts as $item)
                    <a href="{{ route('messages.show', $item['user']->id) }}" class="text-decoration-none">
                        <div
                            class="p-3 border-bottom d-flex align-items-center gap-3 {{ isset($contact) && $contact->id == $item['user']->id ? 'bg-light' : '' }}">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 40px; height: 40px;">
                                {{ substr($item['user']->name, 0, 2) }}
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold text-dark">{{ $item['user']->name }}</span>
                                    <small
                                        class="text-muted">{{ $item['last_message']->created_at->format('h:i A') }}</small>
                                </div>
                                <div class="text-truncate small text-muted">{{ $item['last_message']->content }}</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="col-md-8 h-100">
            <div class="dashboard-card h-100 d-flex flex-column">
                @if (isset($contact))
                    <div class="p-3 border-bottom d-flex align-items-center gap-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;">
                            {{ substr($contact->name, 0, 2) }}
                        </div>
                        <span class="fw-bold">{{ $contact->name }}</span>
                    </div>

                    <div class="flex-grow-1 p-4 overflow-auto bg-light" id="chatMessages">
                        @foreach ($messages as $msg)
                            <div class="d-flex mb-3 {{ $msg->sender_id == auth()->id() ? 'justify-content-end' : '' }}">
                                <div class="{{ $msg->sender_id == auth()->id() ? 'bg-primary text-white rounded-start rounded-top' : 'bg-white border rounded-end rounded-top' }} p-3 shadow-sm"
                                    style="max-width: 70%;">
                                    {{ $msg->content }}
                                    <div class="small mt-1 {{ $msg->sender_id == auth()->id() ? 'text-white-50' : 'text-muted' }}"
                                        style="font-size: 0.7rem;">
                                        {{ $msg->created_at->format('h:i A') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="p-3 border-top bg-white">
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $contact->id }}">
                            <div class="input-group">
                                <input type="text" name="content" class="form-control" placeholder="Type a message..."
                                    required autocomplete="off">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-send-fill"></i></button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                        <i class="bi bi-chat-dots fs-1 mb-3"></i>
                        <p>Select a student to start chatting</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
