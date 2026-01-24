@extends('site.layout.master')

@section('content')
<div class="site-section" id="schedule-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <span class="subheading">schedule your own</span>
            <h2 class="heading mb-3">Private Game</h2>
            <p>Reserve a court, pick your time, and play with your own group.</p>
          </div>
        </div>

        
       <div class="row">
          <div class="col-12">
            <ul class="nav days d-flex" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="sunday-tab" data-toggle="tab" href="#nav-sunday" role="tab" aria-controls="sunday" aria-selected="false">S</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="monday-tab" data-toggle="tab" href="#nav-monday" role="tab" aria-controls="monday" aria-selected="false">M</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tuesday-tab" data-toggle="tab" href="#nav-tuesday" role="tab" aria-controls="tuesday" aria-selected="false">T</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="wednesday-tab" data-toggle="tab" href="#nav-wednesday" role="tab" aria-controls="wednesday" aria-selected="false">W</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="thursday-tab" data-toggle="tab" href="#nav-thursday" role="tab" aria-controls="thursday" aria-selected="false">T</a>
              </li><li class="nav-item">
                <a class="nav-link" id="friday-tab" data-toggle="tab" href="#nav-friday" role="tab" aria-controls="friday" aria-selected="false">F</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="saturday-tab" data-toggle="tab" href="#nav-saturday" role="tab" aria-controls="saturday" aria-selected="false">S</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card shadow border-0">
        <div class="card-header bg-primary text-white py-4">
          <h2 class="mb-0 text-center">Book Your Private Dodgeball Game</h2>
          <p class="mb-0 text-center">Fill out the form below to reserve your private court. We'll confirm within 24 hours.</p>
        </div>
        
        <div class="card-body p-4 p-md-5">
          <form id="privateGameForm" action="#" method="POST">
            
            <!-- Contact Information -->
            <div class="row mb-4">
              <div class="col-md-6 mb-3">
                <label for="contactName" class="form-label fw-bold">Contact Person Name *</label>
                <input type="text" class="form-control" id="contactName" name="contactName" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="phone" class="form-label fw-bold">Phone Number *</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="email" class="form-label fw-bold">Email Address *</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            
            <!-- Game Details -->
            <div class="row mb-4">
              <div class="col-md-6 mb-3">
                <label for="date" class="form-label fw-bold">Preferred Date *</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="time" class="form-label fw-bold">Preferred Time *</label>
                <select class="form-select" id="time" name="time" required>
                  <option value="">Select a time</option>
                  <option value="08:00">8:00 AM</option>
                  <option value="10:00">10:00 AM</option>
                  <option value="12:00">12:00 PM</option>
                  <option value="14:00">2:00 PM</option>
                  <option value="16:00">4:00 PM</option>
                  <option value="18:00">6:00 PM</option>
                  <option value="20:00">8:00 PM</option>
                </select>
              </div>
            </div>
            
            <!-- Venue Selection -->
            <div class="row mb-4">
              <div class="col-md-6 mb-3">
                <label for="venue" class="form-label fw-bold">Preferred Venue *</label>
                <select class="form-select" id="venue" name="venue" required>
                  <option value="">Select a venue</option>
                  <option value="International Academy-Amman">International Academy-Amman (Dabouq)</option>
                  <option value="Islamic Educational College">Islamic Educational College (Jubaiha)</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="duration" class="form-label fw-bold">Game Duration *</label>
                <select class="form-select" id="duration" name="duration" required>
                  <option value="">Select duration</option>
                  <option value="1">1 Hour</option>
                  <option value="1.5">1.5 Hours</option>
                  <option value="2">2 Hours</option>
                  <option value="3">3 Hours (Tournament Style)</option>
                </select>
              </div>
            </div>
            
            <!-- Number of Players -->
            <div class="row mb-4">
              <div class="col-md-6 mb-3">
                <label for="totalPlayers" class="form-label fw-bold">Total Number of Players *</label>
                <select class="form-select" id="totalPlayers" name="totalPlayers" required>
                  <option value="">Select number</option>
                  <option value="10-15">10-15 Players</option>
                  <option value="16-20">16-20 Players</option>
                  <option value="21-25">21-25 Players</option>
                  <option value="26-30">26-30 Players</option>
                  <option value="30+">30+ Players (Large Event)</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="skillLevel" class="form-label fw-bold">Average Skill Level</label>
                <select class="form-select" id="skillLevel" name="skillLevel">
                  <option value="beginner">Beginner (First Time Players)</option>
                  <option value="intermediate">Intermediate (Some Experience)</option>
                  <option value="advanced">Advanced (Regular Players)</option>
                  <option value="mixed">Mixed Levels</option>
                </select>
              </div>
            </div>
            
            <!-- Player Names (Dynamic Section) -->
            <div class="row mb-4" id="playerNamesSection">
              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Player Names (Optional)</label>
                <div id="playerNamesContainer">
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="playerName[]" placeholder="Player 1 Name">
                  </div>
                </div>
                <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="addPlayerField()">
                  <i class="fas fa-plus"></i> Add Another Player
                </button>
                <small class="text-muted d-block mt-1">You can add all player names or just provide the total count.</small>
              </div>
            </div>
            
            <!-- Additional Information -->
            <div class="row mb-4">
              <div class="col-12 mb-3">
                <label for="additionalInfo" class="form-label fw-bold">Additional Information</label>
                <textarea class="form-control" id="additionalInfo" name="additionalInfo" rows="4" placeholder="Please provide any special requests, event type (birthday, corporate team building, etc.), equipment needs, or other important details..."></textarea>
              </div>
            </div>
            
            <!-- Terms and Submit -->
            <div class="row mb-4">
              <div class="col-12 mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                  <label class="form-check-label" for="terms">
                    I agree that this booking request is subject to availability and confirmation. I understand that I will receive an email confirmation or alternative suggestions within 24 hours.
                  </label>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
                  <i class="fas fa-paper-plane me-2"></i> Submit Booking Request
                </button>
                <p class="text-muted mt-3">
                  <i class="fas fa-info-circle me-1"></i> 
                For urgent bookings, call us at <strong>+962 791155611</strong>.
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
    <script>
  function addPlayerField() {
    const container = document.getElementById('playerNamesContainer');
    const currentCount = container.children.length + 1;
    
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
      <input type="text" class="form-control" name="playerName[]" placeholder="Player ${currentCount} Name">
      <button class="btn btn-outline-danger" type="button" onclick="this.parentElement.remove()">
        <i class="fas fa-times"></i>
      </button>
    `;
    
    container.appendChild(div);
  }
  
  // Set minimum date to today
  document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date').min = today;
  });
</script>
@endsection