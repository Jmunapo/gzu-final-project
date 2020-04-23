import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { NewsEventsPage } from './news-events';
import { ComponentsModule } from '../../../components/components.module';

@NgModule({
  declarations: [
    NewsEventsPage,
  ],
  imports: [
    IonicPageModule.forChild(NewsEventsPage),
    ComponentsModule
  ],
})
export class NewsEventsPageModule { }
