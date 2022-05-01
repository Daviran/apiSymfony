import { Component } from '@angular/core';
import { filter } from 'rxjs';

@Component({
    selector: 'product-list',
    templateUrl: './product-list.component.html'
})
export class ProductListComponent {
    products: any[] = [
        {
            name: "Bottle of Wine",
            id: 1,
            price: 5.55,
            description: "Bottle of wine that there's a lot to know about, Edou grew the grapes & stomped on it himself to create this perfect juice ; you'd know it if you knew Edou because there's nothing he does half way",
            photo: "https://cdn.vinissimus.com/img/unsafe/p385x/plain/local:///prfmtgrande/vi/pochc20_anv800.png"
        },
        {
            name: "Bottol'o'wota",
            id: 2,
            price: .55,
            description: "A bottol'o'wota that's also expensive, wata should be free",
            photo: "https://i.imgflip.com/4wuszv.jpg"
        },
        {
          name: "Spoon of Brogurt",
          id: 3,
          price: 1000,
          description: "Words can't explain the value of this product",
          photo: "https://previews.123rf.com/images/taa22/taa221812/taa22181200100/113838330-yogurt-and-spoon.jpg"  
        }
    ];

    filteredProducts: any[] = this.products;
    showImage: boolean = false;
    _listFilter: string = "";

    get listFilter(): string {
        return this._listFilter;
    }

    set listFilter(value: string) {
        this._listFilter = value;
        // console.log("In setter:", value);
        this.filteredProducts = this.filter(value);
    }

    filter(filterBy: string): any[] {
        filterBy = filterBy.toLocaleLowerCase();
        return this.products.filter((product: any) =>
        product.name.toLocaleLowerCase().includes(filterBy));
    }

    toggleImage(){
        this.showImage = !this.showImage;
    }

   
}