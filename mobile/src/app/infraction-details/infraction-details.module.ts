import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { InfractionDetailsPageRoutingModule } from './infraction-details-routing.module';

import { InfractionDetailsPage } from './infraction-details.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    InfractionDetailsPageRoutingModule
  ],
  declarations: [InfractionDetailsPage]
})
export class InfractionDetailsPageModule {}
