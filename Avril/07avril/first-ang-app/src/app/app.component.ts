// Importer la class component

import { Component, OnInit } from '@angular/core';
import { Router} from '@angular/router';

// Définir le décorateur @component({...})
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

// Exporter la class du composant
export class AppComponent implements OnInit {

// Initier le router dans le constructeur du composant
  constructor(
    private router: Router
  ){}

  burgerIsOpen = false;
  // Créer une fonction a appelé au click sur fa-bars
  openBurger(){
    if(this.burgerIsOpen==false){
    // Changer la valeur de burgerIsOpen
    this.burgerIsOpen=true
    }else{
    this.burgerIsOpen=false
    }
  }
  // Créer une fonctino pour fermer le burger menu
  closeBurger(link){
    // Fermer le burger menu
    this.burgerIsOpen=false
    // Naviger vers la bonne vue
    this.router.navigate([link]);
  }

  // Attendre le chargement du contenu
  ngOnInit(){
    console.log('le compossant est chargé')
    // Créer une variable pour selectionner le loader en JS
    let loader= document.getElementById('appLoader')

    // Ajouter la class closedLoader a ma balise
    loader.classList.add('closedLoader');
  }
}

