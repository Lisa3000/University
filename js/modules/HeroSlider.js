import $ from 'jquery';

class HeroSlider {
  constructor() {
   // this.sliderBtn1 = $("#slick-slide-control00");
    this.els = $(".hero-slider");
    this.initSlider();
  }

  initSlider() {
    this.els.slick({
      autoplay: true,
      arrows: false,
      lazyLoad: 'ondemand',
      dots: true
    });

    let text1 = "Transportation";

    //this.sliderBtn1.html(text1);
  }
}

export default HeroSlider;