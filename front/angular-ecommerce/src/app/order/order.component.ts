import { Component } from '@angular/core';

@Component({
    selector:'order',
    templateUrl:'./order.component.html',
})
export class OrderComponent {
    title: string = "Order";
    order: any[] = [
        {
            id: 1 ,
            totalPrice : 42.01 ,
            creationDate : "2021 -04 -01 08:32:00 Z"  ,
            products : [
                {
                id : 1 ,
                name :  "Item 3000" ,
                description : " Best item in the shop !" ,
                photo : "https://path/to/image.png " ,
                price : 13.37
                } ,
                {
                id : 2 ,
                name : " Another item " ,
                description : " Still good " ,
                photo : "https://path/to/image2.png" ,
                price : 28.64
                }
            ]
        }
    ]
}