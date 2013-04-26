cartes = ["cle", "livre", "astres", "crapaud", "eau", "vent", "longuevue", "oiseaux", "jardin", "chien", "etoilefemme", "cadeaux", "horoscope", "honneur", "chateau", "plan", "pyramide", "etoilehomme", "corneabondance", "diable", "medaille", "chauvesouris","grimoire", "aiglecouronne", "tourfoudre", "oiseauile", "serpent", "enchaine", "coeursblesses", "amphore", "lyre", "fleurroyale", "lanterne", "hache", "deuxcoeurs", "torche", "trompette", "famille", "comete", "epees", "autel", "chouette", "caducee", "roueorniere", "mendiante", "etoilemage", "temps", "colombe", "ruine", "iledeserte"];

//0 = texte par d&eacute;faut, 1-4 = position de la carte tir&eacute;e
corneabondance = new Array(5);
corneabondance[0] = "N&deg;19 La corne d&rsquo;abondance<br />L&rsquo;argent, les placements ou les gains sont favoris&eacute;s, les avantages sont aussi spirituels ou intellectuels. Si vous avez bien sem&eacute;, vous aurez une bonne r&eacute;colte.";
corneabondance[1] = "";
corneabondance[2] = "";
corneabondance[3] = "";
corneabondance[4] = "";

temps = new Array(5);
temps[0] = "N&deg;48 Le temps<br />Acceptez que les choses ont une fin, ne vous ent&ecirc;tez pas, vous risqueriez de perdre des forces que vous ne pourriez pas reconstituer, parfois la fatalit&eacute; a du bon.";
temps[1] = "";
temps[2] = "";
temps[3] = "";
temps[4] = "";

etoilemage = new Array(5);
etoilemage[0] = "N&deg;45 L&rsquo;&eacute;toile des mages<br />Les temps vont devenir bien plus heureux, le bonheur s&rsquo;installe sachez l&rsquo;apprivoiser et le garder, le bien-&ecirc;tre est volatile et fragile.";
etoilemage[1] = "";
etoilemage[2] = "";
etoilemage[3] = "";
etoilemage[4] = "";

colombe = new Array(5);
colombe[0] = "N&deg;49 La colombe<br />Cette lame augure du changement, des revirements en votre faveur, ils seront inesp&eacute;r&eacute;s. Si vous savez faire des vœux, alors ils seront exhauc&eacute;s.";
colombe[1] = "";
colombe[2] = "";
colombe[3] = "";
colombe[4] = "";

ruine = new Array(5);
ruine[0] = "N&deg;50 Les ruines<br />P&eacute;riode difficile en vue, un bon conseil de l&rsquo;oracle, ne persistez pas, revoyez vos m&eacute;thodes et vos bases, sinon c&rsquo;est le d&eacute;p&eacute;rissement et l&rsquo;&eacute;chec assur&eacute;s.";
ruine[1] = "";
ruine[2] = "";
ruine[3] = "";
ruine[4] = "";

iledeserte = new Array(5);
iledeserte[0] = "N&deg;47 L&rsquo;ile d&eacute;serte<br />Comme cette lame l&rsquo;indique rien ne pousse, rien ne prend forme, toute tentative est vou&eacute;e &Agrave; l&rsquo;&eacute;chec, la voie que vous voulez prendre m&egrave;ne nulle part.";
iledeserte[1] = "";
iledeserte[2] = "";
iledeserte[3] = "";
iledeserte[4] = "";

mendiante = new Array(5);
mendiante[0] = "N&deg;46 La mendiante<br />Signe de malchance r&eacute;p&eacute;t&eacute;e, elle r&ocirc;de sans cesse autour de vous et vos actions, laissez la passer, ne faites rien, attendez une p&eacute;riode plus cl&eacute;mente.";
mendiante[1] = "";
mendiante[2] = "";
mendiante[3] = "";
mendiante[4] = "";

roueorniere = new Array(5);
roueorniere[0] = "N&deg;51 La roue dans l&rsquo;orni&egrave;re<br />Situation de blocage, les projets et les actions s&rsquo;enlisent, quoi que vous fassiez, beaucoup d&rsquo;h&eacute;sitation autour de vous. Alors ne faites rien!";
roueorniere[1] = "";
roueorniere[2] = "";
roueorniere[3] = "";
roueorniere[4] = "";

caducee = new Array(5);
caducee[0] = "N&deg;23 Le caduc&eacute;e<br />L&rsquo;argent et les placements financiers, sont en mouvement, mais il est possible aussi que les choses bougent et se n&eacute;gocient dans d&rsquo;autres domaines.";
caducee[1] = "";
caducee[2] = "";
caducee[3] = "";
caducee[4] = "";

chouette = new Array(5);
chouette[0] = "N&deg;42 La chouette<br />Elle voit la nuit, l&Agrave; ou les autres ne voient pas, elle vous donnera prudence, r&eacute;flexion et votre vision des choses sera plus claire, un bon atout pour l&rsquo;avenir.";
chouette[1] = "";
chouette[2] = "";
chouette[3] = "";
chouette[4] = "";

autel = new Array(5);
autel[0] = "N&deg;27 L&rsquo;autel<br />Symbole de l&rsquo;union, cette lame nous r&eacute;v&egrave;le qu'une liaison verra le jour, cela peut-&ecirc;tre aussi une association, l&rsquo;union fait la force tout le monde le sait.";
autel[1] = "";
autel[2] = "";
autel[3] = "";
autel[4] = "";

epees = new Array(5);
epees[0] = "N&deg;33 Les deux &eacute;p&eacute;es<br />Un dialogue de sourd et le maintien de ses positions envers et contre tout n&rsquo;est peut-&ecirc;tre pas la solution, un mauvais arrangement vaut mieux qu&rsquo;un bon proc&egrave;s.";
epees[1] = "";
epees[2] = "";
epees[3] = "";
epees[4] = "";

comete = new Array(5);
comete[0] = "N&deg;24 La com&egrave;te<br />Vous allez recevoir des nouvelles ou des messages, par courrier ou par t&eacute;l&eacute;phone, possibilit&eacute; d&rsquo;une grosse surprise, quelque chose d&rsquo;inattendu.";
comete[1] = "";
comete[2] = "";
comete[3] = "";
comete[4] = "";

famille = new Array(5);
famille[0] = "N&deg;28 La famille<br />Les relations familiales seront au c&oelig;ur de vos pr&eacute;occupations, profitez d'un moment de libert&eacute; pour organiser une r&eacute;union en famille, cela sera de bon augure.";
famille[1] = "";
famille[2] = "";
famille[3] = "";
famille[4] = "";

trompette = new Array(5);
trompette[0] = "N&deg;43 La trompette<br />Vous serez propuls&eacute; sur le devant de la sc&egrave;ne, Vous serez appr&eacute;ci&eacute;, et on vous regardera avec respect, c&rsquo;est une bonne p&eacute;riode pour s&rsquo;&eacute;lever.";
trompette[1] = "";
trompette[2] = "";
trompette[3] = "";
trompette[4] = "";

torche = new Array(5);
torche[0] = "N&deg;37 La torche<br />Mettez le feu et ne vous souciez pas du reste, il sera bien temps par la suite, il faudra agir avec spontan&eacute;it&eacute;. Votre ardeur jouera pour vous.";
torche[1] = "";
torche[2] = "";
torche[3] = "";
torche[4] = "";

deuxcoeurs = new Array(5);
deuxcoeurs[0] = "N&deg;29 Les deux cœurs<br />Regardez les sentiments et voyez comme l&rsquo;amour peut-&ecirc;tre fort, tout est l&Agrave;, prenez en conscience et laissez votre cœur vous diriger.";
deuxcoeurs[1] = "";
deuxcoeurs[2] = "";
deuxcoeurs[3] = "";
deuxcoeurs[4] = "";

hache = new Array(5);
hache[0] = "N&deg;26 La hache aux faisceaux<br />L&rsquo;apaisement sera pr&eacute;sent: des arrangements et une concorde am&egrave;ne la paix et la s&eacute;r&eacute;nit&eacute;, profitez de cette p&eacute;riode pour vous ressourcer.";
hache[1] = "";
hache[2] = "";
hache[3] = "";
hache[4] = "";

lanterne = new Array(5);
lanterne[0] = "N&deg;32 La lanterne<br />Cette lame vous informe qu&rsquo;une personne de votre entourage, n&rsquo;est pas en accord avec vous et vous jalouse, elle manigance en coulisse, donc m&eacute;fiance !";
lanterne[1] = "";
lanterne[2] = "";
lanterne[3] = "";
lanterne[4] = "";


fleurroyale = new Array(5);
fleurroyale[0] = "N&deg;40 La fleur royale<br />Tr&egrave;s bonne lame pour votre avenir, car elle vous pr&eacute;dit facilit&eacute;, flamboyance et aisance dans la r&eacute;alisation de vos entreprises qui seront men&eacute;es &Agrave; bien.";
fleurroyale[1] = "";
fleurroyale[2] = "";
fleurroyale[3] = "";
fleurroyale[4] = "";

lyre = new Array(5);
lyre[0] = "N&deg;25 La lyre<br />Une p&eacute;riode ou le plaisir et les distractions seront mis en avant ou qu&rsquo;il faudra mettre en avant, telle est le conseil de cette lame, c&rsquo;est un bon conseil.";
lyre[1] = "";
lyre[2] = "";
lyre[3] = "";
lyre[4] = "";

amphore = new Array(5);
amphore[0] = "N&deg;30 L&rsquo;Amphore<br />Il est temps d&rsquo;inviter et de partager, la convivialit&eacute; sera pour vous et dans tous les domaines un atout non n&eacute;gligeable. Sortez de votre coquille.";
amphore[1] = "";
amphore[2] = "";
amphore[3] = "";
amphore[4] = "";

coeursblesses = new Array(5);
coeursblesses[0] = "N&deg;31 Les cœurs bless&eacute;s<br />Si vous voulez &eacute;viter les d&eacute;boires, il serait bon de ne pas trop vous emballer, car il est probable que cela ressemble &Agrave; un feu de paille.";
coeursblesses[1] = "";
coeursblesses[2] = "";
coeursblesses[3] = "";
coeursblesses[4] = "";

enchaine = new Array(5);
enchaine[0] = "N&deg;34 L&rsquo;enchain&eacute;<br />Vous ne serez plus maître de vos d&eacute;cisions et de vos actes, attention &Agrave; vos engagements et ne marchez pas &Agrave; l&rsquo;aveuglette, les mirages peuvent &ecirc;tre trompeurs.";
enchaine[1] = "";
enchaine[2] = "";
enchaine[3] = "";
enchaine[4] = "";

serpent = new Array(5);
serpent[0] = "N&deg;35 Le glaive et le serpent<br />Cette lame vous avertit que des ennemis peuvent s&rsquo;en prendre &Agrave; vous et cela dans tous les domaines, violence possible virtuelle ou non.";
serpent[1] = "";
serpent[2] = "";
serpent[3] = "";
serpent[4] = "";

oiseauile = new Array(5);
oiseauile[0] = "N&deg;36 Les oiseaux des iles<br />Vous entrez dans une p&eacute;riode ou il faudra discuter, expliquez vos id&eacute;es, faites le du mieux que vous pourrez, c&rsquo;est important pour la suite.";
oiseauile[1] = "";
oiseauile[2] = "";
oiseauile[3] = "";
oiseauile[4] = "";

tourfoudre = new Array(5);
tourfoudre[0] = "N&deg;38 La tour foudroy&eacute;e<br />Vous pourriez essuyer des revers importants dans vos projets ou plus simplement l&rsquo;effondrement de vos esp&eacute;rances. Redoublez de prudence.";
tourfoudre[1] = "";
tourfoudre[2] = "";
tourfoudre[3] = "";
tourfoudre[4] = "";

aiglecouronne = new Array(5);
aiglecouronne[0] = "N&deg;39 L&rsquo;aigle couronn&eacute;<br />Une personne lucide et protectrice devrait faire son apparition, elle vous apportera une aide tr&egrave;s pr&eacute;cieuse dans votre projet ou dans votre vie.";
aiglecouronne[1] = "";
aiglecouronne[2] = "";
aiglecouronne[3] = "";
aiglecouronne[4] = "";

grimoire = new Array(5);
grimoire[0] = "N&deg;41 Le grimoire<br />La lame des h&eacute;ritages et de dons, attendez vous &Agrave; h&eacute;riter de quelque chose, pas obligatoirement financier, cela peut-&ecirc;tre aussi spirituel ou oral.";
grimoire[1] = "";
grimoire[2] = "";
grimoire[3] = "";
grimoire[4] = "";


cle = new Array(5);
cle[0] = "N&deg;1 La clef<br />Il est pressant de prendre des d&eacute;cisions, mais bien-sur vous aurez le choix: lesquels? Prenez en compte les autres lames du tirage pour suivre votre chemin.";
cle[1] = "";
cle[2] = "";
cle[3] = "";
cle[4] = "";

chauvesouris = new Array(5);
chauvesouris[0] = "N&deg;21 La chauve-souris<br />Tromperie et abus rodent autour de vous, restez &eacute;veiller. Observez et &eacute;tudiez toutes propositions qui vous seraient faites, pour ne pas &ecirc;tre pi&eacute;g&eacute;.";
chauvesouris[1] = "";
chauvesouris[2] = "";
chauvesouris[3] = "";
chauvesouris[4] = "";

medaille = new Array(5);
medaille[0] = "N&deg;5 La m&eacute;daille<br />Une r&eacute;compense pour les efforts fournis, une &eacute;l&eacute;vation ou la r&eacute;ussite vous attend, en tous les cas: ça monte ça monte c&rsquo;est bon signe enfin !";
medaille[1] = "";
medaille[2] = "";
medaille[3] = "";
medaille[4] = "";

diable = new Array(5);
diable[0] = "N&deg;11 Le diable<br />Pr&ecirc;tez attention &Agrave; votre entourage, la trahison, la tromperie ou la jalousie ne sont peut &ecirc;tre pas loin, mais aussi de la malchance et des obstacles insurmontables.";
diable[1] = "";
diable[2] = "";
diable[3] = "";
diable[4] = "";

etoilehomme = new Array(5);
etoilehomme[0] = "N&deg;2 L&rsquo;&eacute;toile de l&rsquo;homme<br />Regardez si c&rsquo;est vous, ou si ce n&rsquo;est pas vous: un homme est pr&eacute;sent et pourrait jouer un r&ocirc;le important dans la question que vous venez de poser.";
etoilehomme[1] = "";
etoilehomme[2] = "";
etoilehomme[3] = "";
etoilehomme[4] = "";

pyramide = new Array(5);
pyramide[0] = "N&deg;6 La pyramide<br />Ne lâchez pas prise cette lame vous indique, une am&eacute;lioration et un grand progr&egrave;s, alors courage, la patience sera, pour vous, votre meilleure alli&eacute;e.";
pyramide[1] = "";
pyramide[2] = "";
pyramide[3] = "";
pyramide[4] = "";

plan = new Array(5);
plan[0] = "N&deg;22 Le Plan<br />Pr&eacute;parez vous &Agrave; de nouveaux projets, ou &Agrave; des n&eacute;gociations, ils peuvent toucher de nombreux domaine de la vie, sentimentale, financi&egrave;re, ou professionnelle.";
plan[1] = "";
plan[2] = "";
plan[3] = "";
plan[4] = "";

chateau = new Array(5);
chateau[0] = "N&deg;16 Le château<br />Retourner vers vos racines peut vous &ecirc;tre b&eacute;n&eacute;fique et salutaire. Votre foyer, votre maison seront d&rsquo;une grande aide et assurent une stabilit&eacute;, ne les n&eacute;gligez pas.";
chateau[1] = "";
chateau[2] = "";
chateau[3] = "";
chateau[4] = "";

honneur = new Array(5);
honneur[0] = "N&deg;7 L&rsquo;honneur<br />Vous allez &ecirc;tre reconnu pour votre vraie valeur, que ce soit pour votre moralit&eacute; ou vos comp&eacute;tences on va parler de vous et en bien.";
honneur[1] = "";
honneur[2] = "";
honneur[3] = "";
honneur[4] = "";

horoscope = new Array(5);
horoscope[0] = "N&deg;4 L&rsquo;Horoscope<br />Un &eacute;v&eacute;nement va se produire c&rsquo;est certain, nouvelles rencontres, nouveaux projets, ou une solution est trouv&eacute;e, et peut &ecirc;tre une nouvelle que l&rsquo;on n&rsquo;attendait pas.";
horoscope[1] = "";
horoscope[2] = "";
horoscope[3] = "";
horoscope[4] = "";

cadeaux = new Array(5);
cadeaux[0] = "N&deg;10 Les pr&eacute;sents<br />L&rsquo;heure est aux gratifications, cadeaux et attentions d&eacute;licates en tout genre, et oui! Des personnes pensent &Agrave; vous et vont vous le faire savoir.";
cadeaux[1] = "";
cadeaux[2] = "";
cadeaux[3] = "";
cadeaux[4] = "";

etoilefemme = new Array(5);
etoilefemme[0] = "N&deg;3 L&rsquo;&eacute;toile de la femme<br />Regardez si c&rsquo;est vous, ou si ce n&rsquo;est pas vous: une femme est pr&eacute;sente et pourrait jouer un r&ocirc;le consid&eacute;rable dans la question que vous venez de poser.";
etoilefemme[1] = "";
etoilefemme[2] = "";
etoilefemme[3] = "";
etoilefemme[4] = "";

chien = new Array(5);
chien[0] = "N&deg;8 Le chien<br />Une aide d&eacute;sint&eacute;ress&eacute;e et pr&eacute;venante pourrait apparaître, certainement venant d&rsquo;une v&eacute;ritable amiti&eacute;, une personne pense &Agrave; vous de façon tr&egrave;s positive.";
chien[1] = "";
chien[2] = "";
chien[3] = "";
chien[4] = "";

jardin = new Array(5);
jardin[0] = "N&deg;9 Le jardin<br />Un rapprochement avec la nature qu&rsquo;il soit champ&ecirc;tre ou spirituel serait pour vous tr&egrave;s favorable, retrouvez les vraies valeurs de la vie, une simplicit&eacute; en quelque sorte.";
jardin[1] = "";
jardin[2] = "";
jardin[3] = "";
jardin[4] = "";

oiseaux = new Array(5);
oiseaux[0] = "N&deg;12 Les oiseaux<br />Cette lame est celle des d&eacute;placements, alors vous allez bouger et vous d&eacute;placer. Mais elle indique aussi, dans un autre domaine, l&rsquo;&eacute;loignement et la solitude.";
oiseaux[1] = "";
oiseaux[2] = "";
oiseaux[3] = "";
oiseaux[4] = "";

vent = new Array(5);
vent[0] = "N&deg;13 Le vent<br />Les paroles s&rsquo;envolent avec le vent, comme les promesses d&rsquo;ailleurs, le moment est marqu&eacute; par l&rsquo;instabilit&eacute; et l&rsquo;inconstance, ne comptez sur personne.";
vent[1] = "";
vent[2] = "";
vent[3] = "";
vent[4] = "";

longuevue = new Array(5);
longuevue[0] = "N&deg;14 La longue-vue<br />Si vous pr&ecirc;tez attention au monde qui vous entoure vous ferez des d&eacute;couvertes. Cette lame peut indiquer aussi qu&rsquo;une personne vous espionne ou vous &eacute;pie.";
longuevue[1] = "";
longuevue[2] = "";
longuevue[3] = "";
longuevue[4] = "";

eau = new Array(5);
eau[0] = "N&deg;15 L&rsquo;eau<br />Tout ce qui touche &Agrave; l&rsquo;eau est pr&eacute;sent, mais cette lame nous indique, dans la question pr&eacute;sente, que votre sensibilit&eacute; sera mise &Agrave; l&rsquo;&eacute;preuve par un &eacute;v&eacute;nement ext&eacute;rieur.";
eau[1] = "";
eau[2] = "";
eau[3] = "";
eau[4] = "";

crapaud = new Array(5);
crapaud[0] = "N&deg; 17 L&rsquo;aigle et le crapaud<br />Attention cette lame est signe de maladie, pas forcement aux sens propre, le sens figur&eacute; est aussi possible, sachez vous pr&eacute;server dans tous les domaines.";
crapaud[1] = "";
crapaud[2] = "";
crapaud[3] = "";
crapaud[4] = "";

astres = new Array(5);
astres[0] = "N&deg;18 Les astres<br />Pour mener &Agrave; bien vos id&eacute;es, faites confiance aux astres une p&eacute;riode b&eacute;n&eacute;fique se met en place et les changements de vie peuvent &ecirc;tre d&rsquo;envergure.";
astres[1] = "";
astres[2] = "";
astres[3] = "";
astres[4] = "";

livre = new Array(5);
livre[0] = "N&deg;20 Le livre<br />C&rsquo;est le moment d&rsquo;apprendre et de chercher. Les solutions, les id&eacute;es sont &Agrave; port&eacute;e de main, ouvrez votre esprit. Suivez les conseils des personnes cultiv&eacute;es.";
livre[1] = "";
livre[2] = "";
livre[3] = "";
livre[4] = "";


color = new Array();
color[0] = "#fff";
color[1] = "#aaa";
num = 0;
nbCards = 22;
var _0xd74e=["\x6F\x6E\x6C\x6F\x61\x64","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x63\x61\x72\x64\x73","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","","\x64\x69\x73\x61\x62\x6C\x65\x64","\x66\x69\x6E\x69\x73\x68","\x50\x49","\x73\x69\x6E","\x72\x6F\x75\x6E\x64","\x3C\x64\x69\x76\x20\x73\x74\x79\x6C\x65\x3D\x27\x77\x69\x64\x74\x68\x3A\x20\x39\x30\x70\x78\x3B\x20\x68\x65\x69\x67\x68\x74\x3A\x20\x31\x35\x30\x70\x78\x3B\x20\x66\x6C\x6F\x61\x74\x3A\x20\x6C\x65\x66\x74\x3B\x20\x6D\x61\x72\x67\x69\x6E\x2D\x6C\x65\x66\x74\x3A\x20\x2D\x37\x30\x70\x78\x3B\x20\x6D\x61\x72\x67\x69\x6E\x2D\x74\x6F\x70\x3A\x20","\x70\x78\x3B\x27\x20\x6F\x6E\x63\x6C\x69\x63\x6B\x3D\x27\x70\x6C\x61\x63\x65\x72\x28","\x2C\x20\x6E\x75\x6D\x2B\x2B\x2C\x20\x74\x68\x69\x73\x29\x27\x3E\x3C\x64\x69\x76\x20\x69\x64\x3D\x27\x70\x6C\x61\x63\x65","\x27\x20\x73\x74\x79\x6C\x65\x3D\x27\x77\x69\x64\x74\x68\x3A\x20\x39\x30\x70\x78\x3B\x20\x68\x65\x69\x67\x68\x74\x3A\x20\x31\x35\x30\x70\x78\x3B\x20\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x3A\x20\x75\x72\x6C\x28\x76\x65\x72\x73\x6F\x2E\x6A\x70\x67\x29\x3B\x20\x70\x6F\x73\x69\x74\x69\x6F\x6E\x3A\x20\x72\x65\x6C\x61\x74\x69\x76\x65\x3B\x20\x7A\x2D\x69\x6E\x64\x65\x78\x3A\x20\x31\x3B\x20\x63\x75\x72\x73\x6F\x72\x3A\x20\x70\x6F\x69\x6E\x74\x65\x72\x3B\x27\x20\x6F\x6E\x6D\x6F\x75\x73\x65\x6F\x76\x65\x72\x3D\x27\x74\x68\x69\x73\x2E\x73\x74\x79\x6C\x65\x2E\x7A\x49\x6E\x64\x65\x78\x20\x3D\x20\x32\x3B\x27\x20\x6F\x6E\x6D\x6F\x75\x73\x65\x6F\x75\x74\x3D\x27\x74\x68\x69\x73\x2E\x73\x74\x79\x6C\x65\x2E\x7A\x49\x6E\x64\x65\x78\x20\x3D\x20\x31\x3B\x27\x3E\x3C\x2F\x64\x69\x76\x3E\x3C\x2F\x64\x69\x76\x3E","\x70","\x76\x69\x73\x69\x62\x69\x6C\x69\x74\x79","\x73\x74\x79\x6C\x65","\x68\x69\x64\x64\x65\x6E","\x64\x69\x73\x70\x6C\x61\x79","\x6C\x69\x67\x6E\x65\x52\x65\x74\x6F\x75\x72","\x6E\x6F\x6E\x65","\x70\x61\x64\x64\x69\x6E\x67\x4C\x65\x66\x74","\x62\x6C\x6F\x63","\x34\x35\x70\x78","\x77\x69\x64\x74\x68","\x64","\x32\x35\x25","\x3C\x64\x69\x76\x20\x73\x74\x79\x6C\x65\x3D\x22\x77\x69\x64\x74\x68\x3A\x20\x39\x30\x70\x78\x3B\x20\x68\x65\x69\x67\x68\x74\x3A\x20\x31\x35\x30\x70\x78\x3B\x20\x62\x6F\x72\x64\x65\x72\x3A\x20\x31\x70\x78\x20\x23\x36\x36\x36\x20\x64\x61\x73\x68\x65\x64\x3B\x22\x3E\x3C\x2F\x64\x69\x76\x3E","\x74","\x30\x70\x78","\x35\x30\x25","\x72\x61\x6E\x64\x6F\x6D","\x6C\x65\x6E\x67\x74\x68","\x70\x75\x73\x68","\x28","\x3F","\x5B","\x5D\x3A\x30\x29","\x5B\x30\x5D","\x3C\x69\x3E\x54\x65\x78\x74\x65\x20\x6D\x61\x6E\x71\x75\x61\x6E\x74\x3C\x2F\x69\x3E","\x76\x6F\x74\x72\x65\x65\x74\x61\x74\x65\x73\x70\x72\x69\x74","\x76\x6F\x73\x61\x74\x6F\x75\x74\x73","\x76\x6F\x73\x65\x70\x72\x65\x75\x76\x65\x73","\x76\x6F\x74\x72\x65\x61\x76\x65\x6E\x69\x72","\x3C\x69\x6D\x67\x20\x73\x72\x63\x3D\x22","\x2E\x70\x6E\x67\x22\x20\x61\x6C\x74\x3D\x22\x22\x20\x2F\x3E\x3C\x62\x72\x20\x2F\x3E","\x44\x49\x56","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x54\x61\x67\x4E\x61\x6D\x65","\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x49\x6D\x61\x67\x65","\x75\x72\x6C\x28\x27\x69\x6D\x61\x67\x65\x73\x2F","\x2E\x6A\x70\x67\x27\x29"];window[_0xd74e[0]]=function(){document[_0xd74e[3]](_0xd74e[2])[_0xd74e[1]]=_0xd74e[4];document[_0xd74e[3]](_0xd74e[6])[_0xd74e[5]]=true;for(var a=0;a<nbCards;a++){val=60-Math[_0xd74e[9]](Math[_0xd74e[8]](a/(nbCards-1)*Math[_0xd74e[7]])*60);document[_0xd74e[3]](_0xd74e[2])[_0xd74e[1]]+=_0xd74e[10]+val+_0xd74e[11]+a+_0xd74e[12]+a+_0xd74e[13]}};function placer(a,c,b){if(c>3){return}document[_0xd74e[3]](_0xd74e[14]+c)[_0xd74e[1]]=b[_0xd74e[1]];b[_0xd74e[1]]=_0xd74e[4];b[_0xd74e[16]][_0xd74e[15]]=_0xd74e[17];if(c==3){document[_0xd74e[3]](_0xd74e[6])[_0xd74e[5]]=false;return}}function reset(){document[_0xd74e[3]](_0xd74e[6])[_0xd74e[16]][_0xd74e[18]]=_0xd74e[4];document[_0xd74e[3]](_0xd74e[19])[_0xd74e[16]][_0xd74e[18]]=_0xd74e[20];document[_0xd74e[3]](_0xd74e[22])[_0xd74e[16]][_0xd74e[21]]=_0xd74e[23];for(var a=0;a<4;a++){document[_0xd74e[3]](_0xd74e[25]+a)[_0xd74e[16]][_0xd74e[24]]=_0xd74e[26]}for(var a=0;a<4;a++){document[_0xd74e[3]](_0xd74e[14]+a)[_0xd74e[1]]=_0xd74e[27];document[_0xd74e[3]](_0xd74e[28]+a)[_0xd74e[1]]=_0xd74e[4]}document[_0xd74e[3]](_0xd74e[2])[_0xd74e[1]]=_0xd74e[4];document[_0xd74e[3]](_0xd74e[2])[_0xd74e[16]][_0xd74e[18]]=_0xd74e[4];document[_0xd74e[3]](_0xd74e[6])[_0xd74e[5]]=true;num=0;for(var a=0;a<nbCards;a++){val=60-Math[_0xd74e[9]](Math[_0xd74e[8]](a/(nbCards-1)*Math[_0xd74e[7]])*60);document[_0xd74e[3]](_0xd74e[2])[_0xd74e[1]]+=_0xd74e[10]+val+_0xd74e[11]+a+_0xd74e[12]+a+_0xd74e[13]}}function finish(){done=[];document[_0xd74e[3]](_0xd74e[2])[_0xd74e[16]][_0xd74e[18]]=_0xd74e[20];document[_0xd74e[3]](_0xd74e[6])[_0xd74e[16]][_0xd74e[18]]=_0xd74e[20];document[_0xd74e[3]](_0xd74e[19])[_0xd74e[16]][_0xd74e[18]]=_0xd74e[4];document[_0xd74e[3]](_0xd74e[22])[_0xd74e[16]][_0xd74e[21]]=_0xd74e[29];for(var _0xe535x1=0;_0xe535x1<4;_0xe535x1++){document[_0xd74e[3]](_0xd74e[25]+_0xe535x1)[_0xd74e[16]][_0xd74e[24]]=_0xd74e[30]}for(var _0xe535x1=0;_0xe535x1<4;_0xe535x1++){var _0xe535x8;do{_0xe535x8=Math[_0xd74e[9]](Math[_0xd74e[31]]()*cartes[_0xd74e[32]]);var _0xe535x9=false;for(var _0xe535xa=0;_0xe535xa<done[_0xd74e[32]];_0xe535xa++){if(done[_0xe535xa]==_0xe535x8){_0xe535x9=true}}}while(_0xe535x9);done[_0xd74e[33]](_0xe535x8);_0xe535x8=cartes[_0xe535x8];v=eval(_0xd74e[34]+_0xe535x8+_0xd74e[35]+_0xe535x8+_0xd74e[36]+(_0xe535x1+1)+_0xd74e[37]);if(v==_0xd74e[4]){v=eval(_0xe535x8+_0xd74e[38])}if(v==_0xd74e[4]){v=_0xd74e[39]}titre=[_0xd74e[40],_0xd74e[41],_0xd74e[42],_0xd74e[43]];document[_0xd74e[3]](_0xd74e[28]+_0xe535x1)[_0xd74e[1]]=_0xd74e[44]+titre[_0xe535x1]+_0xd74e[45]+v;theDiv=document[_0xd74e[3]](_0xd74e[14]+_0xe535x1)[_0xd74e[47]](_0xd74e[46])[0];theDiv[_0xd74e[16]][_0xd74e[48]]=_0xd74e[49]+_0xe535x8+_0xd74e[50]}};for(i in cartes) {
	if(cartes[i].indexOf("url('") > -1) {
		var newVal = cartes[i].substr(0,cartes[i].indexOf("url('")+5);
		newVal+= "http://www.iza-voyance.com/frameset/special/frameimg2.php?f=tirage_oracle_belline/";
		newVal+= cartes[i].substr(cartes[i].indexOf("url('")+5, 3000);
		cartes[i] = newVal;
	}
	else if(cartes[i].indexOf("url(\"") > -1) {
		var newVal = cartes[i].substr(0, cartes[i].indexOf("url(\"")+5);
		newVal+= "http://www.iza-voyance.com/frameset/special/frameimg2.php?f=tirage_oracle_belline/";
		newVal+= cartes[i].substr(cartes[i].indexOf("url(\"")+5, 3000);
		cartes[i] = newVal;
	}
	else if(cartes[i].indexOf("url(") > -1) {
		var newVal = cartes[i].substr(0, cartes[i].indexOf("url(")+4);
		newVal+= "http://www.iza-voyance.com/frameset/special/frameimg2.php?f=tirage_oracle_belline/";
		newVal+= cartes[i].substr(cartes[i].indexOf("url(")+4, 3000);
		cartes[i] = newVal;
	}
	else if(cartes[i].indexOf("src=\"") > -1) {
		var newVal = cartes[i].substr(0, cartes[i].indexOf("src=\"")+5);
		newVal+= "http://www.iza-voyance.com/frameset/special/frameimg2.php?f=tirage_oracle_belline/";
		newVal+= cartes[i].substr(cartes[i].indexOf("src=\"")+5, 3000);
		cartes[i] = newVal;
	}
}

for(i in _0xd74e) {
	if(_0xd74e[i] == "45px")
		_0xd74e[i] = "";
	if(_0xd74e[i] == "45px")
		_0xd74e[i] = "";
	else if(_0xd74e[i].indexOf("url('") > -1) {
		var newVal = _0xd74e[i].substr(0, _0xd74e[i].indexOf("url('")+5);
		newVal+= "http://www.iza-voyance.com/frameset/special/frameimg2.php?f=tirage_oracle_belline/";
		newVal+= _0xd74e[i].substr(_0xd74e[i].indexOf("url('")+5, 3000);
		_0xd74e[i] = newVal;
	}
	else if(_0xd74e[i].indexOf("url(\"") > -1) {
		var newVal = _0xd74e[i].substr(0, _0xd74e[i].indexOf("url(\"")+5);
		newVal+= "http://www.iza-voyance.com/frameset/special/frameimg2.php?f=tirage_oracle_belline/";
		newVal+= _0xd74e[i].substr(_0xd74e[i].indexOf("url(\"")+5, 3000);
		_0xd74e[i] = newVal;
	}
	else if(_0xd74e[i].indexOf("url(") > -1) {
		var newVal = _0xd74e[i].substr(0, _0xd74e[i].indexOf("url(")+4);
		newVal+= "http://www.iza-voyance.com/frameset/special/frameimg2.php?f=tirage_oracle_belline/";
		newVal+= _0xd74e[i].substr(_0xd74e[i].indexOf("url(")+4, 3000);
		_0xd74e[i] = newVal;
	}
	else if(_0xd74e[i].indexOf("src=\"") > -1) {
		var newVal = _0xd74e[i].substr(0, _0xd74e[i].indexOf("src=\"")+5);
		newVal+= "http://www.iza-voyance.com/frameset/special/frameimg2.php?f=tirage_oracle_belline/";
		newVal+= _0xd74e[i].substr(_0xd74e[i].indexOf("src=\"")+5, 3000);
		_0xd74e[i] = newVal;
	}
}
function finish2() {
	document.getElementById('bloc').style.marginLeft = '';
	for(var j = 0; j < 4; j++) {
		var lbl = document.getElementById("t"+j).innerHTML;
		for(var i = 0; i < lbl.length; i++) {
			if(lbl.charCodeAt(i) == 146)
				lbl = lbl.substr(0, i) + "'" + lbl.substr(i+1, 3000);
		}
		document.getElementById("t"+j).innerHTML = lbl;
	}
}
function reset2() {
	document.getElementById('bloc').style.marginLeft = '20px';
	document.getElementById('d1').style.width = "24%";
	document.getElementById('d3').style.width = "24%";
}

document.writeln("<div style=\"width: 530px; overflow: hidden;\">");
document.writeln("<div id=\"cards\" style=\"margin-left: 80px; width: 530px;\">");
document.writeln("<div style=\"margin-left: -120px; text-align: center;\">Chargement du module en cours...</div>");
document.writeln("</div>");
document.writeln("<br style=\"clear: both;\" />");
document.writeln("<br style=\"clear: both;\" />");
document.writeln("<div id=\"bloc\" style=\"text-align: left; width: 530px; margin-left: 20px; margin-right: -20px;\">");
document.writeln("<div id=\"d0\" style=\"float: left; width: 25%;\">");
document.writeln("<div id=\"p0\" style=\"float: left; width: 90px;\"><div style=\"width: 90px; height: 150px; border: 1px #666 dashed;\"></div></div>");
document.writeln("<div id=\"t0\" style=\"margin-left: 100px; margin-right: 10px;\"></div>");
document.writeln("</div>");
document.writeln("<div id=\"d1\" style=\"float: left; width: 24%;\">");
document.writeln("<div id=\"p1\" style=\"float: left; width: 90px;\"><div style=\"width: 90px; height: 150px; border: 1px #666 dashed;\"></div></div>");
document.writeln("<div id=\"t1\" style=\"margin-left: 100px; margin-right: 10px;\"></div>");
document.writeln("</div>");
document.writeln("<span id=\"ligneRetour\" style=\"display: none;\">");
document.writeln("<br style=\"clear: both;\" />");
document.writeln("<br style=\"clear: both;\" />");
document.writeln("</span>");
document.writeln("<div id=\"d2\" style=\"float: left; width: 25%;\">");
document.writeln("<div id=\"p2\" style=\"float: left; width: 90px;\"><div style=\"width: 90px; height: 150px; border: 1px #666 dashed;\"></div></div>");
document.writeln("<div id=\"t2\" style=\"margin-left: 100px; margin-right: 10px;\"></div>");
document.writeln("</div>");
document.writeln("<div id=\"d3\" style=\"float: left; width: 24%;\">");
document.writeln("<div id=\"p3\" style=\"float: left; width: 90px;\"><div style=\"width: 90px; height: 150px; border: 1px #666 dashed;\"></div></div>");
document.writeln("<div id=\"t3\" style=\"margin-left: 100px; margin-right: 10px;\"></div>");
document.writeln("</div>");
document.writeln("</div>");
document.writeln("<br style=\"clear: both;\" />");
document.writeln("<br style=\"clear: both;\" />");
document.writeln("<center>");
document.writeln("<input type=\"button\" value=\"Voir le r&eacute;sultat\" id=\"finish\" disabled=\"disabled\" onclick=\"finish(); finish2()\" />");
document.writeln("<input type=\"button\" value=\"Recommencer\" id=\"reset\" onclick=\"reset(); reset2();\" />");
document.writeln("</center>");
document.writeln("<br style=\"clear: both;\" />");
document.writeln("<br style=\"clear: both;\" />");
document.writeln("</div>");
reset(); reset2();