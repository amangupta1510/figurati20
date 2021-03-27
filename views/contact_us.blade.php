@extends('main')

@section('body')

<div id="contact" class="template-page  others ">
  <div id="section-top-countdown-bar" class="section index-section"><div data-section-id="top-countdown-bar" data-section-type="top-countdown-bar" class="top-countdown-bar"> 
  
</div>

</div>  
  
  <div class="shifter-page is-moved-by-drawer" id="PageContainer"> 

<nav class="breadcrumb" aria-label="breadcrumbs">
 <div class="container-bg"> 
  
  <h1>Contact Us</h1>
  <a href="{{ route('index') }}" title="Back to the frontpage">Home</a>

  <span aria-hidden="true" class="breadcrumb__sep">&#47;</span>
  <span>Contact Us</span>

  
 </div>  
</nav>
    
  <main class=" main-content  ">  
  
  <div class="dt-sc-hr-invisible-large"></div>
 
  <div class="wrapper"> 
    <div class="grid-uniform">
      <div class="grid__item">  
        
        <div class="container-bg">
          
          <div class="grid contact-page">

  <div class="grid__item">
    <div id="section-contact" class="section">
<div id="map"><iframe width="960" height="578" style="border:0;overflow:hidden;" src="https://maps.google.co.in/?ie=UTF8&amp;t=m&amp;ll=-37.823006,144.977388&amp;spn=0.02034,0.042915&amp;z=14&amp;output=embed"></iframe> </div>


        
<div class="contact-address">  
  <div class="dt-sc-hr-invisible-large"></div>
  <div class="grid-uniform">
    
    <ul>
      <li class="grid__item wide--one-third post-large--one-third large--one-third">
        <div class="icon-wrapper">
          <div class="icon">
            <i class="fa fa-phone"></i> 
          </div>
           
          <h4>Phone</h4>
          <p>  <b>Toll-Free: </b> 0803 - 080 - 3081 <br><b>Fax: </b> 0803 - 080 - 3082</p><mark></mark> 
          
        </div>
      </li>
      <li class="grid__item wide--one-third post-large--one-third large--one-third">
        <div class="icon-wrapper">
          
          <div class="icon">
            <i class="fa fa-envelope"></i>
          </div>
          <h4>Email</h4>
          <p >  
            <a style="color: #FFFFFF" title="" href="#">buddha@example.com</a><br><a style="color: #FFFFFF" title="" href="#">support@example.com</a>
          </p> 
          
        </div>
      </li>
       
      <li class="address grid__item wide--one-third post-large--one-third large--one-third"> 
        <div class="icon-wrapper">
          <div class="icon">
            <i class="fa fa-location-arrow"></i>
          </div> 
          <h4>Address</h4>
          <p> No: 58 A, East Madison Street,<br /> Baltimore, MD, USA
4508<br /></p><mark></mark> 
        </div>
      </li>
      
    </ul>
    
  </div>
  <div class="dt-sc-hr-invisible-large"></div>

  <div class="contact-form-section">
    <h3 style="color: #FFFFFF" > Contact Form </h3>
    <form method="post" action="{{ route('enquiry') }}" id="contact_form" accept-charset="UTF-8" class="contact-form"><input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />
    @csrf
    
    <label for="ContactFormName" class="label--hidden">Name</label>
    <input type="text" id="ContactFormName" name="name" placeholder="Name" autocapitalize="words" value="" required="">
    <label for="ContactFormEmail" class="label--hidden">Email</label>
    <input type="email" id="ContactFormEmail" name="email" placeholder="Email" autocorrect="off" autocapitalize="off" value="" required="">
    
    <label for="ContactFormSub" class="label--hidden">Phone</label>
    <input type="text" id="ContactFormSub" name="subject" placeholder="Subject" autocapitalize="words" value="" required="">
    <label for="ContactFormMessage" class="label--hidden">Message</label>
    <textarea rows="7" id="ContactFormMessage" name="body" placeholder="Message" required=""></textarea>
    <button type="submit" class="btn">Send</button>
    </form>
  </div>

</div>

<style>

  .contact-address .icon { background: #000000; border-radius:50%;display: inline-block;font-size: 20px;height: 50px;line-height: 50px;margin-bottom: 25px;position: relative;text-align: center;width: 50px;color:#ffffff;}
  .contact-address .icon-wrapper:hover .icon { background: #f89808;color:#ffffff; }
  .contact-address .icon-wrapper:hover h4 { color: #f89808; }
  .contact-address { float:left;width:100%; }
  .contact-address .icon-wrapper:hover { border:1px solid #f89808;}
  .contact-form-section .contact-form {background:rgba(0,0,0,0); }
  .contact-address .social-icons li a:hover { background:;border-color:;}
  .contact-address .icon-wrapper{padding: 30px 10px;border:1px solid #777777;float:left;width:100%;}
  .contact-address h4 { font-size: 24px;text-transform:uppercase;letter-spacing:1px;color:#f89808; }

</style>



</div>

  </div>

</div>

          
        </div>  
        
      </div>
    </div> 
  </div>
    
  </main>  
    

  </div>

  <div class="wrap-overlay"></div>
</div>

    @endsection