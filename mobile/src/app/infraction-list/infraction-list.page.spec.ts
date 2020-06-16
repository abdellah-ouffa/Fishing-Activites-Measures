import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { InfractionListPage } from './infraction-list.page';

describe('InfractionListPage', () => {
  let component: InfractionListPage;
  let fixture: ComponentFixture<InfractionListPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ InfractionListPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(InfractionListPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
