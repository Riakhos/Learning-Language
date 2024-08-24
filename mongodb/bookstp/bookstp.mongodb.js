// MongoDB Playground
// Use Ctrl+Space inside a snippet or a string literal to trigger completions.

// The current database to use.
use('bookstp');

// Create a new document in the collection.
db.getCollection('Auteur').insertMany([
    {Prenom_Auteur :"Victor", Nom_Auteur :"HUGO", Birthday_Auteur :1802},
    {Prenom_Auteur :"Gustave", Nom_Auteur :"FLAUBERT", Birthday_Auteur :1821},
    {Prenom_Auteur :"Emile", Nom_Auteur :"ZOLA", Birthday_Auteur :1840},
    {Prenom_Auteur :"Marcel", Nom_Auteur :"PAGNOL", Birthday_Auteur :1895},
]);
db.getCollection('Livre').insertMany([
    {Title_Livre :"Les Misérables", Descriptif_Livre :"Les Misérables est un roman de Victor Hugo publié en 1862, l’un des plus vastes1 et des plus notables de la littérature du XIXe siècle2. Il décrit la vie de pauvres gens dans Paris et la France provinciale du premier tiers du XIXe siècle, l’auteur s'attachant plus particulièrement au destin du bagnard Jean Valjean ; il a donné lieu à de nombreuses adaptations, au cinéma et sur d’autres supports. C'est un roman historique, social et philosophique dans lequel on retrouve les idéaux du romantisme et ceux de Victor Hugo concernant la nature humaine. La préface résume clairement les intentions de l'auteur : « Tant que les trois problèmes du siècle, la dégradation de l’homme par le prolétariat, la déchéance de la femme par la faim, l’atrophie de l'enfant par la nuit, ne seront pas résolus ; en d’autres termes, et à un point de vue plus étendu encore, tant qu’il y aura sur la terre ignorance et misère, des livres de la nature de celui-ci pourront ne pas être inutiles »."},
    {Title_Livre :"Madame Bovary", Descriptif_Livre :"Madame Bovary. Mœurs de province, couramment abrégé en Madame Bovary, est un roman de Gustave Flaubert paru en 1857 chez Michel Lévy frères, après une préparution en 1856 dans la Revue de Paris. Il s'agit d'une œuvre majeure de la littérature française. L'histoire est celle de l'épouse d'un médecin de province, Emma Bovary, qui lie des relations adultères et vit au-dessus de ses moyens, essayant ainsi d'éviter l’ennui, la banalité et la médiocrité de la vie provinciale. À sa parution, le roman fut attaqué par le procureur de Paris du Second Empire pour immoralité et obscénité. Le procès de Flaubert, commencé en janvier 1857, fit connaître l’histoire en France. Après l'acquittement de l'auteur le 7 février 1857, le roman fut édité en deux volumes le 15 avril 1857 chez Michel Lévy frères. La première édition de 6 750 exemplaires fut un succès instantané : elle fut vendue en deux mois. Il est considéré comme l'un des premiers exemples d'un roman réaliste."},
    {Title_Livre :"Les Rougon-Macquart", Descriptif_Livre :"« Je veux expliquer comment une famille, un petit groupe d'êtres, se comporte dans une société, en s'épanouissant pour donner naissance à dix, à vingt individus qui paraissent, au premier coup d'œil, profondément dissemblables, mais que l'analyse montre intimement liés les uns aux autres. L'hérédité a ses lois, comme la pesanteur114. »"},
    {Title_Livre :"La gloire de mon Père", Descriptif_Livre :"La Gloire de mon père (Français : La Gloire de mon père) est un roman autobiographique de Marcel Pagnol publié en 1957. Sa suite est Le château de ma mère. Il s’agit du premier des quatre volumes de la série Souvenirs d’enfance de Pagnol. C’est aussi un film de 1990 basé sur le roman, et réalisé par Yves Robert."},
]);
db.getCollection('Editeur').insertMany([
    {Name_Editeur :"Albert Lacroix et Cie"},
    {Name_Editeur :"Michel Lévy frères"},
    {Name_Editeur :"Gallimard"},
    {Name_Editeur :"Pastorelly"},
]);
db.getCollection('Magasin').insertMany([
    {Name_Magasin  :"Victor"},
    {Name_Magasin  :"Gustave"},
    {Name_Magasin  :"Emile"},
    {Name_Magasin  :"Marcel"},
]);
db.getCollection('City').insertMany([
    {Name_City :"Besançon"},
    {Name_City :"Rouen"},
    {Name_City :"Paris"},
    {Name_City :"Aubagne"},
]);
db.getCollection('Genre').insertMany([
    {Name_Genre :"Roman"},
    {Name_Genre :"Comédie humaine"},
    {Name_Genre :"Aventure"},
    {Name_Genre :"Romantique"},
]);
db.getCollection('Vendre').insertMany([
    {Sell_Price_Vendre :"Victor"},
    {Sell_Price_Vendre :"Gustave"},
    {Sell_Price_Vendre :"Emile"},
    {Sell_Price_Vendre :"Marcel"},
]);