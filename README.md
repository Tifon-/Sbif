Sbif
====

Biblioteca PHP que facilita la integración con la API de la SBIF

# Ejemplos

## Obtener el UF del día actual
```php
<?php

use Tifon\Sbif\Sbif;

$sbif = new Sbif($apikey);
$uf = $sbif->resource('uf')->get();

```
## Obtener el UF de un año en particular
```php
<?php

use Tifon\Sbif\Sbif;

$sbif = new Sbif($apikey);
$uf = $sbif->resource('uf')->year(2014)->get();

```
