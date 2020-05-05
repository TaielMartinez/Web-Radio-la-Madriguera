import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProgramasEditComponent } from './programas-edit.component';

describe('ProgramasEditComponent', () => {
  let component: ProgramasEditComponent;
  let fixture: ComponentFixture<ProgramasEditComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProgramasEditComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProgramasEditComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
