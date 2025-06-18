<div class="contact">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Contact Us</h2>
             </div>
               @if(session('success'))
                <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('success') }}
                </div>
               @endif
          </div>
       </div>
       <div class="row">
          <div class="col-md-6">
             <form id="request" class="main_form" action="{{url('contact')}}" method="POST">
             @csrf
                <div class="row">
                   <div class="col-md-12 ">
                      <input class="contactus" placeholder="Name" type="type" name="name" required> 
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Email" type="email" name="email" required> 
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Phone Number" type="number" name="phone" required>                          
                   </div>
                   <div class="col-md-12">
                      <textarea class="textarea" placeholder="Message" type="type" name="message" required>Message</textarea>
                   </div>
                   <div class="col-md-12">
                      <button type="submit" class="send_btn">Send</button>
                   </div>
                </div>
             </form>
          </div>
          <div class="col-md-6">
             <div class="map_main">
                <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9999999999995!2d104.9292945!3d11.5532983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095134217cd0ff%3A0xabaabf9531eac955!2sBopha%20Bassac%20Boutique%20Hotel%2C%20street%20number%2009%20Phnom%20Penh%2C%2012240!5e0!3m2!1sen!2skh!4v1698230000000!5m2!1sen!2skh" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>