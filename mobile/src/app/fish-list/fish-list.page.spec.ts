import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { FishListPage } from './fish-list.page';

describe('FishListPage', () => {
  let component: FishListPage;
  let fixture: ComponentFixture<FishListPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FishListPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(FishListPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
