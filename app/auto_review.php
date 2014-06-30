<?php
include 'init.php';


$title = array(
	'Super produit !',
	'Le produit et top, mais pas la livraison',
	'remboursé!',
	'à recommander!! mais attention quand même',
	'Ma première review'
);

$content = array(
	"C'est le deuxième Galaxy S4 mini que je commande chez Amazon (enfin chez leurs revendeurs : ElectroGearDE et Kontramobile).
Attention car ces revendeurs doivent avoir une série de S4 mini qui possèdent un bug très génant. Mes deux S4mini ont eu ce bug et j'ai du les renvoyer. Heureusement qu' Amazon est SUPER sérieux pour ce qui est du retour et du remboursement. Je les félicite pour ça !!
Le bug est le suivant : Le téléphone se bloque environ 5min après avoir été chargé et débranché du secteur. Obligé de le redémarrer. Et durant une longue charge, certaines applications système ne fonctionnent plus : exemple du reveil qui ne sonne pas quand le téléphone est branché plus de 2h sur secteur (couramment la nuit ..). Au bout de trois S4 mini (le premier commandé chez Pixmania), je suis contraint d’arrêter avec ce modèle la.. Dommage car en dehors de ce bug, c'est un super téléphone. La taille est parfaite mais bon... Je vais passer sur Galaxy S3 (toujours chez Amazon bien entendu car c'est les meilleurs !!!! par contre, ils devraient peut être faire attention à la qualité des produits vendus par leurs revendeurs...)",
	"J'ai acheté un S4 MINI sur le site Amazon.fr, le produit m'a été expédié par le revendeur SO COOL. Livré par DHL en provenance de Hong-Kong. J'ai trouvé bizarre que le produit vienne de Chine.

Le téléphone est arrivé dans les délais ( il est arrivé chez ma belle mère, car j'habite dans les DOM-TOM, mon beau-frère a ouvert la boîte et a trouvé le téléphone étrange...)

1 semaine plus tard, je réceptionne le téléphone et même sensation, je ne trouve pas la même fluidité que mon Galaxy S4.",
	"j ai achete un peu plus cher le s4 mini non import et je me retrouve avec un appareil destine a l italie avec l impossiblite a ce jour de mettre a jour la 4 g free",
	"Je soupçonne une contre façon concernant le Samsung S4 Mini. En effet, hormis le fait qu'il ne tenait pas la charge et donc qu'il était inutilisable, le M de Samsung au dos de l'appareil s'est décollé. Enfin, il n'avait pas le même design que celui acheté chez un opérateur en boutique quelques jours après. Lolo",
	"J'ai acheté le S4 Mini noir il y a une semaine et j'en suis entièrement satisfait! Il fonctionne parfaitement, il est extrêmement fluide et esthétiquement je le trouve très réussi. Il fait beaucoup moins cheap que le S3. Je trouvais le S3 et le S4 trop grands et le S3 Mini pas assez puissant. Mais le S4 Mini est juste parfait pour l'utilisation que j'en fais. Il a la taille idéale. Les photos sont de très bonne qualité pour ce type de téléphone. Il ne rame pas du tout.
Attention tout de même certains gadgets qui font la particularité du S4 ne sont pas sur ce S4 Mini et c'est le seul point négatif à mon goût: Air View, Air Gesture (le fait d’interagir avec l'écran sans le toucher), Multi Windows, Smart Scroll et Smart Pause (les gadget qui détectent les mouvement des yeux) ne sont pas disponibles. Après il suffit d'aller sur Youtube pour voir les différences entre le S4 et le S4 Mini.
Je suis donc entièrement satisfait de mon achat."
);

$date = array(
	"2014-05-28 00:00:00",
	"2014-04-28 00:00:00",
	"2014-03-28 00:00:00",
	"2014-06-28 12:00:00",
	"2014-06-28 09:00:00"
);


for($i=0;$i<50;$i++) {
	$review = new Review();
	$review->setIdUser(rand(1, 3))
			->setIdProduct(rand(300, 9000))
			->setRate(rand(0, 5))
			->setPublication(rand(1, 3))
			->setDate($date[array_rand($date, 1)])
			->setTitle($title[array_rand($title, 1)])
			->setContent($content[array_rand($content, 1)])
			->save();
}