<?php 
//INICIO ALBA
//https://github.com/albamirandacarrasco/videoclubPHP
//    include_once "Soporte.php";
//    include_once "CintaVideo.php";
//    include_once "Dvd.php";
//    include_once "Juego.php";

    use Dwes\ProyectoVideoclub\app\Soporte;
    use Dwes\ProyectoVideoclub\app\CintaVideo;
    use Dwes\ProyectoVideoclub\app\Dvd;
    use Dwes\ProyectoVideoclub\app\Juego;

    //clase Soporte
    echo "<h2>Pruebas con la clase Soporte</h2>";
    $soporte1 = new Soporte("Tenet", 22, 3.5, 150); 
    echo "<strong>" . $soporte1->titulo . "</strong><br>";
    echo "Precio: " . $soporte1->getPrecio() . " euros<br>";
    echo "Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros<br>";
    $soporte1->muestraResumen();

    //clase CintaVideo
    echo "<h2>Pruebas con la clase CintaVideo</h2>";
    $miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
    echo "<strong>" . $miCinta->titulo . "</strong><br>";
    echo "Precio: " . $miCinta->getPrecio() . " euros<br>";
    echo "Precio IVA incluido: " . $miCinta->getPrecioConIVA() . " euros<br>";
    $miCinta->muestraResumen();

    //clase Dvd
    echo "<h2>Pruebas con la clase Dvd</h2>";
    $miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
    echo "<strong>" . $miDvd->titulo . "</strong><br>";
    echo "Precio: " . $miDvd->getPrecio() . " euros<br>";
    echo "Precio IVA incluido: " . $miDvd->getPrecioConIVA() . " euros<br>";
    $miDvd->muestraResumen();

    //clase Juego
    echo "<h2>Pruebas con la clase Juego</h2>";
    $miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
    echo "<strong>" . $miJuego->titulo . "</strong><br>";
    echo "Precio: " . $miJuego->getPrecio() . " euros<br>";
    echo "Precio IVA incluido: " . $miJuego->getPrecioConIVA() . " euros<br>";
    $miJuego->muestraResumen();

?>
