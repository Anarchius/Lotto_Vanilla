<?php
function checkNumbers()
{
    $sent = $_POST['numbers'];
    $randomize = [];
    $same = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (count($sent) !== 6) {
            return 'Za dużo lub za mało cyfr musisz wybrać 6 cyfr';
        }
        while (count($randomize) !== 6) {
            $random = rand(1, 49);
            if (!in_array($random, $randomize)) {
                array_push($randomize, $random);
            }
        }
        foreach ($sent as $number) {
            if (in_array($number, $randomize)) {
                array_push($same, $number);
            }
        }

        return 'Wylosowane liczby to '. implode(", ", $randomize). " trafileś ". count($same) . " jest/są to ".
            implode(", ", $same);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
</head>
<body>

<form method="POST">
    <fieldset>
        <legend>
            GENERATOR LOTTO
            test area <br/>
        </legend>
        <?php
        for ($i=1; $i <= 49; $i++) {
            echo "<label><input type='checkbox' value='$i' name='numbers[]'/>$i</label> ";
            if ($i%7 === 0) {
                echo "<br/>";
            }
        }
        ?>
        <button type="submit">Wyślij</button>
    </fieldset>
</form>
<?php
echo checkNumbers()
?>
</body>
</html>
