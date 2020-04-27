import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FishDetailsPage } from './fish-details.page';

const routes: Routes = [
  {
    path: '',
    component: FishDetailsPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class FishDetailsPageRoutingModule {}
