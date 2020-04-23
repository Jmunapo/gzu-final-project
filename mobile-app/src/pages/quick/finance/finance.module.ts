import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { FinancePage } from './finance';
import { ComponentsModule } from '../../../components/components.module';

@NgModule({
  declarations: [
    FinancePage
  ],
  imports: [
    IonicPageModule.forChild(FinancePage),
    ComponentsModule
  ],
})
export class FinancePageModule { }
