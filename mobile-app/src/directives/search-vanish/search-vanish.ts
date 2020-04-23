import { Directive, Input, Renderer2 } from '@angular/core';
import { DomController } from 'ionic-angular/platform/dom-controller';



@Directive({
  selector: '[search-vanish]', // Attribute selector
})
export class SearchVanishDirective {

  @Input('searchElem') searchElem: HTMLDivElement;
  @Input('scrollContent') scrollContent: HTMLDivElement;

  lastVal: number = 0;
  lastScrollPosition: number;


  constructor(private renderer: Renderer2, private domCtrl: DomController) {

  }


  ngOnInit() {
    if (this.searchElem) {
      this.renderer.setStyle(this.searchElem, 'webkitTransition', 'margin-top-top 700ms');
      this.renderer.setStyle(this.scrollContent, 'webkitTransition', 'margin-top 700ms');
    }
    this.renderer.listen(this.scrollContent, 'scroll', (e) => {
      this.contentScrolled(this.scrollContent);
    });
  }


  contentScrolled(ev) {
    this.domCtrl.read(() => {
      let scrollDir = (ev.scrollTop > this.lastVal);
      this.lastVal = ev.scrollTop;
      if (scrollDir) {
        this.renderer.setStyle(this.searchElem, "margin-top", "-58px")
        this.renderer.setStyle(this.scrollContent, "margin-top", "0px")
      } else {
        this.renderer.setStyle(this.searchElem, "margin-top", "0px");
        this.renderer.setStyle(this.scrollContent, "margin-top", "0px");
      }
    });

  }

}
