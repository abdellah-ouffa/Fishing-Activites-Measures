import { TestBed } from '@angular/core/testing';

import { InfractionService } from './infraction.service';

describe('InfractionService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: InfractionService = TestBed.get(InfractionService);
    expect(service).toBeTruthy();
  });
});
