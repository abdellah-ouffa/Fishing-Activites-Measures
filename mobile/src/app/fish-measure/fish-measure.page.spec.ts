import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { FishMeasurePage } from './fish-measure.page';

describe('FishMeasurePage', () => {
  let component: FishMeasurePage;
  let fixture: ComponentFixture<FishMeasurePage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FishMeasurePage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(FishMeasurePage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
