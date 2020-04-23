import { Component, Input, ViewChild, ElementRef, Renderer2 } from '@angular/core';

@Component({
  selector: 'page-loader',
  templateUrl: 'page-loader.html'
})
export class PageLoaderComponent {

  @Input() fill: String;

  @ViewChild('svgLoader') svg: ElementRef;

  constructor(private renderer: Renderer2) {
  }



  ngAfterViewInit() {
    this.renderer.setStyle(this.svg.nativeElement, 'stroke', this.fill);
  }
}
