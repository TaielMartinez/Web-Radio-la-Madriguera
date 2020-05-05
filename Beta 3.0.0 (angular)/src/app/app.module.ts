import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

// firebase
import { AngularFireModule } from 'angularfire2'
import { AngularFireDatabaseModule } from 'angularfire2/database'
import { environment } from '../environments/environment';

// COMPONENTES
//inicio
import { InicioComponent } from './componente/inicio/inicio.component';
import { CreadoresComponent } from './componente/inicio/creadores/creadores.component';
import { GrillaComponent } from './componente/inicio/grilla/grilla.component';
import { ProgramasComponent } from './componente/inicio/programas/programas.component';
import { SliderComponent } from './componente/inicio/slider/slider.component';
import { ContactoComponent } from './componente/inicio/contacto/contacto.component';
import { PreciosComponent } from './componente/inicio/precios/precios.component';
import { VivoComponent } from './componente/inicio/vivo/vivo.component';

//login
import { LoginComponent } from './componente/login/login.component';

//panel
import { PanelComponent } from './componente/panel/panel.component';
import { GrillaEditComponent } from './componente/panel/grilla-edit/grilla-edit.component';
import { SliderEditComponent } from './componente/panel/slider-edit/slider-edit.component';
import { ContactoEditComponent } from './componente/panel/contacto-edit/contacto-edit.component';
import { ProgramasEditComponent } from './componente/panel/programas-edit/programas-edit.component';
import { CreadoresEditComponent } from './componente/panel/creadores-edit/creadores-edit.component';
import { PreciosEditComponent } from './componente/panel/precios-edit/precios-edit.component';


// servicios
import { ProgramasService } from './servicios/programas.service';
import { NavegacionComponent } from './componente/navegacion/navegacion.component';
import { TarjetaProgramaComponent } from './componente/inicio/programas/tarjeta-programa/tarjeta-programa.component'

@NgModule({
  declarations: [
    AppComponent,
    InicioComponent,
    CreadoresComponent,
    GrillaComponent,
    ProgramasComponent,
    SliderComponent,
    ContactoComponent,
    PreciosComponent,
    LoginComponent,
    PanelComponent,
    GrillaEditComponent,
    SliderEditComponent,
    ContactoEditComponent,
    ProgramasEditComponent,
    CreadoresEditComponent,
    PreciosEditComponent,
    VivoComponent,
    NavegacionComponent,
    TarjetaProgramaComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    AngularFireModule.initializeApp(environment.firebaseConfig),
    AngularFireDatabaseModule
  ],
  providers: [
    ProgramasService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
