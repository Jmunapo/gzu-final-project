import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ReadNewsPage } from './read-news';

@NgModule({
  declarations: [
    ReadNewsPage,
  ],
  imports: [
    IonicPageModule.forChild(ReadNewsPage),
  ],
})
export class ReadNewsPageModule {}
