import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { GalleryPage } from './gallery';
import { ComponentsModule } from '../../../components/components.module';
import { IonicImageLoader } from 'ionic-image-loader';
import { IonicImageViewerModule } from 'ionic-img-viewer';

@NgModule({
  declarations: [
    GalleryPage,
  ],
  imports: [
    ComponentsModule,
    IonicImageLoader,
    IonicImageViewerModule,
    IonicPageModule.forChild(GalleryPage),
  ],
})
export class GalleryPageModule { }
