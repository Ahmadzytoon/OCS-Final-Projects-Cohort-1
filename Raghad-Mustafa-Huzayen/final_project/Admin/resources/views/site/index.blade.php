@extends('site.layout.master') 

@section('content')
<div 
  class="intro-section" 
  id="home-section"
  style="

  "
>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12 mx-auto text-center aos-init aos-animate" data-aos="fade-up">
            <h1 class="mb-3">Welcome to Our Family !</h1>
            <p class="lead mx-auto desc mb-5">
              Jordan’s Home for Weekly Dodgeball Games
            </p>
            <p class="text-center">
              <a href="{{ route('games.index') }}" class="btn btn-outline-white py-3 px-5">Join Our Games</a>
            </p>
          </div>
        </div>
      </div>
</div>

<div class="schedule-wrap">
      <div class="d-md-flex align-items-center">
        <div class="hours mr-md-4 mb-4 mb-lg-0">
          <strong class="d-block" style="color: #f23a2e;">Hours</strong>
        </div>
        <div class="cta ml-auto">
          <a href="{{ route('contact') }}" class="smoothscroll d-flex d-md-flex align-items-center btn">
            <span class="mx-auto">  <span>Contact us</span> <span class="arrow icon-keyboard_arrow_right"></span></span>
          </a>
        </div>
      </div>
    </div>

<div class="site-section about-us-section">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-8 section-heading about-us-content">
        <span class="subheading">know more</span>
        <h2 class="heading mb-3">About Us</h2>
        <p class="about-us-text">
         We are a community-driven platform dedicated to organizing and managing weekly dodgeball games. Our goal is to create a fun, safe, and well-organized environment where players of all skill levels can enjoy the game and stay active.<br>

Our weekly games are designed to bring people together, improve fitness, and encourage teamwork through a fast-paced and exciting sport.<br>Whether you are new to dodgeball or have years of experience, our games are open to everyone.

We work with experienced coaches who focus on fair play, safety, and creating an enjoyable experience for all participants. We also offer private game scheduling, and special events tailored to different groups and occasions.<br>

Our mission is to grow the dodgeball community in Jordan by making the sport more accessible, organized, and enjoyable for everyone.
        </p>
      </div>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <p class="text-center">
          <a href="{{ route('games.index') }}" class="btn btn-outline-white py-3 px-5 join-games-btn" style="border: 4px solid #f23a2e;">Join Our Games</a>
        </p>
      </div>
    </div>

    <!-- Slider -->
    <div class="owl-carousel nonloop-block-14 block-14 aos-init aos-animate" data-aos="fade">
      <!-- slider content stays untouched -->
    </div>
  </div>
</div>

    <!-- Slider -->
    <div class="owl-carousel nonloop-block-14 block-14 aos-init aos-animate" data-aos="fade">
      <!-- slider content stays untouched -->
    </div>

  </div>
</div>
<!-- Simple FAQ with Pure CSS - NO BOOTSTRAP -->
<section class="simple-faq" style="padding: 80px 0; background: #f8f9fa;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 20px;">
        <h2 style="text-align: center; margin-bottom: 20px; color: #e63946; font-size: 2.5rem; font-weight: bold;">Frequently Asked Questions</h2>
        <p style="text-align: center; margin-bottom: 50px; font-size: 1.2rem; color: #e63946; max-width: 700px; margin-left: auto; margin-right: auto; line-height: 1.6;">
            Got questions about dodgeball? We've got answers!
        </p>
        
        <div class="faq-list" style="max-width: 800px; margin: 0 auto;">
            
            <!-- Question 1 -->
            <div class="faq-item" style="margin-bottom: 15px; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-left: 5px solid #f23a2e;">
                <div class="faq-question" data-faq="1" style="padding: 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; font-size: 1.1rem; color: #333;">
                    <span>Q1: Do I need experience to join weekly games?</span>
                    <span class="faq-icon" style="font-size: 1.5rem; transition: transform 0.3s; color: #e63946;">+</span>
                </div>
                <div class="faq-answer" id="faq-answer-1" style="display: none; padding: 0 20px 20px; line-height: 1.6; color: #555;">
                    <strong style="color: #e63946;">No experience needed!</strong> Our weekly games are open to players of all skill levels. Our coaches provide rule explanations and warm-up sessions before each game to ensure everyone can participate comfortably and safely.
                </div>
            </div>
            
            <!-- Question 2 -->
            <div class="faq-item" style="margin-bottom: 15px; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-left: 5px solid #f23a2e;">
                <div class="faq-question" data-faq="2" style="padding: 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; font-size: 1.1rem; color: #333;">
                    <span>Q2: What should I wear to play dodgeball?</span>
                    <span class="faq-icon" style="font-size: 1.5rem; transition: transform 0.3s; color: #e63946;">+</span>
                </div>
                <div class="faq-answer" id="faq-answer-2" style="display: none; padding: 0 20px 20px; line-height: 1.6; color: #555;">
                    Wear comfortable athletic clothing that allows movement: t-shirt, shorts or athletic pants, and clean indoor sports shoes. We provide the dodgeballs and all necessary equipment.
                </div>
            </div>
            
            <!-- Question 3 -->
            <div class="faq-item" style="margin-bottom: 15px; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-left: 5px solid #f23a2e;">
                <div class="faq-question" data-faq="3" style="padding: 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; font-size: 1.1rem; color: #333;">
                    <span>Q3: How do I reserve a spot in weekly games?</span>
                    <span class="faq-icon" style="font-size: 1.5rem; transition: transform 0.3s; color: #e63946;">+</span>
                </div>
                <div class="faq-answer" id="faq-answer-3" style="display: none; padding: 0 20px 20px; line-height: 1.6; color: #555;">
                    You can reserve spots through our website on the "Weekly Games" page. Simply select your preferred game, choose the number of players, and complete the reservation. You'll receive a confirmation email with all the details including location and time.
                </div>
            </div>
            
            <!-- Question 4 -->
            <div class="faq-item" style="margin-bottom: 15px; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-left: 5px solid #f23a2e;">
                <div class="faq-question" data-faq="4" style="padding: 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; font-size: 1.1rem; color: #333;">
                    <span>Q4: What's the minimum age to play?</span>
                    <span class="faq-icon" style="font-size: 1.5rem; transition: transform 0.3s; color: #e63946;">+</span>
                </div>
                <div class="faq-answer" id="faq-answer-4" style="display: none; padding: 0 20px 20px; line-height: 1.6; color: #555;">
                    Our regular weekly games are for players aged <strong style="color: #e63946;">15 and above</strong>. For younger players, we offer special Youth & School Programs designed for different age groups. Contact us for youth game arrangements and age-specific sessions.
                </div>
            </div>
            
            <!-- Question 5 -->
            <div class="faq-item" style="margin-bottom: 15px; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-left: 5px solid #f23a2e;">
                <div class="faq-question" data-faq="5" style="padding: 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; font-size: 1.1rem; color: #333;">
                    <span>Q5: Can I book a private game for my company/friends?</span>
                    <span class="faq-icon" style="font-size: 1.5rem; transition: transform 0.3s; color: #e63946;">+</span>
                </div>
                <div class="faq-answer" id="faq-answer-5" style="display: none; padding: 0 20px 20px; line-height: 1.6; color: #555;">
                    <strong style="color: #e63946;">Absolutely!</strong> We specialize in private games for corporate events, birthdays, team building, and friend groups. Use our "Private Games" booking form to select your preferred date, time, venue, and number of players. We'll confirm availability and provide a quote within 24 hours.
                </div>
            </div>
            
            <!-- Question 6 -->
            <div class="faq-item" style="margin-bottom: 15px; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border-left: 5px solid #f23a2e;">
                <div class="faq-question" data-faq="6" style="padding: 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; font-size: 1.1rem; color: #333;">
                    <span>Q6: What are the payment options?</span>
                    <span class="faq-icon" style="font-size: 1.5rem; transition: transform 0.3s; color: #e63946;">+</span>
                </div>
                <div class="faq-answer" id="faq-answer-6" style="display: none; padding: 0 20px 20px; line-height: 1.6; color: #555;">
                    We accept cash at the venue, bank transfer, and online payments. For weekly games, payment is made on arrival. For private games and tournaments, a 50% deposit is required upon booking confirmation, with the balance due on the day of the event.
                </div>
            </div>
            
        </div>
        
        <!-- Contact Button -->
        <div style="text-align: center; margin-top: 50px;">
            <a href="/contact" style="display: inline-block; background: #e63946; color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 1.1rem; transition: all 0.3s ease;">
                Still have questions? Contact Us
            </a>
            <p style="margin-top: 15px; color: #666; font-size: 1rem;">
                We typically respond within 24 hours.
            </p>
        </div>
    </div>
    <p class="text-center">
              <a href="{{ route('index') }}" class="btn btn-outline-white py-3 px-5" style="color: #f23a2e; border-color: #f23a2e;">Back</a>
            </p>
</section>

<script>
// Wait for page to load
document.addEventListener('DOMContentLoaded', function() {
    // Get all FAQ question elements
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    // Add click event to each question
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqId = this.getAttribute('data-faq');
            const answer = document.getElementById('faq-answer-' + faqId);
            const icon = this.querySelector('.faq-icon');
            
            // Close all other FAQs
            document.querySelectorAll('.faq-answer').forEach(ans => {
                if (ans.id !== 'faq-answer-' + faqId) {
                    ans.style.display = 'none';
                }
            });
            
            // Reset all other icons
            document.querySelectorAll('.faq-icon').forEach(ic => {
                if (ic !== icon) {
                    ic.textContent = '+';
                    ic.style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current FAQ
            if (answer.style.display === 'block') {
                answer.style.display = 'none';
                icon.textContent = '+';
                icon.style.transform = 'rotate(0deg)';
            } else {
                answer.style.display = 'block';
                icon.textContent = '−';
                icon.style.transform = 'rotate(180deg)';
            }
        });
    });
});
</script>
@endsection