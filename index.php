<!DOCTYPE html>

<?php
function getDirContents($dir, &$results = array(), $bpath = "")
{
    if (is_dir($dir)) {

        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if ($value != "." && $value != ".." &&  $value[0] != '.') {
                if (is_dir($path)) {
                    $results[] = $bpath . '/' . $value . '/';
                    getDirContents($path, $results, $bpath . '/' . $value);
                }
            }
        }
    }
    return $results;
}
?>

<html>

<body>
    <div class="blocco-link teoria">

        <h1>Teoria offerta dal prof Longhin</h1>
        <?php
        foreach (getDirContents(__DIR__ . '/teoria') as $folder) {
            echo "<a href='$folder'> $folder </a> <br>";
        }

        ?>
    </div>

    <div class="blocco-link esercizi">

        <h1>Esercizi fatti da Me</h1>
        <?php
        foreach (getDirContents(__DIR__ . '/esercizi') as $folder) {
            echo "<a href='$folder'> $folder </a> <br>";
        }

        ?>
    </div>


</body>

</html>


<style>
    h1 {
        text-align: center;
    }

    .blocco-link {
        border-radius: 50px;
        padding: 50px 50px;
        margin-bottom: 20px;
    }

    .blocco-link {
        width: 40%;
    }

    .teoria {
        background-color: aqua;
    }

    .esercizi {
        background-color: plum;
    }

    .blocco-link a {
        font-size: 20px;
    }

    @media screen and (max-width: 700px) {
        .blocco-link {
            width: 100%;
        }
    }
</style>