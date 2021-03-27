@extends('main')

@section('body')

<div id="contact" class="template-page  others ">
  <div id="section-top-countdown-bar" class="section index-section"><div data-section-id="top-countdown-bar" data-section-type="top-countdown-bar" class="top-countdown-bar"> 
  
</div>

</div>  
  
  <div class="shifter-page is-moved-by-drawer" id="PageContainer"> 

<nav class="breadcrumb" aria-label="breadcrumbs">
 <div class="container-bg"> 
  
  <h1>DMCA POLICY</h1>
  <a href="{{ route('index') }}" title="Back to the frontpage">Home</a>

  <span aria-hidden="true" class="breadcrumb__sep">&#47;</span>
  <span>DMCA Policy</span>

  
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
        
<div class="contact-address">  

  <div class="contact-form-section">
    <h5 style="color: #e6bf55; align-self: center; ">Digital Millennium Copyright Act (DMCA) is a United States copyright law that allows specific files to be removed by their owners if they are being used without proper permission. In order to file a complaint, connect with us and we will respond you in 24 hours.</h5>
    <br>
    <h5 style="color: #e6bf55; align-self: center; font-size: 16px; ">Email us on <a href="mailto:secretarial@figurati20.com" style="color:#87CEFA;">secretarial@figurati20.com</a> or contact us by given below form.</h5>

    <br> 
    <h3 style="color: #FFFFFF" > Contact US </h3>
    <form method="post" action="{{ route('dmca_submit') }}" id="contact_form" accept-charset="UTF-8" class="contact-form"><input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />
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