$( function() {
    var availableTags = [
      "Gnocchi Speck Noci e Toma",
      "Fusilli al baffo con guanciale",
      "Zuppa di pesce",
      "Lasagna con noci,primosale e zucchine",
      "Fusilli al pesto di zucchine con salmone",
      "Mezze penne ai carciofi",
      "Trofie al forno con salsiccia besciamella e provola",
      "Spaghettoni alla crema di ricotta e zafferano con guanciale",
      "Penne al arrabbiata con funghi",
      "Pasta alla crema di patate con pecorino e polpo",
      "Zuppa cremosa di ceci",
      "Risotto zucchine e stracchino",
      "Melanzane in carrozza",
      "Allette di pollo alla birra",
      "Filetto di merluzzo in padella",
      "Pesce Spada ai sapori mediterranei",
      "Pesce Spada alla bagnarese",
      "Polpette al sugo di peperoni",
      "Polpette di carciofi con cuore filante",
      "Polpette tonno e patate",
      "Spezzatino alla Borgognona",
      "Uova alla contadina",
      "Involtini di melanzane e pescespada",
      "Involtini primavera",
      "Panettone salato",
      "Girelle sfoglia salate",
      "Rotolo di zucchine con stracchino e prosciutto cotto",
      "Involtini ripieni di salsicci e provolone",
      "Baileys chocolate poke cake",
      "Cioccolata calda bianca",
      "Crema fredda al caffe",
      "Crostata di frutta",
      "Dolcetti con riso soffiato",
      "Gocciolamisu",
      "Pastiera Napoletana",
      "Pistacchiomisu con Nutella",
      "Torta cuore di Mamma",
      "Torta fredda Rocher"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
                                
    });
  } );