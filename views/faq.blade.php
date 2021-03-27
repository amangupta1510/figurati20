@extends('main')


@section('body')



<nav class="breadcrumb" aria-label="breadcrumbs">
 <div class="container-bg"> 
  
  <h1>Faq</h1>
  <a href="{{ route('index') }}" title="Back to the frontpage">Home</a>

  <span aria-hidden="true" class="breadcrumb__sep">&#47;</span>
  <span>Faq</span>

  
 </div>  
</nav>
    
  <main class=" main-content  ">  
  
  <div class="dt-sc-hr-invisible-large"></div>     
    
  <div class="wrapper"> 
    <div class="grid-uniform">
      <div class="grid__item">  
        
        <div class="container-bg">
          
          <div id="section-faqs" class="section">

<div class="container">
  <div class="grid__item shortcodes-section">
    
      <!--dt-sc-toggle-frame-set starts-->
      <div class="dt-sc-toggle-frame-set">
                  
          <h5 class="dt-sc-toggle-accordion active" style="display:block; color:#f89808; "><a class="dt-sc-toggle-accordion-a" href="#">How will my order be delivered to me?</a></h5>
          <div class="dt-sc-toggle-content " style="display:block;">
            <div class="dt-sc-block">
              <b>Answer :</b><br>
***************** ***************** ********************* ****************** **************** ***************** ********** ******* *********** **************            </div>
          </div>        
                  
          <h5 class="dt-sc-toggle-accordion active" style="display:block; color:#f89808;"><a class="dt-sc-toggle-accordion-a" href="#">what do I need to know?</a></h5>
          <div class="dt-sc-toggle-content " >
            <div class="dt-sc-block">
              <b>Answer :</b><br>
***************** ***************** ********************* ****************** **************** ***************** ********** ******* *********** **************
            </div>
          </div>        
                  
          <h5 class="dt-sc-toggle-accordion active" style="display:block; color:#f89808;"><a class="dt-sc-toggle-accordion-a" href="#">How will I know if order is placed successfully?</a></h5>
          <div class="dt-sc-toggle-content " >
            <div class="dt-sc-block">
              <b>Answer :</b><br>
***************** ***************** ********************* ****************** **************** ***************** ********** ******* *********** **************
            </div>
          </div>        
                  
          <h5 class="dt-sc-toggle-accordion active" style="display:block; color:#f89808;"><a class="dt-sc-toggle-accordion-a" href="#">How do I check the status of my order?</a></h5>
          <div class="dt-sc-toggle-content " >
            <div class="dt-sc-block">
              <b>Answer :</b><br>
***************** ***************** ********************* ****************** **************** ***************** ********** ******* *********** **************
            </div>
          </div>        
                  
          <h5 class="dt-sc-toggle-accordion active" style="display:block; color:#f89808;"><a class="dt-sc-toggle-accordion-a" href="#">Can I cancel my order?</a></h5>
          <div class="dt-sc-toggle-content " >
            <div class="dt-sc-block">
              <b>Answer :</b><br>
***************** ***************** ********************* ****************** **************** ***************** ********** ******* *********** **************
            </div>
          </div>        
                  
          <h5 class="dt-sc-toggle-accordion active" style="display:block; color:#f89808;"><a class="dt-sc-toggle-accordion-a" href="#">Do you allow exchanges?</a></h5>
          <div class="dt-sc-toggle-content " >
            <div class="dt-sc-block">
              <b>Answer :</b><br>
***************** ***************** ********************* ****************** **************** ***************** ********** ******* *********** **************
            </div>
          </div>        
                  
          <h5 class="dt-sc-toggle-accordion active" style="display:block; color:#f89808;"><a class="dt-sc-toggle-accordion-a" href="#">What are the shipping charges?</a></h5>
          <div class="dt-sc-toggle-content  last" >
            <div class="dt-sc-block">
              <b>Answer :</b><br>
***************** ***************** ********************* ****************** **************** ***************** ********** ******* *********** **************
            </div>
          </div>        
                   
    </div>     
  
</div>
</div>
<div class="dt-sc-hr-invisible-medium"></div>





</div>


          
        </div>  
        
      </div>
    </div> 
  </div>
    
  </main>  

  @endsection

  @section('js')

  <script type="text/javascript">
  $(document).ready(function(){
 $('.dt-sc-toggle-accordion').on("click",function() {
 	$('.dt-sc-toggle-accordion-a').css('color','#f89808');
 	$('.dt-sc-toggle-accordion').css('color','#f89808');
  
});
});
</script>


  @endsection