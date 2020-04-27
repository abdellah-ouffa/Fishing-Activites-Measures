import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { FishDetailsPageRoutingModule } from './fish-details-routing.module';

import { FishDetailsPage } from './fish-details.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    FishDetailsPageRoutingModule
  ],
  declarations: [FishDetailsPage]
})
export class FishDetailsPageModule {}
