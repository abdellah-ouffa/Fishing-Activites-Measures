import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { FishMeasurePageRoutingModule } from './fish-measure-routing.module';

import { FishMeasurePage } from './fish-measure.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    FishMeasurePageRoutingModule
  ],
  declarations: [FishMeasurePage]
})
export class FishMeasurePageModule {}
