import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CreadoresEditComponent } from './creadores-edit.component';

describe('CreadoresEditComponent', () => {
  let component: CreadoresEditComponent;
  let fixture: ComponentFixture<CreadoresEditComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreadoresEditComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreadoresEditComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
