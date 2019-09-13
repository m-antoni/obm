@extends('layouts.app')

@section('style')
  <link href="{{ asset('/assets/ebooks/jquery.bsPhotoGallery.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
  <div class="row" 
      style="text-align:center; 
      border-bottom:1px dashed #ccc;  
      padding:30px 0 20px 0;
      margin-bottom:40px;">

    <div class="col-lg-12">
      <h4 style="font-family:'Bree Serif', arial; font-weight: normal; font-size: 1.5em;">
          Motivational Photos
      </h4>
    </div>

    <ul class="row first">
        <li>
            <img alt="Rocking the night away"  src="/assets/ebooks/images/quote1.jpg" class="mt-5">
            <p>Sometimes, I wish i was selfish as everyone else, so I can keep you here, all for myself.</p>
        </li>
        <li>
            <img alt="Yellow sign"  src="/assets/ebooks/images/quote2.jpg">
            <p>Make today amazing.</p>
        </li>
        <li>
            <img alt="Colors"  src="/assets/ebooks/images/quote3.jpg">
             <p>It's a good day to be happy.</p>
        </li>
        <li>
            <img alt="Retro party"  src="/assets/ebooks/images/quote4.jpg">
            <p>Broken crayons, still color.</p>
        </li>
        <li>
            <img alt="Technology soup"  src="/assets/ebooks/images/quote5.jpg">
            <p>"You don't love someone for their looks, or their clothes, or for their fancy car, but because they sing a song only you can hear." <br> - Oscar Wilde</p>
        </li>
        <li>
            <img alt="Legal docs"   src="/assets/ebooks/images/quote6.jpg" data-bsp-large-src="http://demo.michaelsoriano.com/images/photodune-916206-legal-large.jpg">
            <p>In the end, only three things matter: how much you loved, how gently you lived, and how gracefully you let go of things not meant for  you. - Buddha</p>
        </li>
        <li>
            <img alt="Nature shot"   src="/assets/ebooks/images/quote7.jpg">
            <p>If we wait until we're ready, we'll be waiting for the rest of our lives.</p>
        </li>
        <li>
            <img alt="Kid with camera"  src="/assets/ebooks/images/quote8.jpg" data-bsp-large-src="http://demo.michaelsoriano.com/images/photodune-1471528-insant-camera-kid-large.jpg">
            <p>I stopped explaining myself when i realized people only understand from their level of perception.</p>
        </li>
        <li>
            <img alt="Relax and Chill" src="/assets/ebooks/images/quote9.jpg">
            <p>It's not about who's real to your faces: It's about who stays loyal behind your back.</p>
        </li>
        <li>
            <img alt="Cool colors" src="/assets/ebooks/images/quote10.jpg">
            <p>Never forget who helped you out while everyone else was making excuses.</p>
        </li>
        <li>
            <img alt="Jump over"  src="/assets/ebooks/images/quote11.jpg">
            <p>
                This is the world’s first ever magnetic resonance image showing a mother and child’s bond.
                The image is of neuroscientist Rebecca Saxe kissing her two month old son.<br>

                The child’s brain appears to be smoother and darker. This is because it has significantly less white matter. White matter is comprised of myelin, which is fatty tissue that acts as insulation for the wires that communicate messages inside your brain.<br>

                Kissing causes a chemical reaction in your brain, including a burst of the hormone oxytocin. Oxytocin is often referred to as the ‘love hormone’ because it stirs up feelings of affection and attachment.<br>

                Kissing activates the brain’s reward system; releasing dopamine which makes us feel good. It also releases vasopressin which bonds mothers with babies and romantic partners to each other. It also releases serotonin which helps to regulate our mood.
            </p>
        </li>
        <li>
            <img alt="Culture business" src="/assets/ebooks/images/quote12.jpg">
            <p>Today is gonna be a good day; and here's why: because today at least you're you.</p>
        </li>
        <li>
            <img alt="Spaghetti bitch" src="/assets/ebooks/images/quote13.jpg">
            <p>Don't stop until your proud.</p>
        </li>
    </ul>
  </div> <!-- /container -->
</div>

@endsection

@section('script')
  <script src="{{asset('/assets/ebooks/jquery.bsPhotoGallery.js')}}"></script>

  <script>
      $(document).ready(function(){
        $('ul.first').bsPhotoGallery({
          "classes" : "col-xl-3 col-lg-2 col-md-4 col-sm-4",
          "hasModal" : true,
          "shortText" : false  
        });
      });
  </script>
  
@endsection