import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { InfractionDetailsPage } from './infraction-details.page';

const routes: Routes = [
  {
    path: '',
    component: InfractionDetailsPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class InfractionDetailsPageRoutingModule {}
