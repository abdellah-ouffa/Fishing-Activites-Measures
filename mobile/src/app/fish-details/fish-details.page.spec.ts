import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { FishDetailsPage } from './fish-details.page';

describe('FishDetailsPage', () => {
  let component: FishDetailsPage;
  let fixture: ComponentFixture<FishDetailsPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FishDetailsPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(FishDetailsPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
