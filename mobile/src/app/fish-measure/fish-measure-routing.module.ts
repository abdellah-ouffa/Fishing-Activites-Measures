import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FishMeasurePage } from './fish-measure.page';

const routes: Routes = [
  {
    path: '',
    component: FishMeasurePage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class FishMeasurePageRoutingModule {}
