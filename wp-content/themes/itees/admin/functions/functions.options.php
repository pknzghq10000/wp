<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = STYLESHEETPATH. '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_bloginfo('template_url').'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		//$google_fonts = array('Open Sans' => 'Open Sans','Sacramento' => 'Sacramento','Droid Sans' =>'Droid Sans','Oswald' => 'Oswald','Droid Serif' => 'Droid Serif','Lato' => 'Lato','Francois One' => 'Francois One','Raleway' => 'Raleway','Arvo' => 'Arvo','Roboto Slab' => 'Roboto Slab','Noto Serif' => 'Noto Serif','Noto Sans' =>'Noto Sans','Abril Fatface'=>'Abril Fatface','Clicker Script' => 'Clicker Script');
		$google_fonts = array('arial'=>'Arial',
						'verdana'=>'Verdana, Geneva',
						'trebuchet'=>'Trebuchet',
						'trebuchet ms'=>'Trebuchet MS',
						'georgia' =>'Georgia',
						'times'=>'Times New Roman',
						'tahoma'=>'Tahoma, Geneva',
						'helvetica'=>'Helvetica',
						'Abel' => 'Abel',
						'Abril Fatface' => 'Abril Fatface',
						'Aclonica' => 'Aclonica',
						'Acme' => 'Acme',
						'Actor' => 'Actor',
						'Adamina' => 'Adamina',
						'Advent Pro' => 'Advent Pro',
						'Aguafina Script' => 'Aguafina Script',
						'Aladin' => 'Aladin',
						'Aldrich' => 'Aldrich',
						'Alegreya' => 'Alegreya',
						'Alegreya SC' => 'Alegreya SC',
						'Alex Brush' => 'Alex Brush',
						'Alfa Slab One' => 'Alfa Slab One',
						'Alice' => 'Alice',
						'Alike' => 'Alike',
						'Alike Angular' => 'Alike Angular',
						'Allan' => 'Allan',
						'Allerta' => 'Allerta',
						'Allerta Stencil' => 'Allerta Stencil',
						'Allura' => 'Allura',
						'Almendra' => 'Almendra',
						'Almendra SC' => 'Almendra SC',
						'Amaranth' => 'Amaranth',
						'Amatic SC' => 'Amatic SC',
						'Amethysta' => 'Amethysta',
						'Andada' => 'Andada',
						'Andika' => 'Andika',
						'Angkor' => 'Angkor',
						'Annie Use Your Telescope' => 'Annie Use Your Telescope',
						'Anonymous Pro' => 'Anonymous Pro',
						'Antic' => 'Antic',
						'Antic Didone' => 'Antic Didone',
						'Antic Slab' => 'Antic Slab',
						'Anton' => 'Anton',
						'Arapey' => 'Arapey',
						'Arbutus' => 'Arbutus',
						'Architects Daughter' => 'Architects Daughter',
						'Arimo' => 'Arimo',
						'Arizonia' => 'Arizonia',
						'Armata' => 'Armata',
						'Artifika' => 'Artifika',
						'Arvo' => 'Arvo',
						'Asap' => 'Asap',
						'Asset' => 'Asset',
						'Astloch' => 'Astloch',
						'Asul' => 'Asul',
						'Atomic Age' => 'Atomic Age',
						'Aubrey' => 'Aubrey',
						'Audiowide' => 'Audiowide',
						'Average' => 'Average',
						'Averia Gruesa Libre' => 'Averia Gruesa Libre',
						'Averia Libre' => 'Averia Libre',
						'Averia Sans Libre' => 'Averia Sans Libre',
						'Averia Serif Libre' => 'Averia Serif Libre',
						'Bad Script' => 'Bad Script',
						'Balthazar' => 'Balthazar',
						'Bangers' => 'Bangers',
						'Basic' => 'Basic',
						'Battambang' => 'Battambang',
						'Baumans' => 'Baumans',
						'Bayon' => 'Bayon',
						'Belgrano' => 'Belgrano',
						'Belleza' => 'Belleza',
						'Bentham' => 'Bentham',
						'Berkshire Swash' => 'Berkshire Swash',
						'Bevan' => 'Bevan',
						'Bigshot One' => 'Bigshot One',
						'Bilbo' => 'Bilbo',
						'Bilbo Swash Caps' => 'Bilbo Swash Caps',
						'Bitter' => 'Bitter',
						'Black Ops One' => 'Black Ops One',
						'Bokor' => 'Bokor',
						'Bonbon' => 'Bonbon',
						'Boogaloo' => 'Boogaloo',
						'Bowlby One' => 'Bowlby One',
						'Bowlby One SC' => 'Bowlby One SC',
						'Brawler' => 'Brawler',
						'Bree Serif' => 'Bree Serif',
						'Bubblegum Sans' => 'Bubblegum Sans',
						'Buda' => 'Buda',
						'Buenard' => 'Buenard',
						'Butcherman' => 'Butcherman',
						'Butterfly Kids' => 'Butterfly Kids',
						'Cabin' => 'Cabin',
						'Cabin Condensed' => 'Cabin Condensed',
						'Cabin Sketch' => 'Cabin Sketch',
						'Caesar Dressing' => 'Caesar Dressing',
						'Cagliostro' => 'Cagliostro',
						'Calligraffitti' => 'Calligraffitti',
						'Cambo' => 'Cambo',
						'Candal' => 'Candal',
						'Cantarell' => 'Cantarell',
						'Cantata One' => 'Cantata One',
						'Cardo' => 'Cardo',
						'Carme' => 'Carme',
						'Carter One' => 'Carter One',
						'Caudex' => 'Caudex',
						'Cedarville Cursive' => 'Cedarville Cursive',
						'Ceviche One' => 'Ceviche One',
						'Changa One' => 'Changa One',
						'Chango' => 'Chango',
						'Chau Philomene One' => 'Chau Philomene One',
						'Chelsea Market' => 'Chelsea Market',
						'Chenla' => 'Chenla',
						'Cherry Cream Soda' => 'Cherry Cream Soda',
						'Chewy' => 'Chewy',
						'Chicle' => 'Chicle',
						'Chivo' => 'Chivo',
						'Coda' => 'Coda',
						'Coda Caption' => 'Coda Caption',
						'Codystar' => 'Codystar',
						'Comfortaa' => 'Comfortaa',
						'Coming Soon' => 'Coming Soon',
						'Concert One' => 'Concert One',
						'Condiment' => 'Condiment',
						'Content' => 'Content',
						'Contrail One' => 'Contrail One',
						'Convergence' => 'Convergence',
						'Cookie' => 'Cookie',
						'Copse' => 'Copse',
						'Corben' => 'Corben',
						'Cousine' => 'Cousine',
						'Coustard' => 'Coustard',
						'Covered By Your Grace' => 'Covered By Your Grace',
						'Crafty Girls' => 'Crafty Girls',
						'Creepster' => 'Creepster',
						'Crete Round' => 'Crete Round',
						'Crimson Text' => 'Crimson Text',
						'Crushed' => 'Crushed',
						'Cuprum' => 'Cuprum',
						'Cutive' => 'Cutive',
						'Damion' => 'Damion',
						'Dancing Script' => 'Dancing Script',
						'Dangrek' => 'Dangrek',
						'Dawning of a New Day' => 'Dawning of a New Day',
						'Days One' => 'Days One',
						'Delius' => 'Delius',
						'Delius Swash Caps' => 'Delius Swash Caps',
						'Delius Unicase' => 'Delius Unicase',
						'Della Respira' => 'Della Respira',
						'Devonshire' => 'Devonshire',
						'Didact Gothic' => 'Didact Gothic',
						'Diplomata' => 'Diplomata',
						'Diplomata SC' => 'Diplomata SC',
						'Doppio One' => 'Doppio One',
						'Dorsa' => 'Dorsa',
						'Dosis' => 'Dosis',
						'Dr Sugiyama' => 'Dr Sugiyama',
						'Droid Sans' => 'Droid Sans',
						'Droid Sans Mono' => 'Droid Sans Mono',
						'Droid Serif' => 'Droid Serif',
						'Duru Sans' => 'Duru Sans',
						'Dynalight' => 'Dynalight',
						'EB Garamond' => 'EB Garamond',
						'Eater' => 'Eater',
						'Economica' => 'Economica',
						'Electrolize' => 'Electrolize',
						'Emblema One' => 'Emblema One',
						'Emilys Candy' => 'Emilys Candy',
						'Engagement' => 'Engagement',
						'Enriqueta' => 'Enriqueta',
						'Erica One' => 'Erica One',
						'Esteban' => 'Esteban',
						'Euphoria Script' => 'Euphoria Script',
						'Ewert' => 'Ewert',
						'Exo' => 'Exo',
						'Exo 2' => 'Exo 2',
						'Expletus Sans' => 'Expletus Sans',
						'Fanwood Text' => 'Fanwood Text',
						'Fascinate' => 'Fascinate',
						'Fascinate Inline' => 'Fascinate Inline',
						'Federant' => 'Federant',
						'Federo' => 'Federo',
						'Felipa' => 'Felipa',
						'Fjord One' => 'Fjord One',
						'Flamenco' => 'Flamenco',
						'Flavors' => 'Flavors',
						'Fondamento' => 'Fondamento',
						'Fontdiner Swanky' => 'Fontdiner Swanky',
						'Forum' => 'Forum',
						'Fjalla One' => 'Fjalla One',
						'Francois One' => 'Francois One',
						'Fredericka the Great' => 'Fredericka the Great',
						'Fredoka One' => 'Fredoka One',
						'Freehand' => 'Freehand',
						'Fresca' => 'Fresca',
						'Frijole' => 'Frijole',
						'Fugaz One' => 'Fugaz One',
						'GFS Didot' => 'GFS Didot',
						'GFS Neohellenic' => 'GFS Neohellenic',
						'Galdeano' => 'Galdeano',
						'Gentium Basic' => 'Gentium Basic',
						'Gentium Book Basic' => 'Gentium Book Basic',
						'Geo' => 'Geo',
						'Geostar' => 'Geostar',
						'Geostar Fill' => 'Geostar Fill',
						'Germania One' => 'Germania One',
						'Gilda Display' => 'Gilda Display',
						'Give You Glory' => 'Give You Glory',
						'Glass Antiqua' => 'Glass Antiqua',
						'Glegoo' => 'Glegoo',
						'Gloria Hallelujah' => 'Gloria Hallelujah',
						'Goblin One' => 'Goblin One',
						'Gochi Hand' => 'Gochi Hand',
						'Gorditas' => 'Gorditas',
						'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
						'Graduate' => 'Graduate',
						'Gravitas One' => 'Gravitas One',
						'Great Vibes' => 'Great Vibes',
						'Gruppo' => 'Gruppo',
						'Gudea' => 'Gudea',
						'Habibi' => 'Habibi',
						'Hammersmith One' => 'Hammersmith One',
						'Handlee' => 'Handlee',
						'Hanuman' => 'Hanuman',
						'Happy Monkey' => 'Happy Monkey',
						'Henny Penny' => 'Henny Penny',
						'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
						'Holtwood One SC' => 'Holtwood One SC',
						'Homemade Apple' => 'Homemade Apple',
						'Homenaje' => 'Homenaje',
						'IM Fell DW Pica' => 'IM Fell DW Pica',
						'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
						'IM Fell Double Pica' => 'IM Fell Double Pica',
						'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
						'IM Fell English' => 'IM Fell English',
						'IM Fell English SC' => 'IM Fell English SC',
						'IM Fell French Canon' => 'IM Fell French Canon',
						'IM Fell French Canon SC' => 'IM Fell French Canon SC',
						'IM Fell Great Primer' => 'IM Fell Great Primer',
						'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
						'Iceberg' => 'Iceberg',
						'Iceland' => 'Iceland',
						'Imprima' => 'Imprima',
						'Inconsolata' => 'Inconsolata',
						'Inder' => 'Inder',
						'Indie Flower' => 'Indie Flower',
						'Inika' => 'Inika',
						'Irish Grover' => 'Irish Grover',
						'Istok Web' => 'Istok Web',
						'Italiana' => 'Italiana',
						'Italianno' => 'Italianno',
						'Jim Nightshade' => 'Jim Nightshade',
						'Jockey One' => 'Jockey One',
						'Jolly Lodger' => 'Jolly Lodger',
						'Josefin Sans' => 'Josefin Sans',
						'Josefin Slab' => 'Josefin Slab',
						'Judson' => 'Judson',
						'Julee' => 'Julee',
						'Junge' => 'Junge',
						'Jura' => 'Jura',
						'Just Another Hand' => 'Just Another Hand',
						'Just Me Again Down Here' => 'Just Me Again Down Here',
						'Kameron' => 'Kameron',
						'Karla' => 'Karla',
						'Kaushan Script' => 'Kaushan Script',
						'Kelly Slab' => 'Kelly Slab',
						'Kenia' => 'Kenia',
						'Khmer' => 'Khmer',
						'Knewave' => 'Knewave',
						'Kotta One' => 'Kotta One',
						'Koulen' => 'Koulen',
						'Kranky' => 'Kranky',
						'Kreon' => 'Kreon',
						'Kristi' => 'Kristi',
						'Krona One' => 'Krona One',
						'La Belle Aurore' => 'La Belle Aurore',
						'Lancelot' => 'Lancelot',
						'Lato' => 'Lato',
						'League Script' => 'League Script',
						'Leckerli One' => 'Leckerli One',
						'Ledger' => 'Ledger',
						'Lekton' => 'Lekton',
						'Lemon' => 'Lemon',
						'Libre Baskerville' => 'Libre Baskerville',
						'Lilita One' => 'Lilita One',
						'Limelight' => 'Limelight',
						'Linden Hill' => 'Linden Hill',
						'Lobster' => 'Lobster',
						'Lobster Two' => 'Lobster Two',
						'Londrina Outline' => 'Londrina Outline',
						'Londrina Shadow' => 'Londrina Shadow',
						'Londrina Sketch' => 'Londrina Sketch',
						'Londrina Solid' => 'Londrina Solid',
						'Lora' => 'Lora',
						'Love Ya Like A Sister' => 'Love Ya Like A Sister',
						'Loved by the King' => 'Loved by the King',
						'Lovers Quarrel' => 'Lovers Quarrel',
						'Luckiest Guy' => 'Luckiest Guy',
						'Lusitana' => 'Lusitana',
						'Lustria' => 'Lustria',
						'Macondo' => 'Macondo',
						'Macondo Swash Caps' => 'Macondo Swash Caps',
						'Magra' => 'Magra',
						'Maiden Orange' => 'Maiden Orange',
						'Mako' => 'Mako',
						'Marcellus' => 'Marcellus',
						'Marcellus SC' => 'Marcellus SC',
						'Marck Script' => 'Marck Script',
						'Marko One' => 'Marko One',
						'Marmelad' => 'Marmelad',
						'Marvel' => 'Marvel',
						'Mate' => 'Mate',
						'Mate SC' => 'Mate SC',
						'Maven Pro' => 'Maven Pro',
						'Meddon' => 'Meddon',
						'MedievalSharp' => 'MedievalSharp',
						'Medula One' => 'Medula One',
						'Megrim' => 'Megrim',
						'Merienda One' => 'Merienda One',
						'Merriweather' => 'Merriweather',
						'Metal' => 'Metal',
						'Metamorphous' => 'Metamorphous',
						'Metrophobic' => 'Metrophobic',
						'Michroma' => 'Michroma',
						'Miltonian' => 'Miltonian',
						'Miltonian Tattoo' => 'Miltonian Tattoo',
						'Miniver' => 'Miniver',
						'Miss Fajardose' => 'Miss Fajardose',
						'Modern Antiqua' => 'Modern Antiqua',
						'Molengo' => 'Molengo',
						'Monofett' => 'Monofett',
						'Monoton' => 'Monoton',
						'Monsieur La Doulaise' => 'Monsieur La Doulaise',
						'Montaga' => 'Montaga',
						'Montez' => 'Montez',
						'Montserrat' => 'Montserrat',
						'Montserrat Alternates' => 'Montserrat Alternates',
						'Montserrat Subrayada' => 'Montserrat Subrayada',
						'Moul' => 'Moul',
						'Moulpali' => 'Moulpali',
						'Mountains of Christmas' => 'Mountains of Christmas',
						'Mr Bedfort' => 'Mr Bedfort',
						'Mr Dafoe' => 'Mr Dafoe',
						'Mr De Haviland' => 'Mr De Haviland',
						'Mrs Saint Delafield' => 'Mrs Saint Delafield',
						'Mrs Sheppards' => 'Mrs Sheppards',
						'Muli' => 'Muli',
						'Mystery Quest' => 'Mystery Quest',
						'Neucha' => 'Neucha',
						'Neuton' => 'Neuton',
						'News Cycle' => 'News Cycle',
						'Niconne' => 'Niconne',
						'Nixie One' => 'Nixie One',
						'Nobile' => 'Nobile',
						'Nokora' => 'Nokora',
						'Norican' => 'Norican',
						'Nosifer' => 'Nosifer',
						'Nothing You Could Do' => 'Nothing You Could Do',
						'Noticia Text' => 'Noticia Text',
						'Noto Sans' => 'Noto Sans',
						'Nova Cut' => 'Nova Cut',
						'Nova Flat' => 'Nova Flat',
						'Nova Mono' => 'Nova Mono',
						'Nova Oval' => 'Nova Oval',
						'Nova Round' => 'Nova Round',
						'Nova Script' => 'Nova Script',
						'Nova Slim' => 'Nova Slim',
						'Nova Square' => 'Nova Square',
						'Numans' => 'Numans',
						'Nunito' => 'Nunito',
						'Odor Mean Chey' => 'Odor Mean Chey',
						'Old Standard TT' => 'Old Standard TT',
						'Oldenburg' => 'Oldenburg',
						'Oleo Script' => 'Oleo Script',
						'Open Sans' => 'Open Sans',
						'Open Sans Condensed' => 'Open Sans Condensed',
						'Orbitron' => 'Orbitron',
						'Original Surfer' => 'Original Surfer',
						'Oswald' => 'Oswald',
						'Over the Rainbow' => 'Over the Rainbow',
						'Overlock' => 'Overlock',
						'Overlock SC' => 'Overlock SC',
						'Ovo' => 'Ovo',
						'Oxygen' => 'Oxygen',
						'PT Mono' => 'PT Mono',
						'PT Sans' => 'PT Sans',
						'PT Sans Caption' => 'PT Sans Caption',
						'PT Sans Narrow' => 'PT Sans Narrow',
						'PT Serif' => 'PT Serif',
						'PT Serif Caption' => 'PT Serif Caption',
						'Pacifico' => 'Pacifico',
						'Parisienne' => 'Parisienne',
						'Passero One' => 'Passero One',
						'Passion One' => 'Passion One',
						'Patrick Hand' => 'Patrick Hand',
						'Patua One' => 'Patua One',
						'Paytone One' => 'Paytone One',
						'Permanent Marker' => 'Permanent Marker',
						'Petrona' => 'Petrona',
						'Philosopher' => 'Philosopher',
						'Piedra' => 'Piedra',
						'Pinyon Script' => 'Pinyon Script',
						'Plaster' => 'Plaster',
						'Play' => 'Play',
						'Playball' => 'Playball',
						'Playfair Display' => 'Playfair Display',
						'Podkova' => 'Podkova',
						'Poiret One' => 'Poiret One',
						'Poller One' => 'Poller One',
						'Poly' => 'Poly',
						'Pompiere' => 'Pompiere',
						'Pontano Sans' => 'Pontano Sans',
						'Port Lligat Sans' => 'Port Lligat Sans',
						'Port Lligat Slab' => 'Port Lligat Slab',
						'Prata' => 'Prata',
						'Preahvihear' => 'Preahvihear',
						'Press Start 2P' => 'Press Start 2P',
						'Princess Sofia' => 'Princess Sofia',
						'Prociono' => 'Prociono',
						'Prosto One' => 'Prosto One',
						'Puritan' => 'Puritan',
						'Quantico' => 'Quantico',
						'Quattrocento' => 'Quattrocento',
						'Quattrocento Sans' => 'Quattrocento Sans',
						'Questrial' => 'Questrial',
						'Quicksand' => 'Quicksand',
						'Qwigley' => 'Qwigley',
						'Radley' => 'Radley',
						'Raleway' => 'Raleway',
						'Rammetto One' => 'Rammetto One',
						'Rancho' => 'Rancho',
						'Rationale' => 'Rationale',
						'Redressed' => 'Redressed',
						'Reenie Beanie' => 'Reenie Beanie',
						'Revalia' => 'Revalia',
						'Ribeye' => 'Ribeye',
						'Ribeye Marrow' => 'Ribeye Marrow',
						'Righteous' => 'Righteous',
						'Roboto' => 'Roboto',
						'Roboto Sans' => 'Roboto Sans',
						'Rochester' => 'Rochester',
						'Rock Salt' => 'Rock Salt',
						'Rokkitt' => 'Rokkitt',
						'Ropa Sans' => 'Ropa Sans',
						'Rosario' => 'Rosario',
						'Rosarivo' => 'Rosarivo',
						'Rouge Script' => 'Rouge Script',
						'Ruda' => 'Ruda',
						'Ruge Boogie' => 'Ruge Boogie',
						'Ruluko' => 'Ruluko',
						'Rum Raisin' => 'Rum Raisin',
						'Ruslan Display' => 'Ruslan Display',
						'Russo One' => 'Russo One',
						'Ruthie' => 'Ruthie',
						'Sacramento' => 'Sacramento',
						'Sail' => 'Sail',
						'Salsa' => 'Salsa',
						'Sancreek' => 'Sancreek',
						'Sansita One' => 'Sansita One',
						'Sarina' => 'Sarina',
						'Satisfy' => 'Satisfy',
						'Schoolbell' => 'Schoolbell',
						'Seaweed Script' => 'Seaweed Script',
						'Sevillana' => 'Sevillana',
						'Seymour One' => 'Seymour One',
						'Shadows Into Light' => 'Shadows Into Light',
						'Shadows Into Light Two' => 'Shadows Into Light Two',
						'Shanti' => 'Shanti',
						'Share' => 'Share',
						'Shojumaru' => 'Shojumaru',
						'Short Stack' => 'Short Stack',
						'Siemreap' => 'Siemreap',
						'Sigmar One' => 'Sigmar One',
						'Signika' => 'Signika',
						'Signika Negative' => 'Signika Negative',
						'Simonetta' => 'Simonetta',
						'Sirin Stencil' => 'Sirin Stencil',
						'Six Caps' => 'Six Caps',
						'Slackey' => 'Slackey',
						'Smokum' => 'Smokum',
						'Smythe' => 'Smythe',
						'Sniglet' => 'Sniglet',
						'Snippet' => 'Snippet',
						'Sofia' => 'Sofia',
						'Sonsie One' => 'Sonsie One',
						'Sorts Mill Goudy' => 'Sorts Mill Goudy',
						'Special Elite' => 'Special Elite',
						'Spicy Rice' => 'Spicy Rice',
						'Spinnaker' => 'Spinnaker',
						'Spirax' => 'Spirax',
						'Squada One' => 'Squada One',
						'Stardos Stencil' => 'Stardos Stencil',
						'Stint Ultra Condensed' => 'Stint Ultra Condensed',
						'Stint Ultra Expanded' => 'Stint Ultra Expanded',
						'Stoke' => 'Stoke',
						'Sue Ellen Francisco' => 'Sue Ellen Francisco',
						'Sunshiney' => 'Sunshiney',
						'Supermercado One' => 'Supermercado One',
						'Suwannaphum' => 'Suwannaphum',
						'Swanky and Moo Moo' => 'Swanky and Moo Moo',
						'Syncopate' => 'Syncopate',
						'Tangerine' => 'Tangerine',
						'Taprom' => 'Taprom',
						'Telex' => 'Telex',
						'Tenor Sans' => 'Tenor Sans',
						'The Girl Next Door' => 'The Girl Next Door',
						'Tienne' => 'Tienne',
						'Tinos' => 'Tinos',
						'Titan One' => 'Titan One',
						'Titillium Web' => 'Titillium Web',
						'Trade Winds' => 'Trade Winds',
						'Trocchi' => 'Trocchi',
						'Trochut' => 'Trochut',
						'Trykker' => 'Trykker',
						'Tulpen One' => 'Tulpen One',
						'Ubuntu' => 'Ubuntu',
						'Ubuntu Condensed' => 'Ubuntu Condensed',
						'Ubuntu Mono' => 'Ubuntu Mono',
						'Ultra' => 'Ultra',
						'Uncial Antiqua' => 'Uncial Antiqua',
						'UnifrakturCook' => 'UnifrakturCook',
						'UnifrakturMaguntia' => 'UnifrakturMaguntia',
						'Unkempt' => 'Unkempt',
						'Unlock' => 'Unlock',
						'Unna' => 'Unna',
						'VT323' => 'VT323',
						'Varela' => 'Varela',
						'Varela Round' => 'Varela Round',
						'Vast Shadow' => 'Vast Shadow',
						'Vibur' => 'Vibur',
						'Vidaloka' => 'Vidaloka',
						'Viga' => 'Viga',
						'Voces' => 'Voces',
						'Volkhov' => 'Volkhov',
						'Vollkorn' => 'Vollkorn',
						'Voltaire' => 'Voltaire',
						'Waiting for the Sunrise' => 'Waiting for the Sunrise',
						'Wallpoet' => 'Wallpoet',
						'Walter Turncoat' => 'Walter Turncoat',
						'Wellfleet' => 'Wellfleet',
						'Wire One' => 'Wire One',
						'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
						'Yellowtail' => 'Yellowtail',
						'Yeseva One' => 'Yeseva One',
						'Yesteryear' => 'Yesteryear',
						'Zeyada' => 'Zeyada'
		);



		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


// GENERAL //

$of_options[] = array( 	"name" 		=> "Logo and icons",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> "Logo",
						"desc" 		=> "上傳Logo",
						"id" 		=> "site_logo",
						"std" 		=> "",
						"type" 		=> "media"
);

$of_options[] = array( 	"name" 		=> "網站圖示",
						"desc" 		=> "新增自訂圖示需為16x16px ico檔或png檔可被接受",
						"id" 		=> "site_favicon",
						"std" 		=> "",
						"type" 		=> "media"
);

$of_options[] = array( 	"name" 		=> "行動裝置圖示",
						"desc" 		=> "您的行動裝置圖示需為144x144px png檔可被接受",
						"id" 		=> "site_favicon_large",
						"std" 		=> "",
						"type" 		=> "media"
);

$of_options[] = array( 	"name" 		=> "自訂購物車圖示",
						"desc" 		=> "上傳自訂購物車圖示 你需要在購物車新增商品檢視結果",
						"id" 		=> "custom_cart_icon",
						"std" 		=> "",
						"type" 		=> "media"
);


// HEADER SETTINGS //
$of_options[] = array( 	"name" 		=> "Layout",
						"type" 		=> "heading"
);

$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "網站佈局",
						"desc" 		=> "選擇全頁, 盒子或是框架模組",
						"id" 		=> "body_layout",
						"std" 		=> "full-width",
						"type" 		=> "images",
						"options" 	=> array(
											'full-width' 	=> $url . 'full-width.gif',
											'boxed' 	=> $url . 'boxed.gif',
											'framed-layout' 	=> $url . 'framed.gif',
						)
);


$of_options[] = array( 	"name" 		=> "主體背景顏色 (僅適用於盒子或是框架模組)",
						"desc" 		=> "選擇背景色 僅顯示於盒子模組 (預設: #eee).",
						"id" 		=> "body_bg",
						"std" 		=> "",
						"type" 		=> "color"
);


$of_options[] = array( 	"name" 		=> "主體背景圖 (僅適用於盒子或是框架模組)",
						"desc" 		=> "挑選背景圖案. 點擊 <a href='http://www.jannahagan.com/#/2013/05/the-ultimate-collection-of-photoshop-patterns-that-dont-suck/' target='_blank'>here</a>  此處搜尋",
						"id" 		=> "body_bg_image",
						"std" 		=> "",
						"type" 		=> "media"
);

$of_options[] = array( 	"name" 		=> "主體背景重複",
						"desc" 		=> "",
						"id" 		=> "body_bg_type",
						"std" 		=> "",
						"type" 		=> "select",
						"options"   => array("bg-full-size" => "Full Size", "bg-tiled" => "Tiled" )
);

$of_options[] = array( 	"name" 		=> "內文顏色",
						"desc" 		=> "深或淺的內文顏色",
						"id" 		=> "content_color",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);

$of_options[] = array( 	"name" 		=> "內容背景顏色",
						"desc" 		=> "修改內容背景顏色",
						"id" 		=> "content_bg",
						"std" 		=> "#FFF",
						"type" 		=> "color"
);



// HEADER // // HEADER // // HEADER // // HEADER //

$of_options[] = array( 	"name" 		=> "Header",
						"type" 		=> "heading"
);



$of_options[] = array( 	"name" 		=> "標題高度",
						"desc" 		=> "設定標題高度像素",
						"id" 		=> "header_height",
						"std" 		=> "120",
						"min" 		=> "60",
						"step"		=> "1",
						"max" 		=> "200",
						"type" 		=> "sliderui" 
);


$of_options[] = array( 	"name" 		=> "Logo寬度",
						"desc" 		=> "設定logo寬度,高度和標題高度相同",
						"id" 		=> "logo_width",
						"std" 		=> "210",
						"min" 		=> "90",
						"step"		=> "1",
						"max" 		=> "450",
						"type" 		=> "sliderui" 
);


$of_options[] = array( 	"name" 		=> "Logo位置",
						"desc" 		=> "選擇Logo位置",
						"id" 		=> "logo_position",
						"std" 		=> "left",
						"type" 		=> "select",

						"options" 	=> array(
										"left" => "left",
										"center" => "center"
						)
);

$of_options[] = array( 	"name" 		=> "搜尋位置",
						"desc" 		=> "在導覽列更改搜尋位置",
						"id" 		=> "search_pos",
						"std" 		=> "left",
						"type" 		=> "select",
						"options" 	=> array(
										"left" => "Left (default)",
										"right" => "Right",
										"hide" => "Hide"

						)
);

$of_options[] = array( 	"name" 		=> "導覽列位置",
						"desc" 		=> "更改導覽列位置",
						"id" 		=> "nav_position",
						"std" 		=> "top",
						"type" 		=> "select",

						"options" 	=> array(
										"top" => "Normal - beside logo",
										"bottom" => "Full width - Left",
										"bottom_center" => "Full width - Centered"
						)
);


$of_options[] = array( 	"name" 		=> "導覽列尺寸",
						"desc" 		=> "更改導覽列尺寸",
						"id" 		=> "nav_size",
						"std" 		=> "80%",
						"type" 		=> "select",
						"options" 	=> array(
										"70%" => "Small",
										"80%" => "Normal",
										"90%" => "Medium",
										"100%" => "Large"

						)
);




$of_options[] = array( 	"name" 		=> "顯示登錄/連接我的帳戶",
						"desc" 		=> "勾選此顯示我的帳戶/登錄連接",
						"id" 		=> "myaccount_dropdown",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> "顯示購物車預覽",
						"desc" 		=> "勾選此顯示購物車預覽",
						"id" 		=> "show_cart",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);



$of_options[] = array( 	"name" 		=> "黏頭高度",
						"desc" 		=> "勾選此頂部的滾動",
						"id" 		=> "header_sticky",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "黏頭高度",
						"desc" 		=> "設定黏頭高度為象素",
						"id" 		=> "header_height_sticky",
						"std" 		=> "70",
						"min" 		=> "60",
						"step"		=> "1",
						"max" 		=> "200",
						"type" 		=> "sliderui" 
);



$of_options[] = array( 	"name" 		=> "標題文字顏色",
						"desc" 		=> "淺或深標題文字顏色",
						"id" 		=> "header_color",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);

$of_options[] = array( 	"name" 		=> "標題背景色",
						"desc" 		=> "選擇標題背景色",
						"id" 		=> "header_bg",
						"std" 		=> "#fff",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> "標題背景圖",
						"desc" 		=> "上傳標題背景圖",
						"id" 		=> "header_bg_img",
						"std" 		=> "",
						"type" 		=> "media"
);


$of_options[] = array( 	"name" 		=> "標題背景圖片位置",
						"desc" 		=> "更改標題背景圖位置",
						"id" 		=> "header_bg_img_pos",
						"std" 		=> "repeat-x",
						"type" 		=> "select",

						"options" 	=> array(
										"repeat-x" => "repeat-x",//please, always use this key: "none"
										"no-repeat" => "no-repeat"

						)
);


$of_options[] = array( 	"name" 		=> "顯示頂欄",
						"id" 		=> "topbar_show",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> "頂欄背景色",
						"desc" 		=> "選擇頂欄背景顏色 (預設: #58728a).",
						"id" 		=> "topbar_bg",
						"std" 		=> "",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 	=> "頂欄左方",
				"desc" 		=> "輸入文字於頂欄左方",
				"id" 		=> "topbar_left",
				"std" 		=> "Add anything here here or just remove it..",
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> "導覽列背景 (全頁導覽列)",
						"desc" 		=> "更改導覽列位置",
						"id" 		=> "nav_position_bg",
						"std" 		=> "#eee",
						"type" 		=> "color"
);


$of_options[] = array( 	"name" 		=> "導覽列連結顏色 (全頁導覽列)",
						"desc" 		=> "更改導覽列位置",
						"id" 		=> "nav_position_color",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light-header' => $url . 'text-light.gif',
											'dark-header' 	=> $url . 'text-dark.gif',
						)
);


$of_options[] = array( 	"name" 		=> "全頁導覽列 - 右側選單內容",
				"desc" 		=> "輸入內容至導覽列右側選單, 可使用減碼",
				"id" 		=> "nav_position_text",
				"std" 		=> "Add shortcode or text here",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "全頁導覽列 - 熱門內容",
				"desc" 		=> "輸入logo或搜尋旁邊的標題內容, 可使用減碼",
				"id" 		=> "nav_position_text_top",
				"std" 		=> "Add shortcode or text here",
				"type" 		=> "text"
);




$of_options[] = array( 	"name" 		=> "Footer",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> "頁腳左下內容 (版權文字)",
				"desc" 		=> "為左側頁腳內容輸入文字/ HTML",
				"id" 		=> "footer_left_text",
				"std" 		=> "Copyright 2014 &copy; <strong>UX Themes</strong>. Powered by <strong>WooCommerce</strong>",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "頁腳右下內容",
				"desc" 		=> "於此處新增如信用卡繳費等等圖示",
				"id" 		=> "footer_right_text",
				"std" 		=> "",
				"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> "頁腳1文字顏色",
						"desc" 		=> "深或淺的內文顏色",
						"id" 		=> "footer_1_color",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);



$of_options[] = array( 	"name" 		=> "頁腳1背景顏色",
						"id" 		=> "footer_1_bg_color",
						"std" 		=> "#fff",
						"type" 		=> "color"
);



$of_options[] = array( 	"name" 		=> "頁腳2文字顏色",
						"desc" 		=> "深或淺的內文顏色",
						"id" 		=> "footer_2_color",
						"std" 		=> "dark",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);



$of_options[] = array( 	"name" 		=> "頁腳2背景顏色",
						"id" 		=> "footer_2_bg_color",
						"std" 		=> "#777",
						"type" 		=> "color"
);



$of_options[] = array( 	"name" 		=> "頁腳底部欄文字顏色",
						"desc" 		=> "深或淺的內文顏色",
						"id" 		=> "footer_bottom_style",
						"std" 		=> "dark",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);


$of_options[] = array( 	"name" 		=> "頁腳底部欄背景顏色",
						"id" 		=> "footer_bottom_color",
						"std" 		=> "#333",
						"type" 		=> "color"
);



// TYPE 

$of_options[] = array( 	"name" 		=> "Fonts",
						"type" 		=> "heading"
);

$of_options[] = array( 	"name" 		=> "使用Google的字體",
						"desc" 		=> "勾選此選項用Google字體",
						"id" 		=> "disable_fonts",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);




$of_options[] = array( 	"name" 		=> "標題文字 (h1,h2 等等)",
						"desc" 		=> "選擇標題文字<br> 需要靈感? <br>確認流行度 <a href='http://www.google.com/fonts/#Analytics:total' target='_blank'>google fonts here</a>",
						"id" 		=> "type_headings",
						"std" 		=> "Lato",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "<strong>Flatsome is Awesome!</strong> <br><span style='font-size:60%!important'>THIS TEXT IS IN UPPERCASE</span>", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=>  $google_fonts
);


$of_options[] = array( 	"name" 		=> "本文字體 (段落, 按鈕, 子導覽列)",
						"desc" 		=> "選擇標題文字",
						"id" 		=> "type_texts",
						"std" 		=> "Lato",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "Nostrud qui disrupt, vinyl occupy ennui beard. Assumenda mollit 90's sunt occupy. Marfa helvetica brooklyn, narwhal odd future leggings sint ethnic. Eu officia fixie, veniam gluten-free pop-up church-key truffaut nihil dreamcatcher sed aliquip odio wes anderson.", //this is the text from preview box
										"size" => "14px" //this is the text size from preview box
						),
						"options" 	=>  $google_fonts
);

$of_options[] = array( 	"name" 		=> "主導覽列",
						"desc" 		=> "選擇標題字體",
						"id" 		=> "type_nav",
						"std" 		=> "Lato",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "<span style='font-size:45%'>HOME WOMEN MEN APPERAL</span>", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=>  $google_fonts
);


$of_options[] = array( 	"name" 		=> "可替換的字體 (.alt-font)",
						"desc" 		=> "選擇可替換字體",
						"id" 		=> "type_alt",
						"std" 		=> "Dancing Script",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This font will be used on banners etc.", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=>  $google_fonts
);


$of_options[] = array( 	"name" 		=> "字體",
						"desc" 		=> "選擇您需要的字體",
						"id" 		=> "type_subset",
						"std" 		=> array("latin"),
						"type" 		=> "multicheck",
						"options" 	=> array("latin" => "Latin","cyrillic-ext" => "Cyrillic Extended","greek-ext" => "Greek Extended","greek" => "Greek","vietnamese" => "Vietnamese","latin-ext" => "Latin Extended","cyrillic" => "Cyrillic")
);


// COLORS


$of_options[] = array( 	"name" 		=> "Style and Colors",
						"type" 		=> "heading",
);

$of_options[] = array( 	"name" 		=> "主要顏色",
						"desc" 		=> "改變主顏色。用於主按鈕, 購物車圖標, 頂欄背景等",
						"id" 		=> "color_primary",
						"std" 		=> "#627f9a",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> "次要顏色",
						"desc" 		=> "改變次要顏色。用於添加到購物車, 結賬按鈕, 評論星級和銷售泡沫",
						"id" 		=> "color_secondary",
						"std" 		=> "#d26e4b",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> "確認色彩 ",
						"desc" 		=> "改變確認的色彩，用於確認商品消息",
						"id" 		=> "color_success",
						"std" 		=> "#7a9c59",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> "預設的連結顏色",
						"desc" 		=> "更改預設的連結顏色。用於商品連接, 網頁和部落格的連結",
						"id" 		=> "color_links",
						"std" 		=> "",
						"type" 		=> "color"
);


$of_options[] = array( 	"name" 		=> "添加到購物車/結帳按鈕",
						"desc" 		=> "更改結帳按鈕顏色，不改變將顯示預設顏色",
						"id" 		=> "color_checkout",
						"std" 		=> "",
						"type" 		=> "color"
);


$of_options[] = array( 	"name" 		=> "特價圖示",
						"desc" 		=> "更改特價圖示顏色，不改變將顯示預設顏色",
						"id" 		=> "color_sale",
						"std" 		=> "",
						"type" 		=> "color"
);

$of_options[] = array( 	"name" 		=> "評論等級",
						"desc" 		=> "更改評論星級顏色",
						"id" 		=> "color_review",
						"std" 		=> "",
						"type" 		=> "color"
);





$of_options[] = array( 	"name" 		=> "按鈕邊框大小",
						"desc" 		=> "更改按鈕邊框大小",
						"id" 		=> "button_radius",
						"std" 		=> "0px",
						"type" 		=> "select",

						"options" 	=> array(
										"0px" => "0px",
										"3px" => "3px",
										"5px" => "5px",
										"10px" => "10px",
										"15px" => "15px",
										"30px" => "30px",
										"99px" => "99px",

						)
);


$of_options[] = array( 	"name" 		=> "下拉邊框顏色",
						"desc" 		=> "更改下拉邊框顏色",
						"id" 		=> "dropdown_border",
						"std" 		=> "",
						"type" 		=> "color"
);



$of_options[] = array( 	"name" 		=> "下拉選單背景顏色",
						"desc" 		=> "更改下拉選單背景顏色",
						"id" 		=> "dropdown_bg",
						"std" 		=> "",
						"type" 		=> "color"
);



$of_options[] = array( 	"name" 		=> "下拉選單文字顏色",
						"desc" 		=> "深的或淺的顏色",
						"id" 		=> "dropdown_text",
						"std" 		=> "light",
						"type" 		=> "images",
						"options" 	=> array(
											'light' => $url . 'text-light.gif',
											'dark' 	=> $url . 'text-dark.gif',
						)
);




$of_options[] = array( 	"name" 		=> "Product Page",
						"type" 		=> "heading",
);


$of_options[] = array( 	"name" 		=> "當商品加入購物車時顯示購物車",
						"id" 		=> "cart_dropdown_show",
						"desc"      => "商品加入購物車後, 顯示購物車預覽",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "銷售冠軍",
				"id" 		=> "shop_aside_title",
				"std" 		=> "complete the look",
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> "商品側邊欄",
						"desc" 		=> "",
						"id" 		=> "product_sidebar",
						"std" 		=> "no_sidebar",
						"type" 		=> "select",
						"options" 	=> array(
										"no_sidebar" => "No sidebar",
										"left_sidebar" => "Left Sidebar",
										"right_sidebar" => "Right Sidebar"
						)
);


$of_options[] = array( 	"name" 		=> "商品資訊",
						"desc" 		=> "選擇您希望如何顯示商品資訊...",
						"id" 		=> "product_display",
						"std" 		=> "tabs",
						"type" 		=> "select",

						"options" 	=> array(
										"tabs" => "Tabs",
										"sections" => "Sections",
										"accordian" => "Accordian (new)",
										"tabs_vertical" => "Vertical tabs (new)"

						)
);


$of_options[] = array( 	"name"  => "新增標籤標題",
				"id" 		=> "tab_title",
				"std" 		=> "",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "新增標籤內容",
				"id" 		=> "tab_content",
				"std" 		=> "",
				"type" 		=> "textarea",
				"desc"      => "新增額外的內容 如尺寸表等."
);


$of_options[] = array( 	"name" 		=> "使用商品圖庫滾動條",
						"id" 		=> "disable_product_scrollbar",
						"desc"      => "移除滾動條在商品圖庫滑塊頂部",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);



$of_options[] = array( 	"name" 		=> "Category Page",
						"type" 		=> "heading"
);


$of_options[] = array( 	"name" 		=> "分類側邊欄",
						"desc" 		=> "選擇是否要商品類別側邊欄",
						"id" 		=> "category_sidebar",
						"std" 		=> "left-sidebar",
						"type" 		=> "select",

						"options" 	=> array(
										"none" => "No sidebar",//please, always use this key: "none"
										"left-sidebar" => "Left sidebar",
										"right-sidebar" => "Right sidebar",

						)
);


$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "商品風格",
						"desc" 		=> "選擇商品呈現風格樣式",
						"id" 		=> "grid_style",
						"std" 		=> "grid1",
						"type" 		=> "images",
						"options" 	=> array(
											'grid1' 	=> $url . 'grid1.gif',
											'grid2' 	=> $url . 'grid2.gif',
											'grid3' 	=> $url . 'grid3.gif',
						)
);





$of_options[] = array( 	"name" 		=> "目錄導覽尺寸",
						"desc" 		=> "更改商品目錄中導覽尺寸",
						"id" 		=> "breadcrumb_size",
						"std" 		=> "breadcrumb-normal",
						"type" 		=> "select",

						"options" 	=> array(
										"breadcrumb-normal" => "Normal",//please, always use this key: "none"
										"breadcrumb-medium" => "Medium",
										"breadcrumb-small" => "Small",

						)
);

$of_options[] = array( 	"name" 		=> "顯示 '首頁' ",
						"id" 		=> "breadcrumb_home",
						"desc"      => "勾選此顯示'首頁'在目錄導覽",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> "每行商品",
						"desc" 		=> "為目錄頁改變每行商品",
						"id" 		=> "category_row_count",
						"std" 		=> "3",
						"type" 		=> "select",

						"options" 	=> array(
										"2" => "2",
										"3" => "3",
										"4" => "4",
										"5" => "5",
										"6" => "6",

						)
);



$of_options[] = array( 
				"name"  => "每頁商品",
				"id" 		=> "products_pr_page",
				"desc" => "改變每頁商品",
				"std" 		=> "12",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "部落格和網頁搜尋結果",
						"desc" 		=> "",
						"id" 		=> "search_result",
						"desc"      => "部落格和網頁搜尋結果頁面",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> "新增購物車圖示", 
						"desc" 		=> "在方格中顯示購物車圖示",
						"id" 		=> "add_to_cart_icon",
						"std" 		=> "disable",
						"type" 		=> "select",

						"options" 	=> array(
										"show" => "Show",
										"disable" => "Disable",
						)
);


$of_options[] = array( 	"name" 		=> "商品圖片顯示樣式",
						"desc" 		=> "更改商品圖片顯示樣式",
						"id" 		=> "product_hover",
						"std" 		=> "fade_in_back",
						"type" 		=> "select",

						"options" 	=> array(
										"fade_in_back" => "Fade in back",
										"zoom_in" => "Zoom in",
										"none" => "Disabled"
						)
);


$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "特價標誌顯示方式",
						"desc" 		=> "更改特價標誌顯示方式",
						"id" 		=> "bubble_style",
						"std" 		=> "style1",
						"type" 		=> "images",
						"options" 	=> array(
											'style1' 	=> $url . 'sale-bubble-style1.gif',
											'style2' 	=> $url . 'sale-bubble-style2.gif',
											'style3' 	=> $url . 'sale-bubble-style3.gif',
						)
);


$of_options[] = array( 	"name" 		=> "特價顯示模式",
						"id" 		=> "sale_bubble_percentage",
						"desc"      => "勾選此顯示特價%而不是文字，這將覆蓋特價的顯示位置。",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "快速瀏覽功能",
						"id" 		=> "disable_quick_view",
						"desc"      => "",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "Blog",
						"type" 		=> "heading"
);


$of_options[] = array( 	"name" 		=> "部落格模組",
						"desc" 		=> "更改部落格模組",
						"id" 		=> "blog_layout",
						"std" 		=> "right-sidebar",
						"type" 		=> "select",
						"options"   => array("left-sidebar" => "Left sidebar", "right-sidebar" => "Right sidebar", "no-sidebar" => "No sidebar (Centered)" )
);


$of_options[] = array( 	"name" 		=> "部落格風格",
						"desc" 		=> "更改部落格風格",
						"id" 		=> "blog_style",
						"std" 		=> "blog-normal",
						"type" 		=> "select",
						"options"   => array("blog-normal" => "Normal", "blog-list" => "List style", "blog-pinterest" => "Pinterest style" )
);



$of_options[] = array( 	"name" 		=> "顯示部落格作者",
						"desc" 		=> "",
						"id" 		=> "blog_author_box",
						"desc"      => "勾選此顯示作者的部落格文章",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "部落格標題 HTML",
						"desc" 		=> "Enter HTML for blog header here. Will be placed above content and sidebar. Shortcodes are allowed. F.ex [block id='blog-header']",
						"id" 		=> "blog_header",
						"std" 		=> " ",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> "分享圖標",
						"desc" 		=> "",
						"id" 		=> "blog_share",
						"desc"      => "勾選此分享圖標於部落格",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "視差效果",
						"desc" 		=> "勾選此啟用功能的影像視差效果",
						"id" 		=> "blog_parallax",
						"desc"      => "",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "Featured Items",
						"type" 		=> "heading"
);


$of_options[] = array( 
				"name"  => "每頁顯示數量 (歸檔和模板頁)",
				"id" 		=> "featured_items_pr_page",
				"desc" => "更改每頁顯示數量",
				"std" 		=> "6",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "相關項目 (單頁)",
						"desc" 		=> "更改相關特色項目的風格",
						"id" 		=> "featured_items_related",
						"std" 		=> "2",
						"type" 		=> "select",
						"options"   => array("style1" => "style1", "2" => "style2", "disabled" => "Disabled" ),
);


$of_options[] = array( 
				"name"  => "相關項目的高度 (單頁)",
				"id" 		=> "featured_items_related_height",
				"desc" => "更改相關項目的高度",
				"std" 		=> "250px",
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> "HTML blocks",
						"type" 		=> "heading"
);


$of_options[] = array( 	"name" 		=> "自定義 CSS ",
						"desc" 		=> "在此添加自定義CSS",
						"id" 		=> "html_custom_css",
						"std" 		=> "div {}",
						"type" 		=> "textarea"
);

$of_options[] = array( 	"name" 		=> "自定義CSS (手機專用)",
						"desc" 		=> "在此添加手機自定義CSS",
						"id" 		=> "html_custom_css_mobile",
						"std" 		=> "",
						"type" 		=> "textarea"
);



$of_options[] = array( 	"name" 		=> "頁腳腳本",
						"desc" 		=> "這裡是來輸入您的Google您的Google Analytics代碼, 或者您可能要添加在你的網站的頁腳要加載任何其他的JS代碼的地方",
						"id" 		=> "html_scripts_footer",
						"std" 		=> " ",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> "HTML網頁介紹",
						"desc" 		=> "輸入的HTML將被放置在網頁標題之前。使用介紹圖片, 幻燈片等",
						"id" 		=> "html_intro",
						"std" 		=> " ",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> "HTML 商店標題",
						"desc" 		=> "輸入 HTML 在商店主頁的最上方",
						"id" 		=> "html_shop_page",
						"std" 		=> " ",
						"type" 		=> "textarea"
);

$of_options[] = array( 	"name" 		=> "HTML 加入購物車前 (商品頁)",
						"desc" 		=> "輸入HTML和簡碼, 顯示之前添加到購物車選擇",
						"id" 		=> "html_before_add_to_cart",
						"std" 		=> " ",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> "HTML 加入購物車後 (商品頁)",
						"desc" 		=> "輸入HTML和簡碼, 顯示後添加到購物車按鈕。",
						"id" 		=> "html_after_add_to_cart",
						"std" 		=> " ",
						"type" 		=> "textarea"
);




$of_options[] = array( 	"name" 		=> "HTML 標題之後(全局)",
						"desc" 		=> "輸入的HTML應該放在標題之後。可使用簡碼",
						"id" 		=> "html_after_header",
						"std" 		=> " ",
						"type" 		=> "textarea"
);



$of_options[] = array( 	"name" 		=> "HTML 頁腳之前 (全局)",
						"desc" 		=> "輸入頁腳的HTML。可使用簡碼 F.ex [block id='payments']",
						"id" 		=> "html_before_footer",
						"std" 		=> " ",
						"type" 		=> "textarea"
);



$of_options[] = array( 	"name" 		=> "HTML 頁腳之後 (全局)",
						"desc" 		=> "輸入頁腳的HTML。可使用簡碼 F.ex [block id='payments']",
						"id" 		=> "html_after_footer",
						"std" 		=> " ",
						"type" 		=> "textarea"
);


$of_options[] = array( 	"name" 		=> "HTML 購物車之後",
						"desc" 		=> "輸入的HTML, 將在購物車後展示。",
						"id" 		=> "html_cart_footer",
						"std" 		=> " ",
						"type" 		=> "textarea"
);

$of_options[] = array( 	"name" 		=> "Catalog Mode",
						"type" 		=> "heading",
);





$of_options[] = array( 	"name" 		=> "目錄模式",
						"id" 		=> "catalog_mode",
						"desc"      => "啟用目錄模式。將無法使用加入購物車按鈕//結帳和購物車。",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "顯示金額",
						"id" 		=> "catalog_mode_prices",
						"desc"      => "勾選將不使用類別頁面和產品頁面上的價格。",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" => "購物車/帳號更換 (標題)",
				"id" 		=> "catalog_mode_header",
				"std" 		=> "",
				"type" 		=> "textarea",
				"desc"      => "輸入要顯示帳號/購物車的內容，簡碼是允許的。 使用社群的示 <b>[follow twitter='http://' facebook='http://' email='post@email.com' pinterest='http://']</b>"
);

$of_options[] = array( 	"name" => "取代添加到購物車 - 商品頁",
				"id" 		=> "catalog_mode_product",
				"std" 		=> "",
				"type" 		=> "textarea",
				"desc"      => "在這裡輸入資訊或形式的短代碼"
);

$of_options[] = array( 	"name" => "取代添加到購物車 - 商品快速瀏覽",
				"id" 		=> "catalog_mode_lightbox",
				"std" 		=> "",
				"type" 		=> "textarea",
				"desc"      => "輸入內文, 將顯示於商品預覽"
);


$of_options[] = array( 	"name" 		=> "Account and Social",
						"type" 		=> "heading",
);


$of_options[] = array( 	"name" 		=> "啟用Facebook登錄 / 註冊上的登錄頁面",
						"id" 		=> "facebook_login",
						"desc"      => "啟用此功能將會建立一個註冊/登入按鈕，但需安裝外掛'Nextend Facebook Connect'",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);

$of_options[] = array( 	"name" 		=> "Facebook登錄 - 背景圖片",
						"desc" 		=> "上傳Facebook背景登錄標題",
						"id" 		=> "facebook_login_bg",
						"std" 		=> "",
						"type" 		=> "media"
);

$of_options[] = array( 	"name"  => "Facebook登錄 - 說明文字",
				"id" 		=> "facebook_login_text",
				"std" 		=> "",
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> "啟用Facebook登錄 / 註冊於結帳頁面",
						"id" 		=> "facebook_login_checkout",
						"desc"      => "啟用結帳頁面Facebook登錄按鈕 ",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "使用Facebook的Meta標籤",
						"id" 		=> "facebook_meta",
						"desc"      => "使Facebook的meta標籤。若無法使用表示有插件插入此。 (F.ex YOAST SEO plugin)",
						"std" 		=> 1,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "分享圖示",
						"desc" 		=> "選擇想要出現在前台的分享按鈕",
						"id" 		=> "social_icons",
						"std" 		=> array("facebook","twitter","email","pinterest","googleplus"),
						"type" 		=> "multicheck",
						"options" 	=> array("facebook" => "Facebook","twitter" => "Twitter","email" => "Email","pinterest" => "Pinterest","googleplus" => "Google Plus")
);

$of_options[] = array( 	"name" 		=> "在結帳頁面使用優惠券",
						"id" 		=> "coupon_checkout",
						"desc"      => "啟用優惠券結帳頁面",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup and Import",
						"type" 		=> "heading",
				);
				
$of_options[] = array( 	"name" 		=> "備份和恢復選項",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> '您可以使用下方這兩個按鈕備份您當前的選項，然後將其還原回在稍後的時間。如果你想嘗試的選擇，但想保持原來的設置，以便在需要它的回報，這是非常有用的。',
				);
				
$of_options[] = array( 	"name" 		=> "傳送主題選項數據",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> '您可以通過複製的文本框內文字轉院不同的安裝與保存的選項數據。若要從另一個導入數據安裝, 從另一個安裝一個替換文本框中的數據,  "導入選項".',
);


				
}//End function: of_options()
}//End chack if function exists: of_options()
?>
