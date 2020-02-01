import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { AnnexeListPage } from './annexe-list.page';

describe('AnnexeListPage', () => {
  let component: AnnexeListPage;
  let fixture: ComponentFixture<AnnexeListPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AnnexeListPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(AnnexeListPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
