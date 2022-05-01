import { Component } from '@angular/core';

@Component({
    selector: 'product',
    templateUrl: './product.component.html'
})
export class ProductComponent {
    product: any =
        {
            name: "Bottle of Wine",
            id: 1,
            price: 5.55,
            description: "Bottle of wine that there's a lot to know about, Edou grew the grapes & stomped on it himself to create this perfect juice ; you'd know it if you knew Edou because there's nothing he does half way",
            photo: "https://cdn.vinissimus.com/img/unsafe/p385x/plain/local:///prfmtgrande/vi/pochc20_anv800.png"
        };   
}