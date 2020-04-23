import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { StepsTabsPage } from './steps-tabs';
import { SuperTabsModule } from 'ionic2-super-tabs';

@NgModule({
  declarations: [
    StepsTabsPage,
  ],
  imports: [
    SuperTabsModule,
    IonicPageModule.forChild(StepsTabsPage),
  ],
})
export class StepsTabsPageModule { }
