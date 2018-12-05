<?php
$page = '';
$file = '';
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    $info = explode('_', $page);
    if(count($info) === 2) {
        $tema = $info[0];
        $pagina = $info[1];
        $file = '../pages/' . $tema . '/' . $pagina;
    }
}
if($page !== '' && $file !== '' && file_exists($file)) {
    header('Content-Type: text/html; charset=utf-8');
    readfile($file);
/*}
if(isset($_GET['page']) && file_exists('../pages/' . $_GET['page'])) {
    $page = $_GET['page'];
    $file = '../pages/' . $page;
    header('Content-Type: text/html; charset=utf-8');
    readfile($file);*/
} else {
    $archivos = array();
    $response = array();
    $titulosTemas = array();
    $handle = @fopen('../pages/index', 'r');
    $numFiles = 0;
    $numThemes = 0;
    $numThemesWithout = 0;
    if ($handle) {
        $contador = 1;
        while (($line = fgets($handle)) !== false) {
            $temaTitulo = explode(';', $line);
            if(isset($temaTitulo[0]) && is_numeric($temaTitulo[0])) {
                $titulo = '';
                if(isset($temaTitulo[1])) {
                    $titulo = trim($temaTitulo[1]);
                }
                if($temaTitulo[0] > $contador) {
                    for($i = $contador; $i < $temaTitulo[0]; $i++) {
                        $archivosTema = array();
                        $files = glob("../pages/{$contador}_*");
                        if (count($files) > 0) {
                            $numThemesWithout++;
                            foreach ($files as $file) {
                                $info = pathinfo($file);
                                $numFiles++;
                                $archivosTema[] = $info["filename"];
                                $archivos[] = $info["filename"];
                            }
                            sort($archivosTema);
                            $titulosTemas[] = array(
                                                'tema' => $contador,
                                                'titulo' => '',
                                                'archivos' => $archivosTema
                                              );
                        }
                        $contador++;
                    }
                }
                //$files = glob("../pages/{$contador}_*");
                $files = glob("../pages/{$contador}/*");
                if (count($files) > 0) {
                    $archivosTema = array();
                    foreach ($files as $file) {
                        $info = pathinfo($file);
                        $numFiles++;
                        //$archivosTema[] = $info["filename"];
                        //$archivos[] = $info["filename"];
                        $archivosTema[] = $contador . '_' . $info["filename"];
                        $archivos[] = $contador . '_' . $info["filename"];
                    }
                    sort($archivosTema);
                    $titulosTemas[] = array(
                                        'tema' => $contador,
                                        'titulo' => $titulo,
                                        'archivos' => $archivosTema
                                      );
                } else {
                    $titulosTemas[] = array(
                                        'tema' => $contador,
                                        'titulo' => $titulo,
                                        'archivos' => array()
                                      );
                }
                $numThemes++;
                $contador++;
            }
        }
        fclose($handle);
        sort($archivos);
        $response = array(
            'numeroArchivos' => $numFiles,
            'numeroTemas' => $numThemes + $numThemesWithout,
            'numeroTemasTitulos' => $numThemes,
            'numeroTemasSinTitulos' => $numThemesWithout,
            'temas' => $titulosTemas,
            'archivos' => $archivos
        );
    } else {
        $response = array(
            'numeroArchivos' => $numFiles,
            'numeroTemas' => $numThemes + $numThemesWithout,
            'numeroTemasTitulos' => $numThemes,
            'numeroTemasSinTitulos' => $numThemesWithout,
            'temas' => $titulosTemas,
            'archivos' => $archivos
        );
    }
    header("Content-type:application/json");
    echo json_encode($response);
    //echo '<pre>' . var_export($response, true) . '</pre>';
}