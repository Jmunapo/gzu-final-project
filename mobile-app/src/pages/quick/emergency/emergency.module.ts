import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { EmergencyPage } from './emergency';
import { ComponentsModule } from '../../../components/components.module';

@NgModule({
  declarations: [
    EmergencyPage,
  ],
  imports: [
    IonicPageModule.forChild(EmergencyPage),
    ComponentsModule
  ],
})
export class EmergencyPageModule { }
