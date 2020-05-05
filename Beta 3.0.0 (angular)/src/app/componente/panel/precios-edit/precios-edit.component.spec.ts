import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PreciosEditComponent } from './precios-edit.component';

describe('PreciosEditComponent', () => {
  let component: PreciosEditComponent;
  let fixture: ComponentFixture<PreciosEditComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PreciosEditComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PreciosEditComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
