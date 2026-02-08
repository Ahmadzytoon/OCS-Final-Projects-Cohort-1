@extends('site.layout.master')

@section('content')
<div class="site-section" id="classes-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8 section-heading">
                <span class="subheading">our weekly</span>
                <h2 class="heading mb-3">Dodgeball Games</h2>
                <p>Participate in our weekly dodgeball games. Check the schedule below and reserve your spot in just a few clicks! All skill levels are welcome.</p>
            </div>
        </div>
        
        <div class="row">
            <!-- Left Column: International Academy-Amman -->
            <div class="col-lg-6">
                @foreach($games->where('location', 'International Academy-Amman') as $game)
                <div class="class-item d-flex align-items-center mb-4">
                    <a href="#" class="class-item-thumbnail">
                        <img src="{{ asset('site/images/' . $game->day . 'Game.png') }}" alt="{{ $game->day }} Game">
                    </a>
                    <div class="class-item-text">
                        <h2><a href="{{ route('reservation.create', $game->id) }}">{{ $game->day }} Game</a></h2>
                        <span>{{ $game->location }}</span>,
                        <span>{{ \Carbon\Carbon::parse($game->time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($game->time)->addHours(2)->format('g:i A') }}</span>
                        <div class="mt-2">
                            <span class="badge bg-info">
                                Available: {{ $game->max_players - $game->current_players }} spots
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
                
                @if($games->where('location', 'International Academy-Amman')->count() == 0)
                <div class="alert alert-info">
                    No games scheduled at International Academy-Amman this week.
                </div>
                @endif
            </div>
            
            <!-- Right Column: Islamic Educational College -->
            <div class="col-lg-6">
                @foreach($games->where('location', 'Islamic Educational College') as $game)
                <div class="class-item d-flex align-items-center mb-4">
                    <a href="#" class="class-item-thumbnail">
                        <img src="{{ asset('site/images/' . $game->day . 'Game.png') }}" alt="{{ $game->day }} Game">
                    </a>
                    <div class="class-item-text">
                        <h2><a href="{{ route('reservation.create', $game->id) }}">{{ $game->day }} Game</a></h2>
                        <span>{{ $game->location }}</span>,
                        <span>{{ \Carbon\Carbon::parse($game->time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($game->time)->addHours(2)->format('g:i A') }}</span>
                        <div class="mt-2">
                            <span class="badge bg-info">
                                Available: {{ $game->max_players - $game->current_players }} spots
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
                
                @if($games->where('location', 'Islamic Educational College')->count() == 0)
                <div class="alert alert-info">
                    No games scheduled at Islamic Educational College this week.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
