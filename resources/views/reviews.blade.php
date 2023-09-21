@extends('layouts.master')

@section('content')


            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title mt-5">	
                        <h3>Clients <span class="orange-text">Reviews</span></h3>
                        <p>Welcome to our clients reviews.</p>
                    </div>
                </div>
            </div>

        <!-- contact form -->
            <div class="contact-from-section mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="form-title">
                                <h2>Leave a Comment</h2>
                                
                            </div>
                            <div id="form_status"></div>
                            <div class="contact-form">

                                <form type="POST" id="fruitkha-contact"  action="/addreview">
                                    @csrf()
                                    <p>
                                        <input type="text" placeholder="Name" name="name" id="name">
                                        <input type="email" placeholder="Email" name="email" id="email">
                                    </p>
                                    <p>
                                        <input type="text" placeholder="Subject" name="subject" id="subject">
                                    </p>
                                    <p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Message"></textarea></p>
                                    
                                    <p><input type="submit" value="Submit"></p>
                                </form>
                            </div>
                        </div>
                    
                        <div class="col-lg-4">
                            <div class="contact-form-wrap">
                                <div class="contact-form-box">
                                    <h4><i class="fas fa-map"></i> Shop Address</h4>
                                    <p>Al Ain  <br> Khalifa Street. <br> ROVAN Market</p>
                                </div>
                                <div class="contact-form-box">
                                    <h4><i class="far fa-clock"></i> Shop Hours</h4>
                                    <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                                </div>
                                <div class="contact-form-box">
                                    <h4><i class="fas fa-address-book"></i> Contact</h4>
                                    <p>Phone: +971501372478<br> Email: support@Rovan.com</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <!-- end contact form -->

            <!-- testimonail-section -->
        
            

            <div class="testimonail-section mt-80 mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 text-center">
                            <div class="testimonial-sliders">

                               
                                @foreach ($reviews as $review)                    
                                <div class="single-testimonial-slider">
                                    <div class="client-avater">
                                        <img src="assets/img/avaters/avatar3.png" alt="">
                                    </div>
                                    <div class="client-meta">
                                        <h3>{{$review->name}} <span>{{$review->subject}}</span></h3>
                                        <p class="testimonial-body">
                                            {{$review->comment}}
                                        </p>
                                        <div class="last-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end testimonail-section -->

@endsection