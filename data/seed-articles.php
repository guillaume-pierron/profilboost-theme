<?php
/**
 * ProfilBoost — Seed articles de démonstration
 *
 * Exécuter via WP-CLI depuis la racine WordPress :
 *   wp eval-file wp-content/themes/profilboost-theme/data/seed-articles.php
 *
 * Le script crée les catégories et les articles s'ils n'existent pas encore.
 */

if ( ! defined( 'ABSPATH' ) ) {
    $wp_load = dirname( __DIR__, 4 ) . '/wp-load.php';
    if ( file_exists( $wp_load ) ) {
        require $wp_load;
    } else {
        die( "Impossible de charger WordPress. Lancez ce script avec WP-CLI.\n" );
    }
}

/* ─── Catégories ─────────────────────────────────────────── */
/* Slugs identiques aux clés de $cat_css dans page-ressources.php */
$categories = [
    'CV & LM'  => 'cv',
    'LinkedIn' => 'li',
    'Coaching' => 'coach',
    'Carrière' => 'carriere',
];

$cat_ids = [];
foreach ( $categories as $name => $slug ) {
    $existing = get_term_by( 'slug', $slug, 'category' );
    if ( $existing ) {
        $cat_ids[ $slug ] = $existing->term_id;
    } else {
        $result = wp_insert_term( $name, 'category', [ 'slug' => $slug ] );
        $cat_ids[ $slug ] = is_wp_error( $result ) ? 1 : $result['term_id'];
    }
}

/* ─── Helper : crée un article s'il n'existe pas ─────────── */
function pb_insert_post( array $args ): int {
    $existing = get_page_by_path( $args['post_name'], OBJECT, 'post' );
    if ( $existing ) {
        echo "  ↩  Déjà existant : « {$args['post_title']} »\n";
        return $existing->ID;
    }
    $id = wp_insert_post( array_merge( [ 'post_status' => 'publish', 'post_type' => 'post' ], $args ) );
    if ( is_wp_error( $id ) ) {
        echo "  ✗  Erreur : " . $id->get_error_message() . "\n";
        return 0;
    }
    echo "  ✓  Créé : « {$args['post_title']} » (ID {$id})\n";
    return $id;
}

/* ═══════════════════════════════════════════════════════════
   ARTICLE 1 — Guide complet recherche d'emploi 2024
   ═══════════════════════════════════════════════════════════ */
$guide_content = <<<'HTML'
<p>Trouver un emploi en 2024 est une démarche qui demande méthode, persévérance et les bons outils. Avec plus de <strong>5 millions de candidatures déposées chaque mois en France</strong>, la compétition est rude — mais pas insurmontable. Dans ce guide complet, nous vous donnons toutes les clés pour structurer votre recherche et décrocher un poste dans les 3 mois.</p>

<p>Que vous soyez en reconversion professionnelle, en sortie d'études ou simplement en quête d'un nouveau challenge, ce guide s'adapte à votre situation. Accrochez-vous : à la fin, vous aurez un plan d'action concret, semaine par semaine.</p>

<h2 id="etat-des-lieux-marche-emploi">L'état des lieux du marché de l'emploi en 2024</h2>

<p>Le marché de l'emploi a profondément évolué ces dernières années. La généralisation du télétravail, l'essor de l'intelligence artificielle dans les processus de recrutement et la montée des "soft skills" ont changé les règles du jeu.</p>

<h3>Les tendances incontournables</h3>
<ul>
  <li><strong>Les ATS dominent</strong> : 75 % des CVs ne sont jamais lus par un humain (filtrés automatiquement)</li>
  <li><strong>LinkedIn est indispensable</strong> : 87 % des recruteurs l'utilisent pour sourcer des candidats</li>
  <li><strong>Le marché caché représente 70 % des offres</strong> : la majorité des postes ne sont jamais publiés</li>
  <li><strong>La vitesse est cruciale</strong> : postuler dans les 48h d'une offre multiplie les chances par 3</li>
</ul>

<h3>Secteurs qui recrutent en 2024</h3>
<p>Certains secteurs sont en surchauffe : la tech (développement, cybersécurité, data), la santé, la logistique et les énergies renouvelables. D'autres, comme l'audiovisuel ou la presse écrite, restent très compétitifs. Adapter votre stratégie à votre secteur est essentiel.</p>

<h2 id="preparation-profil">Étape 1 : Préparer votre profil — CV, LinkedIn et pitch</h2>

<p>Avant d'envoyer la moindre candidature, posez les bases. Un profil solide vous économise des semaines de recherche inefficace.</p>

<h3>Le CV en 2024 : les règles à respecter</h3>
<ul>
  <li>Une page maximum si moins de 10 ans d'expérience</li>
  <li>Un titre professionnel clair et ciblé en haut du document</li>
  <li>Des réalisations chiffrées pour chaque poste (ex. : "hausse du CA de 35 %")</li>
  <li>Un format compatible ATS : pas de tableaux, pas de zones de texte graphiques</li>
  <li>Des mots-clés alignés sur les offres de votre secteur cible</li>
</ul>

<h3>Optimiser LinkedIn en priorité</h3>
<p>LinkedIn est votre vitrine 24h/24. Un profil optimisé génère en moyenne <strong>40 % de sollicitations en plus</strong> de la part des recruteurs. Concentrez-vous sur : une photo professionnelle, un titre percutant, un résumé orienté valeur ajoutée et au moins 5 recommandations récentes.</p>

<h3>Le pitch de 2 minutes</h3>
<p>Entraînez-vous à présenter votre parcours en 2 minutes chrono. Ce pitch sera utile lors des entretiens, mais aussi lors des événements networking ou des appels spontanés avec des recruteurs.</p>

<h2 id="strategie-candidature">Étape 2 : Construire une stratégie de candidature efficace</h2>

<p>Envoyer 50 candidatures non ciblées par semaine est contre-productif. La stratégie gagnante allie <strong>qualité, ciblage et régularité</strong>.</p>

<h3>La règle du 50/50</h3>
<p>Consacrez 50 % de votre temps aux candidatures "visibles" (offres publiées) et 50 % à la prospection "invisible" (réseau, approche directe des entreprises). Ce second canal est souvent négligé mais génère les meilleures opportunités.</p>

<h3>Organiser votre pipeline</h3>
<p>Utilisez un tableau de bord (Excel, Notion ou Trello) pour suivre chaque candidature : entreprise, poste, date d'envoi, statut (envoyée / relancée / entretien / refus). Cette visibilité est essentielle pour éviter les oublis et les relances mal timées.</p>

<h3>Personnaliser chaque candidature</h3>
<p>Une lettre de motivation copiée-collée se détecte en 10 secondes. Pour chaque poste cible :</p>
<ol>
  <li>Identifiez les 3 compétences clés demandées dans l'offre</li>
  <li>Illustrez chacune avec un exemple concret de votre parcours</li>
  <li>Adaptez votre accroche à la culture de l'entreprise</li>
  <li>Finissez par une proposition de valeur claire : "Je peux apporter X à votre équipe en Y mois"</li>
</ol>

<h2 id="reseau-et-marche-cache">Étape 3 : Activer votre réseau et accéder au marché caché</h2>

<p>Le réseau est responsable de plus de 60 % des recrutements selon les études. Pourtant, la plupart des candidats n'osent pas l'utiliser par peur d'être intrusifs. Voici comment le faire intelligemment.</p>

<h3>Cartographier votre réseau</h3>
<p>Listez vos contacts par cercle : 1er cercle (famille, amis proches), 2e cercle (anciens collègues, camarades de promo), 3e cercle (contacts LinkedIn, membres d'associations). Chaque cercle a sa propre valeur et nécessite une approche différente.</p>

<h3>La prise de contact idéale</h3>
<p>Ne demandez jamais directement "Est-ce qu'il y a des postes chez vous ?" Privilégiez : "J'aimerais avoir ton retour d'expérience sur le secteur X" ou "Est-ce que tu pourrais me présenter à [tel contact] ?" Cette approche génère plus de résultats et préserve la relation.</p>

<h2 id="preparation-entretiens">Étape 4 : Préparer et réussir vos entretiens</h2>

<p>Décrocher un entretien est une victoire — ne la gâchez pas par un manque de préparation. La phase d'entretien est là où beaucoup de candidats, pourtant bien qualifiés, se font éliminer.</p>

<h3>La méthode STAR pour répondre aux questions comportementales</h3>
<p>Pour toute question du type "Parlez-moi d'une situation difficile que vous avez gérée", utilisez la méthode STAR :</p>
<ul>
  <li><strong>S</strong>ituation : posez le contexte en 1-2 phrases</li>
  <li><strong>T</strong>âche : décrivez ce qui vous incombait</li>
  <li><strong>A</strong>ction : expliquez ce que vous avez fait concrètement</li>
  <li><strong>R</strong>ésultat : quantifiez l'impact (chiffres, délais, feedback)</li>
</ul>

<h3>Les questions à poser à la fin</h3>
<p>Toujours préparer 3 à 5 questions pour la fin de l'entretien. Elles montrent votre intérêt et votre sérieux. Exemples : "Quels sont les principaux défis de ce poste dans les 6 premiers mois ?" ou "Comment mesurez-vous la réussite à ce poste ?"</p>

<h2 id="suivi-et-relances">Étape 5 : Le suivi — la clé souvent oubliée</h2>

<p>La plupart des candidats envoient leur candidature et attendent passivement. Les candidats qui réussissent, eux, <strong>suivent activement leurs candidatures</strong>.</p>

<h3>Quand et comment relancer ?</h3>
<ul>
  <li><strong>Après une candidature sans retour</strong> : relancez par email après 7-10 jours</li>
  <li><strong>Après un entretien</strong> : envoyez un email de remerciement dans les 24h, puis relancez après 1 semaine si pas de nouvelles</li>
  <li><strong>Ton à adopter</strong> : courtois, bref, orienté valeur (mentionnez un élément de l'entretien)</li>
</ul>

<h2 id="conclusion-plan-action">Conclusion : votre plan d'action sur 3 mois</h2>

<p>Décrocher un poste en 3 mois est tout à fait réalisable à condition d'y consacrer entre 3 et 5 heures par jour avec méthode. Voici le découpage recommandé :</p>

<ul>
  <li><strong>Semaines 1-2</strong> : Audit et refonte de votre CV, optimisation LinkedIn, préparation de votre pitch</li>
  <li><strong>Semaines 3-4</strong> : Cartographie du marché, identification des 20 entreprises cibles, premières candidatures ciblées</li>
  <li><strong>Semaines 5-8</strong> : Montée en puissance des candidatures, activation du réseau, premières relances</li>
  <li><strong>Semaines 9-12</strong> : Entretiens, préparation approfondie, négociation, décision</li>
</ul>

<p>Si vous souhaitez être accompagné à chaque étape par des experts — CV, LinkedIn, coaching entretien — ProfilBoost est là pour accélérer votre parcours et maximiser vos chances de succès.</p>
HTML;

pb_insert_post( [
    'post_title'   => 'Recherche d\'emploi 2024 : le guide complet pour trouver un poste en moins de 3 mois',
    'post_name'    => 'guide-recherche-emploi-2024',
    'post_content' => $guide_content,
    'post_excerpt' => 'Méthode, outils et stratégies pour structurer votre recherche d\'emploi et décrocher un poste en moins de 3 mois — CV, LinkedIn, réseau, entretiens.',
    'post_category'=> [ $cat_ids['carriere'] ],
] );

/* ═══════════════════════════════════════════════════════════
   ARTICLE 2 — 5 erreurs qui font rejeter votre CV
   ═══════════════════════════════════════════════════════════ */
$erreurs_cv_content = <<<'HTML'
<p>En moyenne, un recruteur consacre <strong>moins de 10 secondes</strong> à scanner un CV avant de décider s'il mérite d'être lu plus attentivement. C'est une réalité statistique confirmée par de nombreuses études en recrutement. Dans ce contexte ultra-compétitif, certaines erreurs peuvent vous éliminer avant même que le recruteur ait eu le temps de lire votre premier paragraphe.</p>

<p>Après avoir analysé des centaines de CVs et interrogé des dizaines de professionnels RH, nous avons identifié les <strong>5 erreurs les plus fréquentes et les plus fatales</strong>. La bonne nouvelle ? Elles sont toutes évitables.</p>

<h2 id="erreur-1-mise-en-page">Erreur #1 : Une mise en page illisible ou trop chargée</h2>

<p>La première impression d'un CV est visuelle avant d'être textuelle. En moins de 3 secondes, le recruteur a déjà jugé si votre document est professionnel, aéré et agréable à lire — ou si c'est un "mur de texte" à fuir.</p>

<h3>Les signaux qui font fuir</h3>
<ul>
  <li>Plusieurs polices de caractères différentes sur un même document</li>
  <li>Des couleurs trop vives ou un design tape-à-l'œil sans cohérence</li>
  <li>Des marges inexistantes, un texte qui ne "respire" pas</li>
  <li>Des tableaux complexes qui ne s'affichent pas correctement en PDF</li>
  <li>Une photo de mauvaise qualité ou prise dans un contexte inapproprié</li>
</ul>

<h3>La règle d'or</h3>
<p>Un CV doit être <strong>lisible en un coup d'œil</strong>. Optez pour une structure en blocs clairs (expériences, compétences, formation), une seule police professionnelle (Calibri, Georgia, Helvetica), et suffisamment d'espacement entre chaque section. Le blanc n'est pas un ennemi — c'est ce qui permet à l'œil de se reposer et d'aller là où vous le souhaitez.</p>

<blockquote><p>"Un CV trop chargé génère une sensation d'inconfort chez le recruteur. Inconsciemment, il associe cette confusion visuelle à un profil désorganisé." — Sophie Renard, RRH chez un cabinet de recrutement parisien</p></blockquote>

<h2 id="erreur-2-titre-accroche">Erreur #2 : Un titre ou une accroche absents ou trop génériques</h2>

<p>La zone en haut de votre CV — sous votre nom — est la plus lue. C'est votre <strong>vitrine de 5 mots</strong>. Et pourtant, la grande majorité des candidats la laissent vide, ou y inscrivent simplement "Curriculum Vitae".</p>

<h3>Le titre : votre carte de visite professionnelle</h3>
<p>Un bon titre de CV répond instantanément à la question du recruteur : <em>"Qui est cette personne et que sait-elle faire ?"</em> Il ne doit jamais être générique.</p>

<p><strong>À éviter :</strong> "Curriculum Vitae — Marie Lambert"</p>
<p><strong>À adopter :</strong> "Responsable Marketing Digital | 7 ans d'expérience | Spécialiste SEO &amp; Growth Hacking"</p>

<h3>L'accroche professionnelle : 2-3 lignes percutantes</h3>
<p>Sous le titre, ajoutez une accroche de 2 à 3 lignes maximum qui résume votre proposition de valeur unique. Ce n'est pas un résumé de votre vie — c'est un argument commercial pour vous "vendre" en quelques secondes.</p>

<ul>
  <li>Mentionnez votre secteur, votre expertise principale et un résultat chiffré</li>
  <li>Évitez les formules creuses du type "Je suis motivé, dynamique et rigoureux"</li>
  <li>Parlez à la troisième personne pour un rendu plus objectif et professionnel</li>
</ul>

<h2 id="erreur-3-fautes-orthographe">Erreur #3 : Des fautes d'orthographe ou une rédaction négligée</h2>

<p>Selon une étude CareerBuilder, <strong>58 % des recruteurs rejettent un CV dès qu'ils y trouvent une faute de typographie</strong>. Une seule faute suffit pour donner l'impression d'un manque de soin, d'attention ou de professionnalisme — quel que soit le poste visé ou le secteur concerné.</p>

<h3>Les fautes les plus courantes sur un CV</h3>
<ul>
  <li>Confusion entre participes passés et infinitifs ("géré" vs "gérer")</li>
  <li>Accords oubliés dans les descriptions de missions</li>
  <li>Nom de l'entreprise cible mal orthographié — une erreur impardonnable</li>
  <li>Anglicismes mal maîtrisés ou mal accordés avec le français</li>
  <li>Tirets, guillemets et espaces insécables absents ou mal utilisés</li>
</ul>

<h3>Comment éviter ce piège ?</h3>
<ol>
  <li><strong>Utilisez un correcteur professionnel</strong> : Antidote, Grammalecte ou le correcteur Word en mode approfondi</li>
  <li><strong>Lisez votre CV à voix haute</strong> : les fautes "sonores" se détectent plus facilement</li>
  <li><strong>Faites relire par une tierce personne</strong> : un regard extérieur capte ce que vous ne voyez plus</li>
  <li><strong>Attendez 24h avant la relecture finale</strong> : le cerveau corrige automatiquement ce qu'il connaît déjà — laissez-le se reposer</li>
</ol>

<h2 id="erreur-4-trop-long-trop-vague">Erreur #4 : Un CV trop long, trop dense ou trop vague</h2>

<p>Il y a deux extrêmes également néfastes : le CV encyclopédique de 4 pages qui noie le recruteur sous des détails inutiles, et le CV squelettique d'une demi-page qui ne dit rien de concret sur votre valeur. Les deux finissent dans la corbeille.</p>

<h3>La règle de la longueur selon l'expérience</h3>
<ul>
  <li><strong>Moins de 10 ans d'expérience</strong> → 1 page maximum</li>
  <li><strong>Entre 10 et 20 ans d'expérience</strong> → 1 à 2 pages selon la richesse du parcours</li>
  <li><strong>Plus de 20 ans ou profil cadre supérieur</strong> → 2 pages maximum, jamais plus</li>
</ul>

<h3>Le piège du vague : chiffrez tout ce que vous pouvez</h3>
<p>L'erreur la plus invisible — et la plus répandue — est la description vague de ses missions et réalisations. Les recruteurs cherchent des <strong>preuves concrètes de votre impact</strong>, pas des listes de tâches génériques.</p>

<p><strong>Vague et inefficace :</strong><br><em>"Gestion d'une équipe commerciale et amélioration des résultats"</em></p>
<p><strong>Précis et percutant :</strong><br><em>"Management d'une équipe de 8 commerciaux — hausse du CA de 42 % en 18 mois (objectif initial : +20 %)"</em></p>

<p>Pour chaque expérience, posez-vous ces questions : <em>Combien ? En combien de temps ? Par rapport à quel objectif initial ?</em> Ces trois filtres transforment une mission banale en réalisation mémorable.</p>

<h2 id="erreur-5-filtres-ats">Erreur #5 : Ignorer les filtres ATS et ne pas cibler son CV par offre</h2>

<p>C'est l'erreur la plus méconnue des candidats, et potentiellement la plus éliminatoire. Selon Jobscan, <strong>75 % des CVs sont rejetés automatiquement par les logiciels ATS</strong> (Applicant Tracking Systems) avant même d'atteindre un regard humain.</p>

<h3>Qu'est-ce qu'un ATS et pourquoi est-ce critique ?</h3>
<p>Un ATS est un logiciel de gestion des candidatures utilisé par la majorité des entreprises de taille moyenne et grande. Il analyse automatiquement les CVs reçus, leur attribue un score de pertinence basé sur les mots-clés de l'offre d'emploi, et ne transmet aux recruteurs que les candidatures qui dépassent un certain seuil. En dessous de ce seuil, votre CV — aussi bien rédigé soit-il — n'est jamais lu.</p>

<h3>Comment optimiser votre CV pour les filtres ATS</h3>
<ul>
  <li><strong>Intégrez les mots-clés de l'offre</strong> dans vos expériences et compétences (ex. : "gestion de projet Agile", "Salesforce CRM", "budget P&amp;L")</li>
  <li><strong>Évitez les tableaux, zones de texte et graphiques</strong> : les ATS ne savent pas les lire et passent ce contenu à la trappe</li>
  <li><strong>Nommez clairement vos sections</strong> : "Expériences professionnelles", "Formation", "Compétences" — pas des titres créatifs ou originaux</li>
  <li><strong>Soumettez en PDF simple ou DOCX</strong> selon les consignes de l'offre — jamais en image</li>
  <li><strong>N'intégrez pas votre texte dans des images</strong> : il sera totalement invisible pour l'ATS</li>
</ul>

<blockquote><p>Un CV parfaitement mis en forme pour un œil humain peut être totalement illisible pour un ATS. L'optimisation ATS et le design professionnel ne sont pas antinomiques — mais ils nécessitent un équilibre que seule l'expertise maîtrise.</p></blockquote>

<h2 id="conclusion">Conclusion : votre CV mérite mieux que l'approximation</h2>

<p>Ces 5 erreurs partagent un point commun : elles sont toutes <strong>évitables avec les bons réflexes</strong>. Mais les corriger demande du recul, de l'expertise et une connaissance des attentes réelles des recruteurs — des ressources difficiles à mobiliser quand on est à la fois juge et partie.</p>

<p>Chez <strong>ProfilBoost</strong>, nos experts analysent votre CV actuel, identifient précisément ces blocages et vous livrent un document optimisé — esthétiquement, rédactionnellement et techniquement — en 72 heures. Avec un taux de satisfaction de <strong>4,9/5 sur plus de 500 clients accompagnés</strong>, c'est la voie la plus directe vers vos prochains entretiens.</p>
HTML;

pb_insert_post( [
    'post_title'   => '5 erreurs qui font rejeter votre CV en moins de 10 secondes',
    'post_name'    => '5-erreurs-cv-rejete-10-secondes',
    'post_content' => $erreurs_cv_content,
    'post_excerpt' => 'Mise en page, fautes, longueur, filtres ATS… Ces 5 erreurs très courantes font rejeter la majorité des CVs en quelques secondes. Découvrez comment les éviter.',
    'post_category'=> [ $cat_ids['cv'] ],
] );

/* ═══════════════════════════════════════════════════════════
   ARTICLE 3 — LinkedIn : les mots-clés qui attirent les recruteurs
   ═══════════════════════════════════════════════════════════ */
$linkedin_content = <<<'HTML'
<p>En 2024, LinkedIn compte plus de <strong>1 milliard de membres dans le monde</strong> et représente le premier outil de sourcing des recruteurs. Pourtant, 90 % des profils sont invisibles : pas de mots-clés, accroche générique, résumé vide. Si vous cherchez un emploi, votre profil LinkedIn est votre CV permanent — accessible 24h/24, 7j/7.</p>

<p>Dans cet article, nous décortiquons la logique de l'algorithme LinkedIn et vous donnons les mots-clés et les techniques qui font réellement la différence.</p>

<h2 id="fonctionnement-algorithme-linkedin">Comment fonctionne l'algorithme de recherche LinkedIn</h2>

<p>LinkedIn fonctionne comme un moteur de recherche. Quand un recruteur tape "Responsable RH Paris" ou "Développeur React senior", l'algorithme analyse des dizaines de critères pour classer les profils : pertinence des mots-clés, activité récente, taux de complétion du profil, réseau commun, géolocalisation.</p>

<h3>Le score SSI (Social Selling Index)</h3>
<p>LinkedIn calcule un score SSI pour chaque profil (visible dans vos paramètres). Il mesure 4 dimensions : l'établissement de votre marque professionnelle, la recherche des bonnes personnes, l'engagement avec des insights et la construction de relations. Un score SSI élevé améliore votre visibilité dans les recherches recruteurs.</p>

<h2 id="zone-titre-professionnel">La zone la plus stratégique : votre titre professionnel</h2>

<p>Le titre LinkedIn (la ligne sous votre nom) est indexé en priorité par l'algorithme. C'est aussi la première chose qu'un recruteur lit après votre nom. Vous disposez de <strong>220 caractères</strong> — utilisez-les tous.</p>

<h3>Structure optimale d'un titre LinkedIn</h3>
<p>[Poste cible] | [Spécialité 1] &amp; [Spécialité 2] | [Résultat ou contexte notable]</p>

<p><strong>Exemple :</strong><br>"Directrice Marketing | Stratégie de croissance &amp; Brand Content | +10 ans en retail &amp; e-commerce"</p>

<h3>Les mots-clés à intégrer selon votre domaine</h3>
<ul>
  <li><strong>Marketing</strong> : SEO, SEM, Growth Hacking, CRM, Inbound Marketing, Content Strategy, KPI, ROI</li>
  <li><strong>Tech</strong> : React, Python, DevOps, Agile, Scrum, Cloud AWS, CI/CD, API REST</li>
  <li><strong>Finance</strong> : Contrôle de gestion, P&amp;L, IFRS, Budget, Forecast, M&amp;A, Due Diligence</li>
  <li><strong>RH</strong> : GPEC, Talent Acquisition, Onboarding, Marque employeur, ATS, SIRH, Droit social</li>
  <li><strong>Commercial</strong> : Business Development, Account Management, Negociation B2B, Salesforce, CRM</li>
</ul>

<h2 id="section-a-propos">La section "À propos" : votre pitch écrit</h2>

<p>La section "À propos" est la plus lue après le titre — et la plus souvent bâclée. Vous disposez de 2 600 caractères. Les 3 premières lignes sont visibles sans clic : elles doivent accrocher.</p>

<h3>Structure recommandée</h3>
<ol>
  <li><strong>Accroche</strong> (1-2 phrases) : votre valeur ajoutée principale, chiffrée si possible</li>
  <li><strong>Expertise</strong> (3-5 lignes) : vos domaines de compétence et votre approche</li>
  <li><strong>Réalisations clés</strong> : 3 bullet points avec des chiffres concrets</li>
  <li><strong>Ce que vous recherchez</strong> : type de poste, secteur, localisation</li>
  <li><strong>Appel à l'action</strong> : "N'hésitez pas à me contacter sur [email] ou à prendre RDV ici : [lien]"</li>
</ol>

<h2 id="experiences-et-competences">Expériences et compétences : la densité des mots-clés</h2>

<p>Chaque description de poste est indexée par LinkedIn. Décrivez vos missions et réalisations avec des mots-clés métier précis, et quantifiez systématiquement vos impacts.</p>

<h3>Les compétences : 50 slots à remplir stratégiquement</h3>
<p>LinkedIn vous permet d'ajouter jusqu'à 50 compétences. Utilisez-les toutes. Priorisez les compétences les plus recherchées dans votre secteur, et demandez des validations à vos collègues et managers — elles renforcent votre crédibilité.</p>

<h2 id="activite-et-visibilite">L'activité : le signal le plus puissant pour l'algorithme</h2>

<p>Un profil inactif chute dans les résultats de recherche. LinkedIn récompense l'activité régulière. Vous n'avez pas besoin de publier tous les jours : <strong>2 à 3 interactions par semaine suffisent</strong> pour rester visible.</p>

<ul>
  <li>Commentez les posts de votre réseau avec des avis construits (pas juste "Super !")</li>
  <li>Partagez des articles avec votre point de vue en 2-3 lignes</li>
  <li>Publiez 1 post original par semaine : retour d'expérience, astuce métier, projet</li>
  <li>Utilisez les hashtags pertinents de votre secteur (3 à 5 maximum par post)</li>
</ul>

<h2 id="conclusion-linkedin">Conclusion : un profil LinkedIn optimisé est un recruteur qui travaille pour vous 24h/24</h2>

<p>Optimiser LinkedIn n'est pas une action ponctuelle — c'est une démarche continue. Un profil bien construit attire les recruteurs en mode "entrant" et vous ouvre des portes que les candidatures classiques n'atteignent jamais.</p>

<p>Si vous souhaitez qu'un expert ProfilBoost optimise votre profil de A à Z — titre, résumé, expériences, mots-clés — nos consultants le font en 48h avec un impact mesurable sur votre visibilité.</p>
HTML;

pb_insert_post( [
    'post_title'   => 'LinkedIn en 2024 : les mots-clés qui attirent les recruteurs',
    'post_name'    => 'linkedin-mots-cles-recruteurs-2024',
    'post_content' => $linkedin_content,
    'post_excerpt' => 'Titre, accroche, compétences, activité… Découvrez les mots-clés et les techniques qui rendent votre profil LinkedIn visible des recruteurs en 2024.',
    'post_category'=> [ $cat_ids['li'] ],
] );

/* ═══════════════════════════════════════════════════════════
   ARTICLE 4 — Comment négocier son salaire sans se brûler les ailes
   ═══════════════════════════════════════════════════════════ */
$nego_content = <<<'HTML'
<p>Négocier son salaire reste l'une des étapes les plus redoutées du processus de recrutement. Peur de paraître cupide, peur de perdre l'offre, peur de demander trop — ou pas assez. Pourtant, une négociation bien menée peut faire gagner <strong>5 000 à 15 000 € par an</strong> sur votre package, sans jamais compromettre votre relation avec l'employeur.</p>

<p>Dans cet article, nous vous donnons les clés pour négocier avec confiance, sans faux pas et sans se brûler les ailes.</p>

<h2 id="quand-negocier">Quand faut-il aborder la question du salaire ?</h2>

<p>Le timing est crucial. Parler salaire trop tôt dans le processus — dès le premier entretien de présélection — peut donner l'impression que c'est votre seule motivation. Trop tard, et vous risquez de perdre du pouvoir de négociation.</p>

<h3>La règle du bon moment</h3>
<ul>
  <li><strong>Jamais en premier</strong> : laissez le recruteur aborder le sujet ou attendez qu'une offre soit sur la table</li>
  <li><strong>Après avoir démontré votre valeur</strong> : une fois que le recruteur vous veut, votre position est la plus forte</li>
  <li><strong>Avant de signer</strong> : c'est votre dernière fenêtre de négociation — une fois le contrat signé, le rapport de force bascule</li>
</ul>

<h3>Et si on vous demande votre salaire actuel ou souhaité dès le départ ?</h3>
<p>Retournez poliment la question : <em>"Je préfère d'abord mieux comprendre le poste et ses responsabilités avant de parler rémunération. Quel est le budget prévu pour ce poste ?"</em> Cette réponse est à la fois professionnelle et stratégique.</p>

<h2 id="connaitre-sa-valeur">Étape 1 : Connaître précisément sa valeur marché</h2>

<p>Vous ne pouvez pas négocier efficacement sans données. Arriver à une négociation sans avoir fait votre benchmark, c'est comme jouer aux cartes sans regarder son jeu.</p>

<h3>Les sources fiables pour évaluer votre rémunération cible</h3>
<ul>
  <li><strong>Glassdoor et LinkedIn Salary</strong> : salaires déclarés par des profils similaires au vôtre</li>
  <li><strong>Les enquêtes de rémunération sectorielles</strong> : publiées chaque année par les cabinets (Robert Half, Michael Page, Hays…)</li>
  <li><strong>Votre réseau</strong> : une conversation discrète avec d'anciens collègues ou contacts du secteur est souvent la source la plus fiable</li>
  <li><strong>Les offres d'emploi qui affichent une fourchette</strong> : de plus en plus courantes, elles donnent une indication directe du marché</li>
</ul>

<h3>Définir vos trois chiffres avant l'entretien</h3>
<p>Avant toute négociation, définissez clairement :</p>
<ol>
  <li><strong>Votre plancher absolu</strong> : en dessous duquel vous refusez sans hésitation</li>
  <li><strong>Votre cible réaliste</strong> : ce que vous visez en tenant compte du marché et du poste</li>
  <li><strong>Votre ouverture ambitieuse</strong> : le chiffre que vous annoncez en premier, légèrement au-dessus de votre cible</li>
</ol>

<h2 id="argumenter-sa-demande">Étape 2 : Argumenter sa demande avec des faits, pas des émotions</h2>

<p>La plus grande erreur en négociation salariale est de justifier sa demande par des besoins personnels : "J'ai un loyer élevé", "J'ai deux enfants"… Ces arguments ne fonctionnent pas. L'employeur paie une valeur professionnelle, pas un mode de vie.</p>

<h3>Les arguments qui convainquent</h3>
<ul>
  <li><strong>Vos réalisations chiffrées</strong> : "Dans mon poste actuel, j'ai généré X € de CA supplémentaire / réduit les coûts de Y %"</li>
  <li><strong>Le benchmark marché</strong> : "Selon les données Glassdoor et les enquêtes Robert Half, ce type de poste se rémunère entre X et Y € dans notre secteur"</li>
  <li><strong>Vos compétences spécifiques et rares</strong> : certifications, langues, expertise technique en tension sur le marché</li>
  <li><strong>La valeur que vous apportez dès les premiers mois</strong> : montrez que vous avez un plan et que l'investissement est rapide à rentabiliser</li>
</ul>

<h3>La formule de demande idéale</h3>
<p>Soyez direct, ancré dans les données et ouvert à la discussion :</p>
<p><em>"Au regard de mon expérience, de mes réalisations et des niveaux de rémunération que j'observe sur le marché pour ce type de poste, je vise une rémunération autour de [chiffre ambitieux]. Est-ce cohérent avec le budget prévu ?"</em></p>

<h2 id="negocier-au-dela-du-salaire">Étape 3 : Négocier au-delà du salaire fixe</h2>

<p>Si l'employeur ne peut pas bouger sur le fixe, tout n'est pas perdu. Le <strong>package global</strong> comprend bien d'autres éléments négociables — et souvent tout aussi précieux.</p>

<h3>Les leviers souvent oubliés</h3>
<ul>
  <li><strong>Variable et bonus</strong> : objectifs, mode de calcul, fréquence de versement</li>
  <li><strong>Télétravail</strong> : 2-3 jours par semaine représentent une économie réelle (transport, garde d'enfants, qualité de vie)</li>
  <li><strong>Prise en charge des frais</strong> : abonnement transport, tickets restaurant, mutuelle renforcée</li>
  <li><strong>Jours de congés supplémentaires</strong> : un levier souvent ignoré mais très valorisable</li>
  <li><strong>Budget formation</strong> : certification, conférence, coaching — un investissement sur votre carrière</li>
  <li><strong>Date de prise de poste</strong> : quelques semaines de délai peuvent permettre de finir sereinement chez votre employeur actuel</li>
  <li><strong>Revue salariale à 6 mois</strong> : si le fixe proposé est en dessous de votre cible, demandez une clause de révision rapide avec des objectifs clairs</li>
</ul>

<h2 id="erreurs-a-eviter">Les 4 erreurs qui font échouer une négociation</h2>

<p>Même avec les bons arguments, certains comportements peuvent faire déraper une négociation pourtant bien engagée.</p>

<ol>
  <li><strong>Annoncer une fourchette trop large</strong> : "Entre 40 000 et 55 000 €" signifie que vous accepterez 40 000 €. Ancrez haut et précisément.</li>
  <li><strong>Accepter immédiatement</strong> : même si l'offre vous convient, prendre 24-48h pour "réfléchir" est perçu comme un signe de maturité, pas d'hésitation.</li>
  <li><strong>Menacer de partir</strong> : bluffer avec une contre-offre fictive peut se retourner contre vous si l'employeur vous prend au mot.</li>
  <li><strong>Renégocier après accord</strong> : une fois que vous avez dit oui, revenir sur le sujet détruit la confiance avant même votre premier jour.</li>
</ol>

<h2 id="gerer-un-refus">Que faire si la réponse est non ?</h2>

<p>Un refus sur le salaire n'est pas une fin de non-recevoir — c'est souvent une invitation à trouver un autre terrain d'entente. Gardez votre calme et votre posture professionnelle.</p>

<h3>Les bonnes réponses à un refus</h3>
<ul>
  <li><em>"Je comprends les contraintes budgétaires. Qu'est-ce qui serait possible côté variable ou avantages ?"</em></li>
  <li><em>"Dans ce cas, seriez-vous ouverts à une révision à 6 mois si j'atteins les objectifs X et Y ?"</em></li>
  <li><em>"Pouvez-vous me préciser ce qui permettrait de revoir cette rémunération dans le futur ?"</em></li>
</ul>

<p>Si le refus est total et que le package final est en dessous de votre plancher absolu, il est parfaitement acceptable — et professionnel — de décliner l'offre. Mieux vaut refuser un poste sous-rémunéré que de s'y engager avec de la frustration dès le départ.</p>

<h2 id="conclusion-negociation">Conclusion : la négociation est une compétence, pas un talent inné</h2>

<p>Négocier son salaire s'apprend. Ceux qui obtiennent les meilleures conditions ne sont pas nécessairement les plus téméraires — ce sont les mieux préparés. Avec un benchmark solide, des arguments factuels et la bonne posture, vous pouvez améliorer significativement votre package sans jamais mettre en péril votre relation avec votre futur employeur.</p>

<p>Nos coachs ProfilBoost vous accompagnent dans la <strong>préparation complète à l'entretien</strong>, y compris la négociation salariale : simulation, feedback, et stratégie personnalisée selon votre secteur et votre profil.</p>
HTML;

pb_insert_post( [
    'post_title'   => 'Comment négocier son salaire sans se brûler les ailes',
    'post_name'    => 'negocier-salaire-sans-se-bruler-les-ailes',
    'post_content' => $nego_content,
    'post_excerpt' => 'Timing, benchmark, arguments, leviers alternatifs… Tout ce qu\'il faut savoir pour négocier votre salaire avec confiance et décrocher le package que vous méritez.',
    'post_category'=> [ $cat_ids['carriere'] ],
] );

echo "\n✓ Seed terminé.\n";
