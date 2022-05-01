import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './login/register.component';
import { OrderListComponent } from './order/order-list.component';
import { OrderComponent } from './order/order.component';
import { ProductListComponent } from './products/product-list.component';
import { ProductComponent } from './products/product.component';

const routes: Routes = [
  { path: "", redirectTo: "products", pathMatch: "full"},
  { path: "products", component: ProductListComponent}, 
  { path: "products/:id", component: ProductComponent},
  { path: "orders", component: OrderListComponent},
  { path: "orders/:id", component: OrderComponent },
  { path: "login", component: LoginComponent },
  { path: "register", component: RegisterComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
