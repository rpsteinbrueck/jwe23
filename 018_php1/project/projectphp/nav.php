<?php 
#<nav>
#    <ul>
#        <li><a href="index.html">Home</a></li>
#        <li><a href="leistungen.html">Leistungen</a></li>
#        <li><a href="oeffnungszeiten.html">Öffnungszeiten</a></li>
#        <li class="active"><a href="kontakt.html">Kontakt</a></li>
#    </ul>
#</nav>

$nav_items = array(
    "home" => "Home",
    "services" => "Services",
    "opening times" => "Opening Times",
    "contact" => "Contact"
);

echo "<nav><ul>";

foreach ($nav_items as $i) {
    $sitename = strtolower($i);
    
    if ( $sitename == $site ) {
        $state = "active";
    } else {
        $state = "";
    }
    echo "<li class=\"{$state}\"><a href=\"?site={$sitename}\">{$i}</a></li>";
}

echo "</ul></nav>";
?>